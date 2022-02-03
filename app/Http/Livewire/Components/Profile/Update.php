<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'confirmed',
        'canceled',
        'getLatestData'
    ];

    public $name, $gender, $birthday, $age, $data_latest;

    public function mount()
    {
        $data = User::where('id', Auth::user()->id)->with('profiles')->first();
        $this->name = $data->profiles->name;
        $this->gender = $data->profiles->gender;
        $this->birthday = $data->profiles->birthday;
        $this->age = $data->profiles->age;
        $this->getLatestData();


    }

    public function render()
    {
        return view('livewire.components.profile.update')->extends('layouts.app')->section('content');
    }

    public function getLatestData()
    {
        $this->data_latest = Post::with('profiles')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
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
}
