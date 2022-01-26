<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{

    public $name, $gender, $birthday, $age;

    public function mount()
    {
        $data = User::where('id', Auth::user()->id)->with('profiles')->first();
        $this->name = $data->profiles->name;
        $this->gender = $data->profiles->gender;
        $this->birthday = $data->profiles->birthday;
        $this->age = $data->profiles->age;
    }

    public function render()
    {
        return view('livewire.components.profile.update')->extends('layouts.app')->section('content');
    }
}
