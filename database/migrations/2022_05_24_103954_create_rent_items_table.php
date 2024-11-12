<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('branch_id');
//            $table->unsignedInteger('rent_type_id');
            $table->unsignedInteger('category_id');
            $table->text('description');
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
        Schema::dropIfExists('rent_items');
    }
}
