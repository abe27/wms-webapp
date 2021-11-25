<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('receive_id')->unsigned();
            $table->uuid('part_id')->unsigned();
            $table->decimal('receive_pln_qty', 10, 2);
            $table->decimal('receive_pln_ctn', 10, 2);
            $table->decimal('received_ctn', 10, 2)->nullable()->default(0);
            $table->enum('is_received', [0, 1, 2])->nullable()->default(0); // 0 = None, 1 = In Process, 2 = Completed
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('receive_id')->references('id')->on('receives')->cascadeOnDelete();
            $table->foreign('part_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receive_details');
    }
}
