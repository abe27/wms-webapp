<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelveDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelve_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('shelve_id')->nullable()->unsigned();
            $table->uuid('stock_id')->unsigned();
            $table->uuid('user_id')->nullable()->unsigned();
            $table->string('pallet_no')->nullable()->default('-');
            $table->boolean('re_print')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4])->nullable()->default(0); //0 = None, 1 = In Process, 2 = Complete , 3 = Re-Pallete, 4 = Cancel
            $table->timestamps();
            $table->foreign('shelve_id')->references('id')->on('shelves')->nullOnDelete();
            $table->foreign('stock_id')->references('id')->on('stock_details')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelve_details');
    }
}
