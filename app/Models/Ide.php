<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ide extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table= 'ides';

    public  function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

}
