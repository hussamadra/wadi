<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function register(){
        return $this->hasMany(Register::class);
    }

    public function promeces(){
        return $this->hasMany(Promise::class,'student_id');
    }

    public function respects(){
        return $this->hasMany(Receipt::class,'student_id');
    }

    public function ide():HasOne{
        return $this->hasOne(ide::class,'student_id');
    }

    public function work():HasOne{
        return $this->hasOne(Work::class,'student_id');
    }
}

