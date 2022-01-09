<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Signup extends Component
{

    public $email, $username, $password, $confirm_password;
    public $isShowPassword, $isShowConfirmPassword, $isNextForm;

    public function render()
    {
        return view('livewire.auth.signup')->extends('layouts.app')->section('content');
    }

    public function updatedConfirmPassword()
    {
        $this->validate([
            'confirm_password' => 'same:password'
        ]);
    }


    public function formValidation()
    {
       $this->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
            ],
            'confirm_password' => 'required'
        ]);

    }
}
