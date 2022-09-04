<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @can('admin')
                    <li class="sidebar-title">Menu Admin </li>
                    <li class="sidebar-item
                        @if(Route::currentRouteName()=='admin.dashboard') active @endif
                    ">
                        <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item
                        @if(request()->is('admin/mahasiswa*')) active @endif
                    ">
                        <a href="{{route('admin.colleges')}}" class='sidebar-link'>
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Data Mahasiswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item
                        @if(Route::currentRouteName()=='admin.courses') active @endif
                    ">
                        <a href="{{route('admin.courses')}}" class='sidebar-link'>
                            <i class="bi bi-book"></i>
                            <span>Data Matakuliah</span>
                        </a>
                    </li>
                @endcan
                
                @cannot('admin')
                <li class="sidebar-item 
                    @if(Route::currentRouteName()=='college.profile') active @endif
                ">
                    <a href="{{route('college.profile')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                @endcannot

                <li class="sidebar-item">
                    <a href="/logout" class='sidebar-link'>
                        <i class="bi bi-door-open-fill text-danger"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>