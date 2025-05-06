<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAnotherColor extends Component
{
    use WithFileUploads;

    public  $category, $subcategory, $name, $slug, $brand, $material,  $small_description, $description,
            $meta_title, $meta_keyword, $meta_description,
            $trending=0, $status=1, $color,
            $quantity, $original_price, $selling_price, $delivaryCharge,
            $sizes=[], $sizeQty=[], $sizeStatus=[], $sizeOriginalPrice=[], $sizePrice=[], $sizeDeliveryCharge=[],
            $images=[];

    public  $parent, $awailableMaterials = null, $redirectAfterCreateProduct = false; // global access object/variables

    public  $tab='home', $showSize = 'no-size', $showColor = false;

    public function mount($product_id)
    {
        $this->parent = Product::findOrFail($product_id);
        $this->category = $this->parent->category->name;
        $this->subcategory = $this->parent->subCategory->name;
        $this->brand = $this->parent->brand->name;
        if($this->parent->material_id != null)
            $this->material = $this->parent->material->material;
    }
    public function render()
    {
        if($this->subcategory){
            $subCategory = SubCategory::find($this->parent->sub_category_id);
            if($subCategory->sizes()->where('status','1')->count()>0)
                $sizesAwailable = $subCategory->sizes()->get();
            else
                $sizesAwailable = null;
        }
        else
            $sizesAwailable = null;
        $color_list = Color::where('status','1')->get();
        return view('livewire.admin.product.create-another-color',compact('color_list','sizesAwailable'))->extends('layouts.admin')->section('content');
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
            'name' => 'required|string',
            'slug' => 'required|string|unique:products',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable',
            'trending' => 'nullable',
            'meta_title' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
            'images' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg',
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
        $validatedData = $this->validate($rules);
        $category = Category::findOrFail($this->parent->category_id);
        $validatedData['sub_category_id'] = $this->parent->sub_category_id;
        $validatedData['brand_id'] = $this->parent->brand_id;
        $validatedData['material_id'] = $this->parent->material_id;
        $validatedData['parent_id'] = $this->parent->id;
        // for trending & status checkbox
        $validatedData['slug'] = Str::slug($this->slug);
        $validatedData['trending'] = $this->trending == true ?'1':'0';
        $validatedData['status'] = $this->status == true ?'1':'0';
        $validatedData['color_id'] = $this->color;
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
            return redirect('admin/product/' . $this->parent->id . '/add-color')->with('message','Product Added !!, Add more color...');
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
