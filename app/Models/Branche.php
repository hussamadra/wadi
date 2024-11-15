<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;
    protected $guarded=[];

    public  function specials(){
        return $this->hasMany(Special::class);
    }

    public  function users(){
        return $this->hasMany(User::class);
    }
}
