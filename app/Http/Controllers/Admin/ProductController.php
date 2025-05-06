<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormReuest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\ProductColor;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Media;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }
    // public function create()
    // {
    //     $category = Category::where('status','0')->get();
    //     $brand = Brand::where('status','0')->get();
    //     $colors = Color::where('status','0')->get();
    //     $subCategories = SubCategory::where('status','0')->get();
    //     return view('admin.product.create',compact('category','brand','colors','subCategories'));
    // }

    // public function store(ProductFormReuest $request)
    // {
    //     $validatedData = $request->validated();
    //     $category = Category::findOrFail($validatedData['category']);
    //     // for trending & status checkbox
    //     $validatedData['trending'] = $request->trending == true ?'1':'0';
    //     $validatedData['status'] = $request->status == true ?'1':'0';
    //     $validatedData['brand_id'] = $request->brand;
    //     $validatedData['sub_category'] = $request->sub_category_id;
    //     $product = $category->products()->create($validatedData);
    //     if($request->hasFile('images')) // to store images
    //     {
    //         foreach ($request->file('images') as $image) {
    //             $product->addMedia($image)->toMediaCollection();
    //         }
    //     }
    //     if($request->colors)
    //     {
    //         foreach($request->colors as $key => $color)
    //         {
    //             $product->productColors()->create([
    //                 'color_id' => $color,
    //                 'quantity' => $request->colorquantity[$key] ?? 0
    //             ]);
    //         }
    //     }
    //     return redirect('admin/products')->with('message','Product Added Successfully !!');
    // }
    public function edit(Product $product)
    {
        $category = Category::where('status','1')->get();
        $subCategories = SubCategory::where('status','1')->get();
        $brand = Brand::where('status','1')->get();
        $product_color = $product->productColors()->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->where('status','1')->get(); // display only colors that are not added for this pro.

        return view('admin.product.edit',compact('product','brand','category','colors','subCategories'));
    }
    public function update(ProductUpdateRequest $request,$product_id)
    {
        $validatedData = $request->validated();
        $product = Product::where('id',$product_id)->first();
        // for trending & status checkbox
        if($product)
        {
            $validatedData['trending'] = $request->trending == true ?'1':'0';
            $validatedData['status'] = $request->status == true ?'1':'0';
            $validatedData['brand_id'] = $request->brand;
            $validatedData['category_id'] = $request->category;
            $validatedData['color_id'] = $request->color;
            $validatedData['sub_category_id'] = $request->sub_category;
            $product->update($validatedData);
            if ($request->hasFile('images')) // to store images
            {
                foreach ($request->file('images') as $image) {
                    $product->addMedia($image)->toMediaCollection();
                }
            }
            if($request->colors)
            {
                foreach($request->colors as $key => $color)
                {
                    $product->productColors()->create([
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }
            return redirect('admin/products')->with('message','Product Updated Successfully !!');
        }
        else
            return "Product not found !!!";
    }
    public function destroyImage($productImgId)
    {
        $media = Media::findOrFail($productImgId);
        $media->delete();
        return redirect()->back()->with('message','Product image deleted successfully !!!');
    }

    public function updateProductColor(Request $request,$pro_color_id)
    {
        // return $request;
        $product = Product::findOrFail($request->product_id)->productColors()->where('id',$pro_color_id)->first();
        $product->update([
            'quantity' => $request->quantity
        ]);
        return response()->json(['message'=>'Product Color quantity updated successfully !!!']);
    }
    public function deleteProductColor($pro_color_id){
        $productcolor = ProductColor::findOrFail($pro_color_id)->delete();
        return response()->json(['message'=>'Product Color deleted successfully !!!']);
    }
}
