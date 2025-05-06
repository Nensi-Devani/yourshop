<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use WithFileUploads, LivewireAlert;
    public $name, $bigScreenLogo, $smallScreenLogo, $description, $address, $pincode, $email, $phone_no1, $phone_no2, $copyrightText,
           $facebook_link, $twitter_link, $instagram_link, $youtube_link;
    public $setting;
    public function render()
    {
        $this->setting = Setting::first();
        if($this->setting)
        {
            $this->name = $this->setting->name;
            $this->description = $this->setting->description;
            $this->address = $this->setting->address;
            $this->pincode = $this->setting->pincode;
            $this->email = $this->setting->email;
            $this->phone_no1 = $this->setting->phone_no1;
            $this->phone_no2 = $this->setting->phone_no2;
            $this->copyrightText = $this->setting->copyright_text;
            $this->facebook_link = $this->setting->facebook_link;
            $this->twitter_link = $this->setting->twitter_link;
            $this->instagram_link = $this->setting->instagram_link;
            $this->youtube_link = $this->setting->youtube_link;
        }
        return view('livewire.admin.setting.index')->extends('layouts.admin')->section('content');
    }
    public function resetInput()
    {
        $this->bigScreenLogo = null;
        $this->smallScreenLogo = null;
    }
    public function website()
    {
        $rules = [
            'name' => 'required',
            'bigScreenLogo' => 'nullable|image',
            'smallScreenLogo' => 'nullable|image',
        ];
        $this->validate($rules);
        if(!$this->setting)
            Setting::create([
                'name' => $this->name
            ]);
        else
            Setting::where('id',$this->setting->id)->update([
                'name' => $this->name
            ]);
        if($this->bigScreenLogo){
            $this->setting->clearMediaCollection('big_screen');
            $this->setting->addMedia($this->bigScreenLogo)->toMediaCollection('big_screen');
        }
        if($this->smallScreenLogo){
            $this->setting->clearMediaCollection('small_screen');
            $this->setting->addMedia($this->smallScreenLogo)->toMediaCollection('small_screen');
        }
        $this->resetInput();
        session()->flash('message','Website Settings Updated Successfully !!');
    }
    public function websiteInformation()
    {
        if(!$this->setting)
            $this->alert('error', 'Please set the website name/title', [
                'position' => 'top-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
        else
        {
            $rules = [
                'description' => 'required',
                'address' => 'required',
                'pincode' => 'required|min:6|max:6',
                'email' => 'required|email',
                'phone_no1' => 'required|min:10|max:10',
                'phone_no2' => 'nullable|min:10|max:10',
                'copyrightText' => 'required',
            ];
            $this->validate($rules);
            Setting::where('id',$this->setting->id)->update([
                'description' => $this->description,
                'address' => $this->address,
                'pincode' => $this->pincode,
                'email' => $this->email,
                'phone_no1' => $this->phone_no1,
                'phone_no2' => $this->phone_no2==null?null:$this->phone_no2,
                'copyright_text' => $this->copyrightText,
            ]);
            session()->flash('message','Website Informations Updated Successfully !!');
        }
    }
    public function socialLink()
    {
        if(!$this->setting)
            $this->alert('error', 'Please set the website name/title', [
                'position' => 'top-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
        else
        {
            Setting::where('id',$this->setting->id)->update([
                'facebook_link' => $this->facebook_link,
                'twitter_link' => $this->twitter_link,
                'instagram_link' => $this->instagram_link,
                'youtube_link' => $this->youtube_link,
            ]);
            session()->flash('message','Social Links Updated Successfully !!');
        }
    }
}
