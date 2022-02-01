<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Profile;

class SuggestionFollowing extends Component
{

    public $data_following, $limitData = 2;


    public function mount()
    {
        $this->data_following = Profile::inRandomOrder()->limit($this->limitData)->get();
    }

    public function render()
    {
        return view('livewire.components.suggestion-following')->extends('layouts.app')->section('content');
    }

    public function incrementLimit()
    {
        dd('work');
    }
}
