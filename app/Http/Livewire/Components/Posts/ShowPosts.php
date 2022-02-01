<?php

namespace App\Http\Livewire\Components\Posts;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShowPosts extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'getLatestData',
        'confirmed',
        'canceled',
        'latest', 'for_you', 'following'
    ];

    public $data_latest;
    public $nameShort, $postId;

    public function mount()
    {
        $this->getLatestData();

        $data = User::where('id', Auth::user()->id)->with('profiles')->first();
        $data->profiles->name;

        $words = explode(" ", $data->profiles->name);
        $this->nameShort = "";

        foreach ($words as $w) {
            $this->nameShort .= $w[0];
        }

    }


    public function render()
    {
        return view('livewire.components.posts.show-posts')->extends('layouts.app')->section('content');
    }

    public function getLatestData()
    {
        $this->data_latest = Post::with('profiles')->orderBy('created_at', 'DESC')->get();
    }

    public function deletePost($id)
    {
        $this->confirm('Are you sure delete this post?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);

        $this->postId = $id;
    }

    public function confirmed()
    {
        $data = Post::findOrFail($this->postId);

        $path = public_path('storage/images/posts/' . $data->file);
        File::exists($path) ? File::delete($path) : '';
        $data->delete();

        $this->alert('success', 'Succesfully delete post!');
        $this->emit('getLatestData');
        $this->emit('postCreated');
    }

    public function latest()
    {
       $this->getLatestData();
    }

    public function for_you()
    {
        $this->data_latest = Post::with('profiles')->inRandomOrder()->get();
    }

    public function following()
    {
        dd('following');
    }
}
