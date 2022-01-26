<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{

    use LivewireAlert;

    public $nameShort, $bio, $address, $website;
    public $closeModal;

    public function mount()
    {
        $data = User::where('id', Auth::user()->id)->with('profiles')->first();
        $data->profiles->name;

        $words = explode(" ", $data->profiles->name);
        $this->nameShort = "";

        foreach ($words as $w) {
            $this->nameShort .= $w[0];
        }

        $this->bio = $data->profiles->bio;
        $this->address = $data->profiles->address;
        $this->website = $data->profiles->website;
        $this->user_id = Auth::user()->id;

    }

    public function render()
    {
        return view('livewire.components.profile.index')->extends('layouts.app')->section('content');
    }

    public function updateProfile($id)
    {

        $this->validate([
            'bio' => 'required',
            'address' => 'required',
            'website' => 'required|url'
        ]);

       try {
            Profile::updateOrCreate([
                'user_id' => $id
            ],[
                'bio' => $this->bio,
                'address' => $this->address,
                'website' => $this->website
            ]);

            $this->alert(
                'success',
                'Succesfully update profile'
            );

            $this->closeModal = true;
       } catch (\Exception $e) {
           dd($e->getMessage());
       }
    }
}
