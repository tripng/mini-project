<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

class ShowCourse extends Component
{
    public $course;

    public function mount($course){
        $this->course = Course::where('code',$course)->first();
    }

    public function delete(){
        Course::destroy($this->course->id);
        
        session()->flash('message', 'Matakuliah Berhasil Dihapus.');
        return redirect()->route('admin.courses');
    }
    
    public function render()
    {
        return view('livewire.admin.show-course');
    }
}