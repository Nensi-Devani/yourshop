<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $user_id, $name, $email, $password, $role;
    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }
    public function render()
    {
        $user = User::findOrFail($this->user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role_as;
        return view('livewire.admin.user.edit')->extends('layouts.admin')->section('content');
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|',
            'password' => 'nullable|min:8|max:12',
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
    public function editUser()
    {
        $this->validate();
        $data = [
            'name' =>$this->name,
            'email' =>$this->email,
            'role_as'=>$this->role ?? 0,
        ];
        if($this->password != null)
            $data['password'] = Hash::make($this->password);

        User::findOrFail($this->user_id)->update($data);
        $this->resetInput();
        return redirect('admin/users')->with('message','User Update Successfully');
    }

}
