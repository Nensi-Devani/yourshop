<?php

namespace App\Livewire\Admin\Size;

use App\Models\Category;
use App\Models\Size;
use Livewire\Component;

class Index extends Component
{
    public $category, $subCategory, $status=1, $size, $size_id;
    public $add = 0,$update = 0,$delete = 0;
    public function render()
    {
        if($this->category)
        {
            $category = Category::find($this->category);
            $subCategories = $category->subCategories()->get();
        }
        else
            $subCategories = null;

        $categories = Category::where('status','1')->get();
        $sizes = Size::latest()->paginate(5);
        return view('livewire.admin.size.index',compact('sizes','categories','subCategories'))->extends('layouts.admin')->section('content');
    }

    public function resetInput()
    {
        $this->category = null;
        $this->subCategory = null;
        $this->status = null;
        $this->size = null;
        $this->material_id = null;
    }
    public function showModal($modal)
    {
        if($modal == 'add')
            $this->add = true;
        else if($modal == 'update')
            $this->update = true;
        else if($modal == 'delete')
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
            'category' => 'required',
            'subCategory' => 'required',
            'size' => 'required',
            'status' => 'nullable',
        ];
    }
    public function addSize()
    {
        $this->validate();
        Size::create([
            'category_id' => $this->category,
            'sub_category_id' => $this->subCategory,
            'size' => $this->size,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Size Added Successfully !!');
        $this->closeModal(); // to hide the add modal
    }
    public function edit($size_id)
    {
        $marerial = Size::find($size_id);
        $this->category = $marerial->category_id;
        $this->subCategory = $marerial->sub_category_id;
        $this->size = $marerial->size;
        $this->status = $marerial->status;
        $this->size_id = $size_id;

        if($this->getErrorBag()) // if errors of validation from add colors then, remove all the errors
            $this->resetErrorBag();

        $this->showModal('update'); // to show update modal
    }
    public function updateSize()
    {
        $this->validate();
        Size::find($this->size_id)->update([
            'category_id' => $this->category,
            'sub_category_id' => $this->subCategory,
            'size' => $this->size,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Size Updated Successfully !!');
        $this->closeModal();
    }
    public function deleteSize($size_id)
    {
        $this->size_id = $size_id;
        $this->showModal('delete');
    }
    public function destroySize()
    {
        $size = Size::find($this->size_id);
        $size->delete();
        session()->flash('message','Size Deleted Successfully !!');
        $this->closeModal();
        $this->resetInput();
    }
}
