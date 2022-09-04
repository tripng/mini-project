<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $nim,$password;
    
    protected $rules = [
        'nim' => 'required|numeric',
        'password' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $validatedData = $this->validate();
        if(Auth::attempt(['nim' => $validatedData['nim'], 'password' => $validatedData['password']])){
            request()->session()->regenerate();
            if(auth()->user()->role == 0) return redirect()->intended('admin/dashboard');
            else return redirect()->intended('/mahasiswa/profile');
        }else{
            dd('Login Gagal!');
        }
    }

    public function render()
    {
        return view('livewire.pages.login');
    }
}