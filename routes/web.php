<?php

use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Admin\CollegeData;
use App\Http\Livewire\Admin\EditCollege;
use App\Http\Livewire\Admin\EditCourse;
use App\Http\Livewire\Admin\StoreCollege;
use App\Http\Livewire\Admin\StoreCourse;
use App\Http\Livewire\Admin\ShowCollege;
use App\Http\Livewire\Admin\ShowCourse;
use App\Http\Livewire\Admin\CourseData;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\User\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login',Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('/mahasiswa')->group(function(){
        Route::get('/profile',Profile::class)->name('college.profile');    
    });
});

Route::get('/',function(){
    if(auth()->user()->role == 0) return redirect()->route('admin.dashboard');
    else return redirect()->route('college.profile');
});
Route::get('/tes',[HomeController::class,'pdf']);

Route::middleware(['admin'])->group(function (){
    Route::prefix('/admin')->group(function(){
        Route::get('/dashboard',Home::class)->name('admin.dashboard');
        Route::get('/mahasiswa',CollegeData::class)->name('admin.colleges');
        Route::get('/matakuliah',CourseData::class)->name('admin.courses');
        Route::get('/mahasiswa/store',StoreCollege::class)->name('college.store');
        Route::get('/matakuliah/store',StoreCourse::class)->name('course.store');
        Route::get('/mahasiswa/{nim}/edit',EditCollege::class)->name('college.edit');
        Route::get('/matakuliah/{course}/edit',EditCourse::class)->name('course.edit');
        Route::get('/mahasiswa/{nim}',ShowCollege::class)->name('college.show');
        Route::get('/matakuliah/{course}',ShowCourse::class)->name('course.show');
    });
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/logout','logout');
});