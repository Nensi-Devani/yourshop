<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\Component;

class UserProfile extends Component
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
            $userDetails = $this->user->userDetail()->first();
            if($userDetails)
            {
                $this->address = $userDetails->address;
                $this->pin_code = $userDetails->pin_code;
                $this->phone_no = $userDetails->phone_no;
            }
        }
        if($this->image)
        {
            $this->user->clearMediaCollection();
            $this->user->addMedia($this->image)->toMediaCollection();
            $this->alert('success', 'Profile picture updated successfully.', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
            $this->image = null;
        }
        return view('livewire.frontend.user-profile')->extends('layouts.app')->section('content');
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
            'address' => 'required',
            'pin_code' => 'required|min:6|max:6',
            'phone_no' => 'required|min:10|max:10'
        ];
    }
    public function updateProfile()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name
        ]);

        $this->user->userDetail()->updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            [
                'address' => $this->address,
                'pin_code' => $this->pin_code,
                'phone_no' => $this->phone_no,
            ]
        );

        $this->alert('success', 'Profile updated successfully.', [
            'position' => 'bottom-end',
            'timer' => '5000',
            'toast' => true,
            'text' => '',
        ]);
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
                $this->alert('success', 'Password changed successfully.', [
                    'position' => 'bottom-end',
                    'timer' => '5000',
                    'toast' => true,
                    'text' => '',
                ]);
                $this->changePassword = false;
            }
            else
                $this->alert('error', 'New password and Confirm password does not match.', [
                    'position' => 'bottom-end',
                    'timer' => '5000',
                    'toast' => true,
                    'text' => '',
                ]);
        }
        else
            $this->alert('error', 'Old password does not match.', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
    }
}
