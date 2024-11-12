<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Service::class,'service_id');
            $table->string('ar_name');
            $table->string('en_name')->nullable();
            $table->integer('type');
            $table->integer('related_id')->nullable();;
            $table->integer('related_operation')->nullable();;
            $table->integer('related_value')->nullable();;
            $table->integer('sort');
            $table->text('ar_value')->nullable();
            $table->text('en_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_fields');
    }
}
