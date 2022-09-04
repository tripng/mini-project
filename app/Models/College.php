<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function data(){
        return $this->belongsTo(Data::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class,'krs');
    }
}