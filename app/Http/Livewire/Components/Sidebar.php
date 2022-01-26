<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{

    public $currentDash;

    public function mount()
    {
        $this->currentDash = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.components.sidebar')->extends('layouts.app')->section('content');
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('message', 'Succesfully logout');
        return redirect()->route('auth.signin');
    }

}
