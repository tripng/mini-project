@once
    @push('style')
    <link rel="stylesheet" href="{{asset('css/pages/auth.css')}}">
    @endpush
@endonce

@section('title',"Login | Mini Project")
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo mb-5">
                    <a href="index.html"><img src="{{asset('images/logo/logo.png')}}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-2">Log in dengan data yang sesuai</p>

                <form wire:submit.prevent="login">
                    @csrf
                    <div class="form-group mb-4">
                        <input type="text" class="form-control form-control-xl  @error('nim') is-invalid @enderror" placeholder="Nim" wire:model="nim">
                        @error('nim')
                            <div class="text-danger">
                                <i class="bx bx-radio-circle"></i>
                                <span class="error">*{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" wire:model="password">
                        @error('password')
                            <div class="text-danger">
                                <i class="bx bx-radio-circle"></i>
                                <span class="error">*{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
