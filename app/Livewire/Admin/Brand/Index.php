<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;

class Index extends Component
{
    public $name,$slug,$brand_id,$category, $status = 1;
    public $add = 0,$update = 0,$delete = 0; // for modal show/hide
    public function render()
    {
        if($this->name)
        $this->slug = Str::slug($this->name);
        $categories = Category::where('status','1')->get();
        $brands = Brand::latest()->paginate(5);
        return view('livewire.admin.brand.index',compact('brands','categories'))
                ->extends('layouts.admin')
                ->section('content');
    }
    public function addModal() // to show add modal
    {
        $this->resetInput(); // while opening the modal, all input fields will be empty
        $this->add = true;
    }
    public function updateModal() // to show update modal
    {
        $this->update = true;
    }
    public function deleteModal() // to show update modal
    {
        $this->delete = true;
    }
    public function closeModal() // to hide the modal
    {
        $this->resetInput();
        $this->add = false;
        $this->update = false;
        $this->delete = false;
    }
    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'category' => 'required',
            'status' => 'nullable',
        ];
    }
    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = 1;
        $this->brand_id = null;
        $this->category = null;
    }
    public function addBrand()
    {
        $this->validate();
        Brand::create([
            'category_id' => $this->category,
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Brand Added Successfully !!');
        $this->closeModal(); // to hide the add modal
        $this->resetInput();
    }
    public function edit($brand_id)
    {
        $brand = Brand::find($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category = $brand->category_id;
        $this->brand_id = $brand_id;

        if($this->getErrorBag()) // if errors of validation from add brands = remove all the errors
            $this->resetErrorBag();

        $this->updateModal(); // to show update modal
    }
    public function updateBrand()
    {
        $this->validate();
        Brand::find($this->brand_id)->update([
            'category_id' => $this->category,
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Brand Updated Successfully !!');
        $this->closeModal();
        $this->resetInput(); // to hide the modal
    }
    public function deleteBrand($brand_id) // to set the brand id for delete
    {
        $this->brand_id = $brand_id;
        $this->deleteModal(); // to show delete modal
    }
    public function destroyBrand()
    {
        $brand = Brand::findOrFail($this->brand_id);
        $brand->delete();
        session()->flash('message','Brand Deleted Successfully !!!');
        $this->closeModal();
        $this->resetInput();
    }
}
