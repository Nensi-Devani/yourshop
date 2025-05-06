<?php

namespace App\Livewire\Admin\Color;

use App\Models\Color;
use Livewire\Component;

class Index extends Component
{
    public $name,$code,$status = 1,$color_id;
    public $add = 0,$update = 0,$delete = 0; // for modal show/hide
    public function render()
    {
        $colors = Color::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.color.index',compact('colors'))
                ->extends('layouts.admin')
                ->section('content');
    }
    public function resetInput()
    {
        $this->name = null;
        $this->code = null;
        $this->status = null;
        $this->color_id = null;
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
            'name' => 'required|string',
            'code' => 'required|string',
            'status' => 'nullable',
        ];
    }
    public function addColor()
    {
        $this->validate();
        Color::create([
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Color Added Successfully !!');
        $this->closeModal(); // to hide the add modal
    }
    public function edit($color_id)
    {
        $color = Color::find($color_id);
        $this->name = $color->name;
        $this->code = $color->code;
        $this->status = $color->status;
        $this->color_id = $color_id;

        if($this->getErrorBag()) // if errors of validation from add colors then, remove all the errors
            $this->resetErrorBag();

        $this->showModal('update'); // to show update modal
    }
    public function updateColor()
    {
        $this->validate();
        Color::find($this->color_id)->update([
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status == true ? '1':'0'
        ]);
        session()->flash('message','Color Updated Successfully !!');
        $this->closeModal();
    }
    public function deleteColor($color_id)
    {
        $this->color_id = $color_id;
        $this->showModal('delete');
    }
    public function destroyColor()
    {
        $color = Color::find($this->color_id);
        $color->delete();
        session()->flash('message','Color Deleted Successfully !!');
        $this->closeModal();
        $this->resetInput();
    }
}
