<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

class StoreCourse extends Component
{
    public $code,$name,$description,$scpl,$sks,$for_level,$type;
    
    protected $rules = [
        'code' => 'required|numeric',
        'name' => 'required',
        'description' => 'required',
        'scpl' => '',
        'sks' => 'required|numeric',
        'for_level' => 'required',
        'type' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function store(){
        $validatedData = $this->validate();
        Course::create($validatedData);

        session()->flash('message', 'Matakuliah Berhasil Dibuat.');
        return redirect()->route('admin.courses');
    }
    
    public function render()
    {
        return view('livewire.admin.store-course');
    }
}