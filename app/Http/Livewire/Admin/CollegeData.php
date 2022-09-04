<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\College;

class CollegeData extends Component
{
    public function render()
    {
        return view('livewire.admin.read-data',[
            'colleges' => College::with('data','user')->latest()->get(),
        ]);
    }
}