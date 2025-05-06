<?php

namespace App\Livewire\Admin\Material;

use App\Models\Category;
use App\Models\Material;
use Livewire\Component;

class Index extends Component
{
    public $category, $subCategory, $status=1, $material, $material_id;
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
        $materials = Material::latest()->paginate(5);
        return view('livewire.admin.material.index',compact('materials','categories','subCategories'))->extends('layouts.admin')->section('content');
    }
    public function resetInput()
    {
        $this->category = null;
        $this->subCategory = null;
        $this->status = null;
        $this->material = null;
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
            'material' => 'required',
            'status' => 'nullable',
        ];
    }
    public function addMaterial()
    {
        $this->validate();
        Material::create([
            'category_id' => $this->category,
            'sub_category_id' => $this->subCategory,
            'material' => $this->material,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Material Added Successfully !!');
        $this->closeModal(); // to hide the add modal
    }
    public function edit($material_id)
    {
        $marerial = Material::find($material_id);
        $this->category = $marerial->category_id;
        $this->subCategory = $marerial->sub_category_id;
        $this->material = $marerial->material;
        $this->status = $marerial->status;
        $this->material_id = $material_id;

        if($this->getErrorBag()) // if errors of validation from add colors then, remove all the errors
            $this->resetErrorBag();

        $this->showModal('update'); // to show update modal
    }
    public function updateMaterial()
    {
        $this->validate();
        Material::find($this->material_id)->update([
            'category_id' => $this->category,
            'sub_category_id' => $this->subCategory,
            'material' => $this->material,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Material Updated Successfully !!');
        $this->closeModal();
    }
    public function deleteMaterial($material_id)
    {
        $this->material_id = $material_id;
        $this->showModal('delete');
    }
    public function destroyMaterial()
    {
        $material = Material::find($this->material_id);
        $material->delete();
        session()->flash('message','Material Deleted Successfully !!');
        $this->closeModal();
        $this->resetInput();
    }
}
