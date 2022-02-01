<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Profile;

class SuggestionFollowing extends Component
{

    protected $listeners = ['loadMore'];

    public $data_following;
    public $amount = 2;


    public function mount()
    {
        $this->getFollowing();
    }

    public function render()
    {
        return view('livewire.components.suggestion-following')->extends('layouts.app')->section('content');
    }

    public function getFollowing()
    {
        $this->data_following = Profile::inRandomOrder()->take($this->amount)->get();
    }

    public function loadMore()
    {
        $this->amount += 2;
        $this->getFollowing();
    }
}
