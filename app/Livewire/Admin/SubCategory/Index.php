<?php

namespace App\Livewire\Admin\SubCategory;

use App\Models\Category;
use App\Models\SubCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{use LivewireAlert;
    public $category,$name,$status=1,$sub_category_id;
    public $add = 0,$update = 0,$delete = 0; // for modal show/hide
    public function render()
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::latest()->paginate(5);
        return view('livewire.admin.sub-category.index',['subcategories'=>$subcategories,'categories'=>$categories])->extends('layouts.admin')->section('content');
    }

    public function resetInput()
    {
        $this->category = null;
        $this->name = null;
        $this->status = null;
        $this->sub_category_id = null;
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
            'name' => 'required|string',
            'status' => 'nullable',
        ];
    }
    public function addSubCategory()
    {
        $this->validate();
        SubCategory::create([
            'category_id' => $this->category,
            'name' => $this->name,
            'status' => $this->status == true ? '1':'0'
        ]);
        // $this->alert('success', 'Sub-category Added Successfully', [
        //     'position' => 'top-end',
        //     'timer' => '5000',
        //     'toast' => true,
        //     'text' => '',
        // ]);
        session()->flash('message','Sub-category Added Successfully !!');
        $this->closeModal(); // to hide the add modal
    }
    public function edit($sub_category_id)
    {
        $subcategory = SubCategory::find($sub_category_id);
        $this->category = $subcategory->category_id;
        $this->name = $subcategory->name;
        $this->status = $subcategory->status;
        $this->sub_category_id = $sub_category_id;

        if($this->getErrorBag()) // if errors of validation from add colors then, remove all the errors
            $this->resetErrorBag();

        $this->showModal('update'); // to show update modal
    }
    public function updateSubCategory()
    {
        $this->validate();
        SubCategory::find($this->sub_category_id)->update([
            'category_id' => $this->category,
            'name' => $this->name,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Sub-category Updated Successfully !!');
        $this->closeModal();
    }
    public function deleteSubCategory($color_id)
    {
        $this->sub_category_id = $color_id;
        $this->showModal('delete');
    }
    public function destroySubCategory()
    {
        $subcategory = SubCategory::find($this->sub_category_id);
        $subcategory->delete();
        session()->flash('message','Sub-category Deleted Successfully !!');
        $this->closeModal();
        $this->resetInput();
    }
}
