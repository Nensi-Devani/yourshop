<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $user_id, $modal=false;
    public function render()
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.user.index',compact('users'))->extends('layouts.admin')->section('content');
    }
    public function deleteUser($user_id)
    {
        $this->user_id = $user_id;
        $this->modal = true;
    }
    public function destroyUser()
    {
        $user = User::findOrFail($this->user_id);
        $user->delete();
        $this->closeModal();
        session()->flash('message','User deleted Successfully.');
    }
    public function closeModal()
    {
        $this->modal = false;
    }
}
