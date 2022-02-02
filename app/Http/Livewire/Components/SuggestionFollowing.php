<?php

namespace App\Http\Livewire\Components;

use App\Models\Follow;
use App\Models\FollowUser;
use Livewire\Component;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SuggestionFollowing extends Component
{

    use LivewireAlert;
    protected $listeners = ['loadMore'];

    public $data_following, $foll, $data_follow_user;
    public $amount = 5;


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
        $this->amount += 3;
        $this->getFollowing();
    }

    public function follows($id)
    {
        $follow = Follow::where('user_id', Auth::user()->id)->first();
        $follow->users()->attach([
            'user_id' => $id
        ]);

        $this->alert('success','Succesfully following user');
        $this->emit('getCountFollowing');
    }

    public function unfollow($id)
    {
        $follow = Follow::where('user_id', Auth::user()->id)->first();
        $follow->users()->detach([
            'user_id' => $id
        ]);

        $this->alert('success', 'Successfully unfollow user');
        $this->emit('getCountFollowing');
    }
}
