<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\College;
use App\Models\Data;
use Livewire\Component;
use PDF;

class ShowCollege extends Component
{
    public $user;

    public function mount($nim){
        $this->user = User::where('nim',$nim)->with('college')->first();
    }
    
    public function delete(){
        User::destroy($this->user->id);
        College::destroy($this->user->college->id);
        Data::destroy($this->user->college->data->id);
        
        session()->flash('message', 'Mahasiswa Berhasil Dihapus.');
        return redirect()->route('admin.colleges');
    }
    
    public function pdf(){
        $pdfContent = PDF::loadView('livewire.admin.college_pdf', ['college' => $this->user])->setOptions(['defaultFont' => 'sans-serif'])->output();
        return response()->streamDownload(
            fn () => print($pdfContent),$this->user->college->name.'_'.$this->user->nim.'.pdf'
        );
    }
    
    public function render()
    {
        return view('livewire.admin.show-college');
    }
}