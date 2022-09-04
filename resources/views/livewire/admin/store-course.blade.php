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
@section('title','Tambah Matakuliah')    
<div id="main">
    <form wire:submit.prevent="store">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Matakuliah</h4>
                </div>
                <div class="card-body">
                        <label>Kode Matakuliah: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Kode Matakuliah"
                                class="form-control @error('code') is-invalid @enderror" wire:model="code">
                            @error('code')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror    
                        </div>
                        <label>Nama Matakuliah: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Matakuliah"
                                class="form-control @error('name') is-invalid @enderror" wire:model="name">
                            @error('name')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror    
                        </div>
                        <label>Deskripsi: </label>
                        <div class="form-group">
                            <textarea placeholder="Deskripsi Matakuliah" wire:model="description" style="height: 100px;" class="form-control"></textarea>
                            @error('description')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>SCPL: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Standar Capaian Pembelajaran Lulusan"
                                class="form-control" wire:model="scpl">
                            @error('scpl')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>SKS: </label>
                        <div class="form-group">
                            <input type="number" placeholder="SKS Matakuliah"
                                class="form-control" wire:model="sks">
                            @error('sks')
                                <div class="text-danger">
                                    <i class="bx bx-radio-circle"></i>
                                    <span class="error">*{{ $message }}</span> 
                                </div>
                            @enderror 
                        </div>
                        <label>Untuk Jenjang Studi </label>
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="for_level"
                                        id="level1" value="S1">
                                    <label class="form-check-label" for="level1">
                                        S1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="for_level"
                                        id="level2" value="S2">
                                    <label class="form-check-label" for="level2">
                                        S2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="for_level"
                                        id="level3" value="S3">
                                    <label class="form-check-label" for="level3">
                                        S3
                                    </label>
                                </div>
                                @error('for_level')
                                    <div class="text-danger">
                                        <i class="bx bx-radio-circle"></i>
                                        <span class="error">*{{ $message }}</span> 
                                    </div>
                                @enderror 
                            </div>
                        </div>
                        <label>Status: </label>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="type"
                                    id="flexRadioDefault1" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Wajib
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="type"
                                    id="flexRadioDefault2" value="0">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pilihan
                                </label>
                            </div>
                            @error('type')
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
            <button type="submit" class="btn btn-primary w-25">Tambah Data</button>
        </form>
</div>