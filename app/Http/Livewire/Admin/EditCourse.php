<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

class EditCourse extends Component
{
    public $code,$name,$description,$scpl,$sks,$for_level,$type,$course;
    
    protected $rules = [
        'code' => 'required|numeric',
        'name' => 'required',
        'description' => 'required',
        'scpl' => '',
        'sks' => 'required|numeric',
        'for_level' => 'required',
        'type' => 'required',
    ];
    public function mount($course){
        $this->course = Course::where('code',$course)->first();
        $this->code = $course;
        $this->name = $this->course->name;
        $this->description = $this->course->description;
        $this->scpl = $this->course->scpl;
        $this->sks = $this->course->sks;
        $this->for_level = $this->course->for_level;
        $this->type = $this->course->type;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function edit(){
        $validatedData = $this->validate();
        Course::where('id',$this->course->id)->update($validatedData);

        session()->flash('message', 'Matakuliah Berhasil Diubah.');
        return redirect()->route('admin.courses');
    }
    
    public function render()
    {
        return view('livewire.admin.edit-course');
    }
}