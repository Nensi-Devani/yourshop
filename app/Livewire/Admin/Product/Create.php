<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;
    // public $inputs = [];
    public $slug_err='',$disabled=false;
    public $category, $subcategory, $name, $slug, $brand, $material,  $small_description, $description,
           $meta_title, $meta_keyword, $meta_description,
           $trending=0, $featured=0, $status=1, $color,
           $quantity, $original_price, $selling_price, $delivaryCharge,
           $sizes=[], $sizeQty=[], $sizeStatus=[], $sizeOriginalPrice=[], $sizePrice=[], $sizeDeliveryCharge=[],
           $images=[];

    public $awailableMaterials = null, $redirectAfterCreateProduct = false; // global access object/variables

    public $tab='home', $showSize = 'no-size', $showColor = false; // for active tab & color/ size option
    public function render()
    {
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
        if($this->subcategory)
        {
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
        else
        {
            $materials = null;
            $sizesAwailable = null;
        }

        $color_list = Color::where('status','1')->get();
        return view('livewire.admin.product.create',compact('categories','color_list','subCategories','brands','materials','sizesAwailable'))->extends('layouts.admin')->section('content');
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
    public function addProduct()
    {
        $rules = [
            'category' => 'required',
            'subcategory' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string|unique:products',
            'brand' => 'required',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'nullable',
            'status' => 'nullable',
            'trending' => 'nullable',
            'featured' => 'nullable',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'images' => 'required',
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
        $category = Category::findOrFail($this->category);
        // for trending & status checkbox
        $validatedData['slug'] = Str::slug($this->slug);
        $validatedData['trending'] = $this->trending == true ?'1':'0';
        $validatedData['featured'] = $this->featured == true ?'1':'0';
        $validatedData['status'] = $this->status == true ?'1':'0';
        $validatedData['brand_id'] = $this->brand;
        $validatedData['material_id'] = $this->material;
        $validatedData['color_id'] = $this->color;
        $validatedData['sub_category_id'] = $this->subcategory;
        $product = $category->products()->create($validatedData);
        if($this->images)// to store images
        {
            foreach($this->images as $i)
                $product->addMedia($i)->toMediaCollection();
        }
        if($this->sizes)
        {
            foreach ($this->sizes as $key => $size) {
                $product->productSizes()->create([
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
            return redirect('admin/products')->with('message','Product Added Successfully !!');
    }
    public function tabActiveClass($tab)
    {
        $this->tab = $tab;
    }
    public function addAnotherColor()
    {
        $this->redirectAfterCreateProduct = true;
        $this->addProduct();
    }
}
