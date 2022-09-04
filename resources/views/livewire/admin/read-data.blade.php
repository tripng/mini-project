@once
    @push('style')
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
        <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    @endpush

    @push('script')
        <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
        <script>
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
        <script src="{{asset('js/main.js')}}"></script>
    @endpush
@endonce

@section('title','Lihat Data')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data {{ Route::currentRouteName()=='admin.colleges' ? 'Mahasiswa' : 'Matakuliah'}}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header">
                    @if(Route::currentRouteName()==='admin.colleges')
                        <a class="btn btn-success" href="{{route('college.store')}}"> Tambah Data Mahasiswa </a>
                    @else
                        <a class="btn btn-success" href="{{route('course.store')}}"> Tambah Data Matakuliah </a>
                    @endif
                    {{-- <a class="btn btn-success fw-bold" href="{{Route::currentRouteName=='admin.colleges'}}">Tambah Data</a> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            @if(Route::currentRouteName()==='admin.colleges')
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Fakultas</th>
                                    <th>Jenis Kelamin</th>
                                    <th></th>
                                </tr>
                            @else
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Nama</th>
                                    <th>SKS</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            @endif
                            
                        </thead>
                        <tbody>
                            @if(Route::currentRouteName()=='admin.colleges')
                                @foreach($colleges as $college)
                                    <tr>
                                        <td>{{$college->name}}</td>
                                        <td>{{$college->email}}</td>
                                        <td>{{$college->phone_number}}</td>
                                        <td>{{$college->data->fakultas}}</td>
                                        <td>
                                            {{-- <span class="badge bg-success"></span> --}}
                                            {{$college->gender}}
                                        </td>
                                        <td>
                                            <a href="{{route('college.show',$college->user->nim)}}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                            <a href="{{route('college.edit',$college->user->nim)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{Str::upper($course->code)}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->sks}}</td>
                                    <td>{{$course->status}}</td>
                                    <td>
                                        {{$course->type == 1 ? 'Wajib' : 'Pilihan'}}
                                    </td>
                                    <td>
                                        <a href="{{route('course.show',$course->code)}}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="{{route('course.edit',$course->code)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>