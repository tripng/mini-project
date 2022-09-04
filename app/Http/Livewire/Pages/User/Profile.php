<?php

namespace App\Http\Livewire\Pages\User;

use App\Models\User;
use App\Models\College;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.pages.user.profile',[
            'user' => User::with('college')->where('id',auth()->user()->id)->first(),
            'mahasiswa' => College::where('user_id',auth()->user()->id)->first(),
        ]);
    }
}