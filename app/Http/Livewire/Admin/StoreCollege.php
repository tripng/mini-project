<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\College;
use App\Models\Data;
use App\Models\User;

class StoreCollege extends Component
{
    public $nik,$email,$name,$birthday,$gender,$religion,$address,$phone_number,$generation, $level_of_study,$fakultas,$major,$entrance,$ipk,$semester=1,$status='Aktif',$nim;
    
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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function store(){
        $validatedData = collect($this->validate());
        $userLastId = User::latest()->first()->id;
        $idData = Data::create([
            'status' => gettype($validatedData['status'])=='array' ? $validatedData['status']['value'] : $validatedData['status'],
            'generation' => $validatedData['generation'],
            'level_of_study' => $validatedData['level_of_study'],
            'fakultas' => $validatedData['fakultas'],
            'major' => $validatedData['major'],
            'entrance' => $validatedData['entrance'],
            'ipk' => $validatedData['ipk'],
            'semester' => gettype($validatedData['semester'])=='array' ? $validatedData['semester']['value'] : $validatedData['semester']
        ]);
        $idUser = User::create([
            'nim' => $validatedData['nim'],
            'password' => bcrypt('secret')
        ]);
        College::create([
            'data_id' => $idData->id,
            'user_id' => $idUser->id,
            'nik' => $validatedData['nik'],
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'birthday' => $validatedData['birthday'],
            'gender' => $validatedData['gender'],
            'religion' => $validatedData['religion'],
            'address' => $validatedData['address'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        session()->flash('message', 'Mahasiswa Berhasil Dibuat.');
        return redirect()->route('admin.colleges');
    }
    
    public function render()
    {
        return view('livewire.admin.resource-college');
    }
}