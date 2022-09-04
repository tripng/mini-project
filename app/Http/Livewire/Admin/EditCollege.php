<?php

namespace App\Http\Livewire\Admin;

use App\Models\College;
use App\Models\Data;
use App\Models\User;
use Livewire\Component;

class EditCollege extends Component
{
    public $nik,$email,$name,$birthday,$gender,$religion,$address,$phone_number,$generation, $level_of_study,$fakultas,$major,$entrance,$ipk,$semester=1,$status='Aktif',$nim,$user;
    
    protected $rules = [
        'nim' => 'required|numeric',
        'nik' => 'required|numeric',
        'email' => 'required|email',
        'name' => 'required',
        'birthday' => 'required',
        'gender' => 'required',
        'religion' => 'required',
        'address' => 'required',
        'phone_number' => 'required|numeric',
        'status' => 'required',
        'generation' => 'required|numeric', 
        'level_of_study' => 'required',
        'fakultas' => 'required',
        'major' => 'required',
        'entrance' => 'required',
        'ipk' => 'required',
        'semester' => 'required',
    ];

    public function mount($nim){
        $this->nim = $nim;
        $this->user = User::where('nim',$nim)->first();
        $this->nik = $this->user->college->nik;
        $this->email = $this->user->college->email;
        $this->name = $this->user->college->name;
        $this->birthday = $this->user->college->birthday;
        $this->gender = $this->user->college->gender;
        $this->religion = $this->user->college->religion;
        $this->address = $this->user->college->address;
        $this->phone_number = $this->user->college->phone_number;
        $this->status = $this->user->college->data->status;
        $this->generation = $this->user->college->data->generation;
        $this->level_of_study = $this->user->college->data->level_of_study;
        $this->fakultas = $this->user->college->data->fakultas;
        $this->major = $this->user->college->data->major;
        $this->entrance = $this->user->college->data->entrance;
        $this->ipk = $this->user->college->data->ipk;
        $this->semester = $this->user->college->data->semester;
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function edit(){
        $validatedData = collect($this->validate());
        Data::where('id',$this->user->college->data->id)->update([
            'status' => gettype($validatedData['status'])=='array' ? $validatedData['status']['value'] : $validatedData['status'],
            'generation' => $validatedData['generation'],
            'level_of_study' => $validatedData['level_of_study'],
            'fakultas' => $validatedData['fakultas'],
            'major' => $validatedData['major'],
            'entrance' => $validatedData['entrance'],
            'ipk' => $validatedData['ipk'],
            'semester' => gettype($validatedData['semester'])=='array' ? $validatedData['semester']['value'] : $validatedData['semester']
        ]);
        User::where('id',$this->user->id)->update([
            'nim' => $validatedData['nim'],
        ]);
        College::where('id',$this->user->college->id)->update([
            'nik' => $validatedData['nik'],
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'birthday' => $validatedData['birthday'],
            'gender' => $validatedData['gender'],
            'religion' => $validatedData['religion'],
            'address' => $validatedData['address'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        session()->flash('message', 'Data Mahasiswa Berhasil Diubah.');
        return redirect()->route('admin.colleges');
    }

    public function render()
    {
        return view('livewire.admin.edit-college');
    }
}