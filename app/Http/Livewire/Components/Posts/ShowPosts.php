<?php

namespace App\Http\Livewire\Components\Posts;

use Livewire\Component;

class ShowPosts extends Component
{
    public function render()
    {
        return view('livewire.components.posts.show-posts')->extends('layouts.app')->section('content');
    }
}
