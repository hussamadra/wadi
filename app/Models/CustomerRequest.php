<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRequest extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function additionalValues(){
        return $this->hasMany(AdditionalFieldValue::class,'service_request_id','id')->with('additionalField');
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
