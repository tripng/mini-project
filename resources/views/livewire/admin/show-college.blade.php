@once
    @push('style')
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    @endpush
    @push('script')
        <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
    @endpush
@endonce

@section('title','Data Mahasiswa')

<div class="container">
    <div class="nav">
        <nav class="navbar navbar-light">
            <div class="container d-block">
                <a href="{{route('admin.dashboard')}}"><i class="bi bi-chevron-left"></i></a>
                <a class="navbar-brand ms-4" href="index.html">
                    <img src="{{asset('images/logo/logo.png')}}">
                </a>
            </div>
        </nav>
    </div>
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">{{$user->college->name}} | {{$user->nim}}</h4>
            <div class="action">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger" type="submit">Hapus</button>
                <button class="btn btn-info text-dark" wire:click="pdf">Download Pdf</button>
            </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                            role="tab" aria-controls="home" aria-selected="true">Profile Mahasiswa</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                            role="tab" aria-controls="profile" aria-selected="false">Data Perkuliahan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="list-group">
                            <span class="list-group-item"><b>Nama </b> : {{$user->college->name}}</span>
                            <span class="list-group-item disabled"><b>Nim</b> : {{$user->nim}}</span>
                        <span class="list-group-item disabled"><b>Nik</b> : {{$user->college->nik}}</span>
                        <span class="list-group-item"><b>Email</b> : {{$user->college->email}}</span>
                        <span class="list-group-item"><b>Tanggal Lahir</b> : {{$user->college->birthday}}</span>
                        <span class="list-group-item"><b>Jenis Kelamin</b> : {{$user->college->gender}}</span>
                        <span class="list-group-item"><b>Agama</b> : {{$user->college->religion}}</span>
                        <span class="list-group-item"><b>Alamat</b> : {{$user->college->address}}</span>
                        <span class="list-group-item"><b>No Telepon</b> : {{$user->college->phone_number}}</span>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="list-group">
                        <span class="list-group-item"><b>Status </b> : {{$user->college->data->status}}</span>
                        <span class="list-group-item disabled"><b>Angkatan</b> : {{$user->college->data->generation}}</span>
                        <span class="list-group-item"><b>Jenjang Studi</b> : {{$user->college->level_of_study}}</span>
                        <span class="list-group-item"><b>Fakultas</b> : {{$user->college->data->fakultas}}</span>
                        <span class="list-group-item"><b>Jurusan</b> : {{$user->college->data->major}}</span>
                        <span class="list-group-item"><b>Jalur Masuk</b> : {{$user->college->data->entrance}}</span>
                        <span class="list-group-item"><b>IPK</b> : {{$user->college->data->ipk}}</span>
                        <span class="list-group-item"><b>Semester</b> : {{$user->college->data->semester}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore class="modal fade text-left" id="danger" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel120"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Danger Modal
                    </h5>
                        <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Mahasiswa {{$user->college->name}}
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-danger" wire:click="delete()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<!--Danger theme Modal -->