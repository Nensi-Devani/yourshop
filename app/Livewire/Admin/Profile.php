<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\Component;

class Profile extends Component
{
    use LivewireAlert, WithFileUploads;
    public $edit=false, $changePassword = false;

    public $address, $pin_code, $phone_no, $name, $email, $user, $old_password, $new_password, $confirm_password, $image;
    public function render()
    {
        $this->user = User::findOrFail(auth()->user()->id);
        if($this->user)
        {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
        }
        // image update
        if($this->image)
        {
            $this->user->clearMediaCollection();
            $this->user->addMedia($this->image)->toMediaCollection();
            session()->flash('message','Profile picture updated successfully.');
            // $this->alert('success', 'Profile picture updated successfully.', [
            //     'position' => 'top-end',
            //     'timer' => '5000',
            //     'toast' => true,
            //     'text' => '',
            // ]);
            $this->image = null;
        }
        return view('livewire.admin.profile')->extends('layouts.admin')->section('content');
    }
    public function editProfile()
    {
        $this->edit = true;
    }
    public function changePass()
    {
        $this->changePassword = true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
    public function updateProfile()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name
        ]);

        session()->flash('message','Profile updated successfully.');
        // $this->alert('success', 'Profile updated successfully.', [
        //     'position' => 'top-end',
        //     'timer' => '5000',
        //     'toast' => true,
        //     'text' => '',
        // ]);
        $this->edit = false;
    }
    public function setNewPassword()
    {
        $rule = [
            'old_password' => 'required',
        ];
        $rules = [
            'new_password' => 'required|min:8|max:12',
            'confirm_password' => 'required|min:8|max:12',
        ];
        $this->validate($rule);
        $currentPass = Hash::check($this->old_password, auth()->user()->password);
        if($currentPass)
        {
            $this->validate($rules);
            if($this->new_password == $this->confirm_password)
            {
                $this->user->update([
                    'password' => Hash::make($this->new_password)
                ]);
                session()->flash('message','Password changed successfully.');
                // $this->alert('success', 'Password changed successfully.', [
                //     'position' => 'top-end',
                //     'timer' => '5000',
                //     'toast' => true,
                //     'text' => '',
                // ]);
                $this->changePassword = false;
            }
            else
                // $this->alert('error', 'New password and Confirm password does not match.', [
                //     'position' => 'top-end',
                //     'timer' => '5000',
                //     'toast' => true,
                //     'text' => '',
                // ]);
                session()->flash('error','New password and Confirm password does not match.');
        }
        else
            session()->flash('error','Old password does not match.');
            // $this->alert('error', 'Old password does not match.', [
            //     'position' => 'top-end',
            //     'timer' => '5000',
            //     'toast' => true,
            //     'text' => '',
            // ]);
    }
}
