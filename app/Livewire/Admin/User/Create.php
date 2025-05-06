<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $password, $role;
    public function render()
    {
        return view('livewire.admin.user.create')->extends('layouts.admin')->section('content');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12',
            'role' => 'nullable',
        ];
    }
    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->role_as = null;
    }
    public function storeUser()
    {
        $this->validate();
        User::create([
            'name' =>$this->name,
            'email' =>$this->email,
            'password' =>Hash::make($this->password),
            'role_as'=>$this->role ?? 0
        ]);
        $this->resetInput();
        return redirect('admin/users')->with('message','User Added Successfully');
    }
}
