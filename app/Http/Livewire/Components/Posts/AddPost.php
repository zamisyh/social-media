<?php

namespace App\Http\Livewire\Components\Posts;

use Livewire\Component;

class AddPost extends Component
{
    public function render()
    {
        return view('livewire.components.posts.add-post')->extends('layouts.app')->section('content');
    }
}
