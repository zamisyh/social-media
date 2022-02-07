<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use App\Models\Like;
use App\Models\Comment;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'confirmed',
        'canceled',
        'getLatestData', 'getLatestComment'
    ];

    public $name, $gender, $birthday, $age, $data_latest, $openFormComment;
    public $comment_text, $data_comment;

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

    public function likePost($id)
    {
        $like = Like::where('user_id', Auth::user()->id)->first();

        $like->posts()->attach([
            'post_id' => $id
        ]);

    }

    public function unlikePost($id)
    {
        $like = Like::where('user_id', Auth::user()->id)->first();

        $like->posts()->detach([
            'post_id' => $id
        ]);
    }

    public function getLatestComment()
    {
        $this->data_comment = Comment::with('profiles', 'comment')->orderBy('created_at', 'DESC')->get();
    }

    public function openComment($id)
    {
        $this->getLatestComment();
        $this->openFormComment = $id;
    }

    public function closeComment($id)
    {
        $this->openFormComment = false;
    }

    public function saveComment($id)
    {
        $this->validate([
            'comment_text' => 'required'
        ]);

        try {

            $comment = Comment::create([
                'user_id' => Auth::user()->id,
                'text' => $this->comment_text
            ]);

            $comment->posts()->attach([
                'post_id' => $id
            ]);

            $this->reset(['comment_text']);
            $this->emit('getLatestComment');


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
