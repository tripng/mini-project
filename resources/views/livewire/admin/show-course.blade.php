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
            <h4 class="card-title">{{$course->name}} | {{$course->code}}</h4>
            <div class="action">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger" type="submit">Hapus</button>
            </div>
                </div>
                <div class="card-body">
                        <div class="list-group">
                            <span class="list-group-item"><b>Kode MK </b> : {{$course->code}}</span>
                            <span class="list-group-item disabled"><b>Nama MK</b> : {{$course->name}}</span>
                            <span class="list-group-item disabled"><b>Deskripsi</b> : {{$course->description}}</span>
                            <span class="list-group-item"><b>SCPL</b> : {{$course->scpl}}</span>
                            <span class="list-group-item"><b>SKS</b> : {{$course->sks}}</span>
                            <span class="list-group-item"><b>Untuk Jenjang Studi</b> : {{$course->for_type}}</span>
                            <span class="list-group-item"><b>Status</b> : {{$course->type == 0 ? 'Pilihan' : 'Wajib'}}</span>
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
                            Hapus Matakuliah
                        </h5>
                            <button type="button" class="close"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapus Data Matakuliah {{$course->name}}
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button class="btn btn-danger" wire:click="delete">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Danger theme Modal -->