<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Signin extends Component
{
    public function render()
    {
        return view('livewire.auth.signin')->extends('layouts.app')->section('content');
    }
}
