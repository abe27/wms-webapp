<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique();
            $table->decimal('width', 10, 2)->nullable()->default(0.0);
            $table->decimal('length', 10, 2)->nullable()->default(0.0);
            $table->decimal('height', 10, 2)->nullable()->default(0.0);
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_actived')->nullable()->default(true);
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
        Schema::dropIfExists('product_sizes');
    }
}
