<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{

    public $changeTheme = 'light';

    public function render()
    {
        return view('livewire.home')->extends('layouts.app')->section('content');
    }


    public function updatedChangeTheme()
    {
        $this->emit('changeThemeOn', $this->changeTheme);
    }
}
