<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_sizes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('size');
            $table->decimal('dim_long', 10, 2)->nullable()->default(0);
            $table->decimal('dim_width', 10, 2)->nullable()->default(0);
            $table->decimal('dim_height', 10, 2)->nullable()->default(0);
            $table->decimal('dim_weight', 10, 2)->nullable()->default(0);
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_actived')->nullable()->default(false);
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
        Schema::dropIfExists('container_sizes');
    }
}
