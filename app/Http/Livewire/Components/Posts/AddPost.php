<?php

namespace App\Http\Livewire\Components\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddPost extends Component
{
    use WithFileUploads, LivewireAlert;

    public $text, $file, $type;

    public function render()
    {
        return view('livewire.components.posts.add-post')->extends('layouts.app')->section('content');
    }

    public function savePosts($id)
    {
        $this->validate([
            'text' => 'required',
            'type' => 'required',
            'file' => 'required|file|mimes:png,jpg,jpeg,webp'
        ]);

        try {
            $nameFile = 'post-photo' . '-' . rand(10000, 99999) . '-' . time() . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/images/posts', $nameFile);

            Post::create([
                'user_id' => $id,
                'text' => $this->text,
                'type' => $this->type,
                'file' => $nameFile
            ]);

            $this->alert(
                'success',
                'Successfully create post'
            );

            $this->reset(['text', 'type', 'file']);
            $this->emit('postCreated');


        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
