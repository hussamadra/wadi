<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('rent_item_id');
            $table->unsignedInteger('rent_plan_id');
//            $table->unsignedInteger('rent_category_id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->unsignedInteger('repeat_count');
            $table->unsignedInteger('rent_term');//in hours
            $table->text('description')->nullable();
            $table->double('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
