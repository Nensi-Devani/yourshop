<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Media;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    use WithFileUploads;
    public $disabled=false, $product;
    public $category, $subcategory, $name, $slug, $brand, $material,  $small_description, $description,
           $meta_title, $meta_keyword, $meta_description,
           $trending=0, $featured=0, $status=1, $color,
           $quantity, $original_price, $selling_price, $delivary_charge,
           $sizes=[], $sizeQty=[], $sizeStatus=[], $sizeOriginalPrice=[], $sizePrice=[], $sizeDeliveryCharge=[],
           $images=[];

    public $awailableMaterials = null, $redirectAfterCreateProduct = false; // global access object/variables

    public $tab='home', $showSize = 'no-size', $showColor = false; // for active tab & color/ size option
    public function mount($product_id)
    {
        $this->product = Product::findOrFail($product_id);
    }
    public function render()
    {
        $this->category = $this->product->category_id;
        $this->subcategory = $this->product->sub_category_id;
        $this->name = $this->product->name;
        $this->slug = $this->product->slug;
        $this->brand = $this->product->brand_id;
        $this->material = $this->product->material_id;
        $this->color = $this->product->color_id;
        $this->description = $this->product->description;
        $this->small_description = $this->product->small_description;
        $this->meta_title = $this->product->meta_title;
        $this->meta_keyword = $this->product->meta_keyword;
        $this->meta_description = $this->product->meta_description;
        $this->trending = $this->product->trending;
        $this->featured = $this->product->featured;
        $this->status = $this->product->status;

        if($this->product->selling_price > 0){
            $this->selling_price = $this->product->selling_price;
            $this->original_price = $this->product->original_price;
            $this->quantity= $this->product->quantity;
            $this->delivary_charge= $this->product->delivary_charge;
        }
        else{
            $this->showSize = 'yes';
            foreach($this->product->productSizes()->get() as $key => $item){
                $this->sizes[$item->size_id] = $item->size_id;
                $this->sizeQty[$item->size_id] = $item->quantity;
                $this->sizeStatus[$item->size_id] = $item->status;
                $this->sizeOriginalPrice[$item->size_id] = $item->original_price;
                $this->sizePrice[$item->size_id] = $item->price;
                $this->sizeDeliveryCharge[$item->size_id] = $item->delivary_charge;
            }
        }

        $categories = Category::where('status','1')->get();
        if($this->category){
            // find sub-category and brand for the selected category
            $category = Category::find($this->category);
            if($category->subCategories()->count() > 0)
                $subCategories = $category->subCategories()->get();
            else
                $subCategories = null;
            if($category->brands()->count() > 0)
                $brands = $category->brands()->get();
            else
               $brands = null;
        }
        else{
            $subCategories = null;
            $brands = null;
        }
        if($this->subcategory){
            $subCategory = SubCategory::find($this->subcategory);
            // find materials and sizes for the selected sub-category
            if($subCategory->materials()->where('status','1')->count() > 0)
            {
                $materials = $subCategory->materials()->where('status','1')->get();
                $this->awailableMaterials = $materials; // to access globaly
            }
            else
                $materials = null;

            if($subCategory->sizes()->where('status','1')->count()>0)
                $sizesAwailable = $subCategory->sizes()->get();
            else
                $sizesAwailable = null;
        }
        else{
            $materials = null;
            $sizesAwailable = null;
        }
        $color_list = Color::where('status','1')->get();
        return view('livewire.admin.product.edit',compact('categories','color_list','subCategories','brands','materials','sizesAwailable'))->extends('layouts.admin')->section('content');
    }
    public function messages()
    {
        return [
            'images.*.image' => 'Each file must be an image.',
        ];
    }
    public function resetInput()
    {
        $this->category = null;
        $this->subcategory = null;
        $this->name = null;
        $this->slug = null;
        $this->brand = null;
        $this->small_description = null;
        $this->description = null;
        $this->original_price = null;
        $this->selling_price = null;
        $this->trending = null;
        $this->status = null;
        $this->meta_title = null;
        $this->meta_keyword = null;
        $this->meta_description = null;
        $this->images = null;
        $this->colors = null;
        $this->colorquantity = null;
    }
    public function updateProduct()
    {
        $rules = [
            'category' => 'required',
            'subcategory' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string',
            'brand' => 'required',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable',
            'trending' => 'nullable',
            'featured' => 'nullable',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'images' => 'nullable',
            'images.*' => 'image',
        ];
        if($this->showColor) {
            $rules['color'] = '|required';
        }
        if($this->showSize == 'no-size') {
            $rules['selling_price'] = '|required';
            $rules['quantity'] = '|required';
        }
        else{
            $rules['sizes'] = '|required';
            $rules['sizeQty'] = '|required';
            $rules['sizePrice'] = '|required';
            $rules['sizeStatus'] = '|required';
        }
        if($this->awailableMaterials != null) {
            $rules['material'] = '|required';
        }
        $validatedData = $this->validate($rules);
        // $category = Category::findOrFail($this->category);
        // for trending & status checkbox
        $validatedData['slug'] = Str::slug($this->slug);
        $validatedData['trending'] = $this->trending == true ?'1':'0';
        $validatedData['featured'] = $this->featured == true ?'1':'0';
        $validatedData['status'] = $this->status == true ?'1':'0';
        $validatedData['brand_id'] = $this->brand;
        $validatedData['material_id'] = $this->material;
        $validatedData['color_id'] = $this->color;
        $validatedData['sub_category_id'] = $this->subcategory;
        $product = $this->product->update($validatedData);
        if($this->images)// to store images
        {
            foreach($this->images as $i)
                $this->product->addMedia($i)->toMediaCollection();
        }
        if($this->sizes)
        {
            foreach ($this->sizes as $key => $size) {
                $this->product->productSizes()->updateOrCreate(
                    [
                        'size_id' => $key,
                    ],
                    [
                        'size_id' => $key,
                        'quantity' => $this->sizeQty[$key] ?? 0,
                        'original_price' => $this->sizeOriginalPrice[$key] ?? 0,
                        'price' => $this->sizePrice[$key] ?? 0,
                        'delivery_charge' => $this->sizeDeliveryCharge[$key] ?? 0,
                        'status' => $this->sizeStatus[$key] ?? 0
                    ]);
            }
        }
        $this->resetInput();
        if($this->redirectAfterCreateProduct)
            return redirect('admin/product/' . $product->id . '/add-color')->with('message','Product Added !!, Add more color...');
        else
            return redirect('admin/products')->with('message','Product updated Successfully !!');
    }
    public function deleteProductImage($imageId)
    {
        $img = Media::findOrFail($imageId);
        $img->delete();
    }
    public function tabActiveClass($tab)
    {
        $this->tab = $tab;
    }
}
