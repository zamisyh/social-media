<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Follow;



class Signup extends Component
{

    use LivewireAlert;
    public $email, $username, $password, $confirm_password, $gender, $name, $birthday;
    public $isShowPassword, $isShowConfirmPassword, $isNextForm, $isSubmit;


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

    public function updated()
    {
        if (
            !is_null($this->email) && !is_null($this->username) && !is_null($this->password)
            && !is_null($this->confirm_password) && !is_null($this->gender) && !is_null($this->name)
            && !is_null($this->birthday)
        ){
            $this->isSubmit = true;
        }
    }

    public function save()
    {
        $this->formValidation();
        $age = \Carbon\Carbon::parse($this->birthday)->age;

        try {

            $user = User::create([
                'name' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);

            $user->profiles()->create([
                'name' => $this->name,
                'gender' => $this->gender,
                'birthday' => $this->birthday,
                'age' => $age
            ]);

            Follow::create([
                'user_id' => $user->id
            ]);

            $this->alert('success', 'Succesfully created data', [
                'position' => 'top-end',
                'timer' => 5000,
                'toast' => true,
                'text' => '',
            ]);

            $this->reset();


        } catch (\Exception $e) {
            $this->alert('error', 'Ooopss, something error. check your form now', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
            ]);
        }

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
            'confirm_password' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required'
        ]);
    }
}
