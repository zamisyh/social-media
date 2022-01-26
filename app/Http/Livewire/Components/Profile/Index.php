<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $name;

    public function mount()
    {
        $data = User::where('id', Auth::user()->id)->with('profiles')->first();
        $data->profiles->name;

        $words = explode(" ", $data->profiles->name);
        $this->name = "";

        foreach ($words as $w) {
            $this->name .= $w[0];
        }
    }

    public function render()
    {
        return view('livewire.components.profile.index')->extends('layouts.app')->section('content');
    }

}
