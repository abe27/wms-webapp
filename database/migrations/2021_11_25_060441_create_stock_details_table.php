<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('stock_id')->unsigned();
            $table->uuid('receive_detail_id')->nullable()->unsigned();
            $table->uuid('unit_id')->nullable()->unsigned();
            $table->string('lot_no')->nullable();
            $table->string('serial_no')->unique();
            $table->string('die_no')->nullable();
            $table->string('division_no')->nullable();
            $table->decimal('qty', 10, 2);
            $table->string('finish_good_no')->nullable();
            $table->boolean('is_received')->nullable()->default(false);
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_sync')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0); //0 = None, 1 = Shelve, 2 = Prepare, 3 = Scan Out, 4 = NG/QA, 5 = Wait/FG
            $table->timestamps();
            $table->foreign('stock_id')->references('id')->on('stocks')->cascadeOnDelete();
            $table->foreign('receive_detail_id')->references('id')->on('receive_details')->nullOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_details');
    }
}
