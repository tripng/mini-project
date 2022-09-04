<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function collages(){
        return $this->belongsToMany(College::class,'krs');
    }
}