<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Signin extends Component
{

    use LivewireAlert;

    public $email, $password, $isRedirect;

    public function render()
    {
        return view('livewire.auth.signin')->extends('layouts.app')->section('content');
    }

    public function login()
    {
        $this->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        try {

            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $this->alert('success', 'Succesfully login', [
                    'position' => 'center',
                    'timer' => 4000,
                    'toast' => false,
                ]);

                $this->isRedirect = true;
            }else{
                $this->alert('error', 'Opppss, something error on your credentials', [
                    'position' => 'top-end',
                    'timer' => 4000,
                    'toast' => true,
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
