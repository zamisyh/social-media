<?php

namespace App\Http\Livewire\Components\Profile;

use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;

class Settings extends Component
{

    use LivewireAlert;

    public $old_password, $new_password, $confirm_password;

    public function render()
    {
        return view('livewire.components.profile.settings')->extends('layouts.app')->section('content');
    }

    public function updatePassword($id)
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
            ],
            'confirm_password' => 'required|same:new_password'
        ]);

        try {
            $checkPass = User::where('id', Auth::user()->id)->pluck('password');
            if (Hash::check($this->old_password, $checkPass[0])) {
                User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($this->new_password)
                ]);

                $this->alert(
                    'success',
                    'Succesfully update password'
                );

                $this->reset(['old_password', 'new_password', 'confirm_password']);
            }else{
                $this->alert(
                    'error',
                    'Old password not same'
                );
            }


        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
