<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalFieldValue extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded=[];

    public function additionalField(){
        return $this->belongsTo(AdditionalField::class,'additional_field_id','id');
    }
    public function customer_request(){
        return $this->belongsTo(CustomerRequest::class,'customer_service_request_id');
    }
}
