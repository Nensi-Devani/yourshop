<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $title,$description,$status=1,$image,$newimage,$slider_id;
    public $add = 0,$update = 0,$delete = 0;
    public function render()
    {
        $sliders = Slider::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.slider.index',compact('sliders'))
                ->extends('layouts.admin')
                ->section('content');
    }
    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->status = null;
        $this->slider_id = null;
        $this->image = null;
        $this->newimage = null;
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
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable',
            'image' => 'required|image'
        ];
    }
    public function addSlider()
    {
        $this->validate();
        $slider = Slider::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status == true ? '1':'0'
        ]);
        $slider->addMedia($this->image)->toMediaCollection();
        session()->flash('message','Slider Added Successfully !!');
        $this->closeModal(); // to hide the add modal
    }
    public function edit($slider_id)
    {
        $slider = Slider::find($slider_id);
        $this->title = $slider->title;
        $this->description = $slider->description;
        $this->status = $slider->status;
        $this->image = $slider->getFirstMediaUrl();
        $this->slider_id = $slider_id;

        if($this->getErrorBag()) // if errors of validation from add slider then, remove all the errors
            $this->resetErrorBag();

        $this->showModal('update'); // to show update modal
    }
    public function updateSlider()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'nullable',
            'newimage' => 'nullable|image', // Adjust validation rules as per your requirements
        ]);
        $slider = Slider::find($this->slider_id);
        $slider->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status == true ? '1':'0'
        ]);
        if($this->newimage)
        {
            $slider->clearMediaCollection();
            $slider->addMedia($this->newimage)->toMediaCollection();
        }
        session()->flash('message','Slider Updated Successfully !!');
        $this->closeModal();
    }
    public function deleteSlider($slider_id)
    {
        $this->slider_id = $slider_id;
        $this->showModal('delete');
    }
    public function destroySlider()
    {
        $slider = Slider::find($this->slider_id)->delete();
        session()->flash('message','Slider Deleted Successfully !!');
        $this->closeModal();
    }
}
