<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_field_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Service::class,'service_id');
            $table->foreignIdFor(\App\Models\AdditionalField::class,'additional_field_id');
            $table->foreignIdFor(\App\Models\ServiceRequest::class,'service_request_id');
            $table->string('ar_value');
            $table->string('en_value')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_field_values');
    }
}
