<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function branche(){
        return $this->belongsTo(Branche::class,'branche_id','id');
    }

    public  function subjects(){
        return $this->hasMany(Subject::class);
    }

}
