<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function special(){
        return $this->belongsTo(Special::class,'special_id','id');
    }
}
