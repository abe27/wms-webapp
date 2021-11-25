<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('part_id')->unsigned();
            $table->decimal('quantity', 10, 2);
            $table->decimal('quantity_limit', 10, 2)->nullable()->default(0);
            $table->enum('on_month', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
            $table->integer('last_year')->nullable()->default(0);
            $table->longText('description')->nullable();
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('stocks');
    }
}
