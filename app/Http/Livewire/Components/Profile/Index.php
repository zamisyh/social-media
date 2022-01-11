<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.components.profile.index')->extends('layouts.app')->section('content');
    }
}
