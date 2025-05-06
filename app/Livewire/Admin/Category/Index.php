<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class Index extends Component
{
    public $category_id;
    public $modal = 0; // to hide the modal
    public function render()
    {
        $categories = Category::orderby('id','DESC')->paginate(5);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
    public function openModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function deleteCategory($category_id)
    {
        $this->openModal();
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        if($category->getFirstMediaUrl() != null)
            $category->clearMediaCollection();
        $category->delete();
        session()->flash('message','Category deleted successfully !!!');
        $this->closeModal();
    }
}
