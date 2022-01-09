<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Signup extends Component
{
    public function render()
    {
        return view('livewire.auth.signup')->extends('layouts.app')->section('content');
    }
}
