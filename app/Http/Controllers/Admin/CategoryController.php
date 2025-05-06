<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\CategoryFormUpdate;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $validateddata = $request->validated();
        $validateddata['slug'] = Str::slug($request->slug);
        $validateddata['status'] = $request->status == true ? '1':'0';
        $category = Category::create($validateddata);
        if($request->hasFile('category_avatar'))
        {
            $category->addMediaFromRequest('category_avatar')->toMediaCollection('category_avatar');
        }
        if($request->hasFile('category_image'))
        {
            $category->addMediaFromRequest('category_image')->toMediaCollection('category_image');
        }
        return redirect('admin/category')->with('message','Category Added Successfully !!!');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormUpdate $request,$category)
    {
        $category = Category::findOrFail($category);
        $validateddata = $request->validated();
        $validateddata['slug'] = Str::slug($request->slug);
        $validateddata['status'] = $request->status == true ? '1':'0';
        $category->update($validateddata); // update data
        if($request->hasFile('category_avatar'))
        {
            $category->clearMediaCollection('category_avatar');
            $category->addMediaFromRequest('category_avatar')->toMediaCollection('category_avatar');
        }
        if($request->hasFile('category_image'))
        {
            $category->clearMediaCollection('category_image');
            $category->addMediaFromRequest('category_image')->toMediaCollection('category_image');
        }
        return redirect('admin/category')->with('message','Category Updated Successfully !!!');
    }
}
