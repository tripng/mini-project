<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

class CourseData extends Component
{
    public $courses;
    
    public function mount(){
        $this->courses = Course::latest()->get();
    }
    
    public function render()
    {
        return view('livewire.admin.read-data');
    }
}