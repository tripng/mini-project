@once
    @push('style')
        <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <style>
            label{
                font-weight: bold;
            }
        </style>
    @endpush
    @push('script')
        <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
    @endpush
@endonce
@section('title','Edit Matakuliah')    
<div id="main">
    <form wire:submit.prevent="edit">
        @csrf
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                        <label>Nim: </label>
                        <div class="form-group">
                            <input type="text" placeholder="NIM Mahasiswa"
                                class="form-control @error('nim') is-invalid @enderror" wire:model="nim" value="text">
                            @error('nim')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror    
                        </div>
                        <label>Nik: </label>
                        <div class="form-group">
                            <input type="text" placeholder="NIK Mahasiswa"
                                class="form-control @error('nik') is-invalid @enderror" wire:model="nik">
                            @error('nik')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror    
                        </div>
                        <label>Email: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Email Aktif"
                                class="form-control" wire:model="email">
                            @error('email')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Lengkap Mahasiswa"
                                class="form-control" wire:model="name">
                            @error('name')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>Tanggal Lahir: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Tanggal Lahir Sesuai KTP"
                                class="form-control" wire:model="birthday">
                            @error('birthday')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>Jenis Kelamin: </label>
                        <div class="form-group d-flex justify-content-evenly">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="gender"
                                    id="flexRadioDefault1" value="Laki-Laki">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="gender"
                                    id="flexRadioDefault2" value="Perempuan">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                            @error('gender')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>

                        <label>Agama: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Agama Mahasiswa"
                                class="form-control" wire:model="religion">
                            @error('religion')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>Alamat: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Alamat Sesuai KTP"
                                class="form-control" wire:model="address">
                            @error('address')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>No Telepon: </label>
                        <div class="form-group">
                            <input type="text" placeholder="No Telepon Aktif"
                                class="form-control" wire:model="phone_number">
                            @error('phone_number')
                            <div class="text-danger">
                                <i class="bx bx-radio-circle"></i>
                                <span class="error">*{{ $message }}</span> 
                            </div>
                            @enderror 
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Perkuliahan</h4>
                </div>
                <div class="card-body">
                            <label>Status :</label>
                            <div class="form-group" wire:ignore>
                                <select class="form-select" wire:model="status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Cuti">Cuti</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                    <option value="Drop Out">Drop Out</option>
                                    <option value="Skorsing">Skorsing</option>
                                    <option value="Passing Out">Passing Out</option>
                                </select>
                                @error('status')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                                @enderror 
                            </div>
                            <label>Angkatan : </label>
                            <div class="form-group">
                                <input type="text" placeholder="Angkatan Mahasiswa"
                                    class="form-control" wire:model="generation">
                                    @error('generation')
                                    <div class="text-danger">
                                        <i class="bx bx-radio-circle"></i>
                                        <span class="error">*{{ $message }}</span> 
                                    </div>
                                @enderror 
                            </div>
                            <label>Jenjang Studi : </label>
                            <div class="form-group">
                                <div class="form-group d-flex justify-content-evenly">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="level_of_study"
                                            id="level1" value="S1">
                                        <label class="form-check-label" for="level1">
                                            S1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="level_of_study"
                                            id="level2" value="S2">
                                        <label class="form-check-label" for="level2">
                                            S2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="level_of_study"
                                            id="level3" value="S3">
                                        <label class="form-check-label" for="level3">
                                            S3
                                        </label>
                                    </div>
                                    @error('level_of_study')
                                        <div class="text-danger">
                                            <i class="bx bx-radio-circle"></i>
                                            <span class="error">*{{ $message }}</span> 
                                        </div>
                                    @enderror 
                                </div>
                            </div>
                            <label>Fakultas : </label>
                            <div class="form-group">
                                <input type="text" placeholder="Fakultas Mahasiswa"
                                    class="form-control" wire:model="fakultas">
                                    @error('fakultas')
                                    <div class="text-danger">
                                        <i class="bx bx-radio-circle"></i>
                                        <span class="error">*{{ $message }}</span> 
                                    </div>
                                @enderror 
                            </div>
                            <label>Jurusan : </label>
                            <div class="form-group">
                                <input type="text" placeholder="Jurusan Mahasiswa"
                                    class="form-control" wire:model="major">
                                    @error('major')
                                    <div class="text-danger">
                                        <i class="bx bx-radio-circle"></i>
                                        <span class="error">*{{ $message }}</span> 
                                    </div>
                                @enderror 
                            </div>
                            <label>Jalur Masuk : </label>
                            <div class="form-group">
                                <div class="form-group d-flex justify-content-evenly">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="entrance"
                                            id="entrance1" value="SNMPTN">
                                        <label class="form-check-label" for="entrance1">
                                            SNMPTN
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="entrance"
                                            id="entrance2" value="SBMPTN">
                                        <label class="form-check-label" for="entrance2">
                                            SBMPTN
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="entrance"
                                            id="entrance3" value="MANDIRI">
                                        <label class="form-check-label" for="entrance3">
                                            MANDIRI
                                        </label>
                                    </div>
                                    @error('entrance')
                                        <div class="text-danger">
                                            <i class="bx bx-radio-circle"></i>
                                            <span class="error">*{{ $message }}</span> 
                                        </div>
                                    @enderror 
                                </div>
                            </div>
                            <label>Ipk : </label>
                            <div class="form-group">
                                <input type="text" placeholder="Ipk Saat Ini"
                                    class="form-control" wire:model="ipk">
                                    @error('ipk')
                                    <div class="text-danger">
                                        <i class="bx bx-radio-circle"></i>
                                        <span class="error">*{{ $message }}</span> 
                                    </div>
                                @enderror 
                            </div>
                            <label>Semester : </label>
                            <div class="form-group" wire:ignore>
                                <select class="form-select" wire:model="semester">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                @error('semester')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                                @enderror 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-25">Ubah Data</button>
        </form>
</div>