@once
    @push('style')
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
        <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    @endpush

    @push('script')
        <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
    @endpush
@endonce
@section('title','My Profile')
<div id="main">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="">My Profile</h1>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="list-group list-group-horizontal-sm mb-1 text-center"
                        role="tablist">
                        <a class="list-group-item list-group-item-action active"
                            id="list-sunday-list" data-bs-toggle="list" href="#data-pribadi"
                            role="tab">Data Pribadi</a>
                        <a class="list-group-item list-group-item-action" id="list-monday-list"
                            data-bs-toggle="list" href="#data-kuliah" role="tab">Data Kuliah</a>
                        <a class="list-group-item list-group-item-action" id="list-tuesday-list"
                            data-bs-toggle="list" href="#data-matakuliah" role="tab">Matakuliah Yang Diambil</a>
                    </div>
                    <div class="tab-content text-justify">
                        <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel"
                            aria-labelledby="list-sunday-list">
                            <div class="list-group">
                                <span class="list-group-item"><b>Nama </b> : {{$user->college->name}}</span>
                                <span class="list-group-item disabled"><b>Nim</b> : {{$user->nim}}</span>
                                <span class="list-group-item"><b>Email</b> : {{$user->college->email}}</span>
                                <span class="list-group-item"><b>Tanggal Lahir</b> : {{$user->college->birthday}}</span>
                                <span class="list-group-item"><b>Jenis Kelamin</b> : {{$user->college->gender}}</span>
                                <span class="list-group-item"><b>Agama</b> : {{$user->college->religion}}</span>
                                <span class="list-group-item"><b>Alamat</b> : {{$user->college->address}}</span>
                                <span class="list-group-item"><b>No Telepon</b> : {{$user->college->phone_number}}</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-kuliah" role="tabpanel"
                            aria-labelledby="list-monday-list">
                                <div class="list-group">
                                    <span class="list-group-item"><b>IPK </b> : {{$user->college->data->ipk}}</span>
                                    <span class="list-group-item"><b>Status </b> : {{$user->college->data->status}}</span>
                                    <span class="list-group-item disabled"><b>Angkatan</b> : {{$user->college->data->generation}}</span>
                                    <span class="list-group-item"><b>Jenjang Studi</b> : {{$user->college->data->level_of_study}}</span>
                                    <span class="list-group-item"><b>Fakultas</b> : {{$user->college->data->fakultas}}</span>
                                    <span class="list-group-item"><b>Jurusan</b> : {{$user->college->data->major}}</span>
                                    <span class="list-group-item"><b>Jalur Masuk</b> : {{$user->college->data->entrance}}</span>
                                    <span class="list-group-item"><b>Semester</b> : {{$user->college->data->semester}}</span>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="data-matakuliah" role="tabpanel"
                            aria-labelledby="list-tuesday-list">
                            @foreach($mahasiswa->courses as $course)
                                <div class="list-group">
                                    <h3 class="card-title my-4 mx-3">{{$course->name}}</h3>
                                    <span class="list-group-item"><b>Deskripsi </b> : {{$course->description}}</span>
                                    <span class="list-group-item"><b>SCPL </b> : {{$course->scpl}}</span>
                                    <span class="list-group-item disabled"><b>SKS</b> : {{$course->sks}}</span>
                                    <span class="list-group-item"><b>Matakuliah</b> : {{$course->status}}</span>
                                    <span class="list-group-item"><b>Jenjang Studi</b> : {{$course->for_level}}</span>
                                    <span class="list-group-item"><b>Status</b> : 
                                        @if($course->type===0) 
                                            Pilihan 
                                        @else
                                            Wajib
                                        @endif
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>