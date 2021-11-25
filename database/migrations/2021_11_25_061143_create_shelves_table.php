<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('shelve_no')->unique();
            $table->integer('shelve_min')->nullable()->default(0);
            $table->integer('shelve_max')->nullable()->default(0);
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_print_label')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4])->nullable()->default(0); //0 = None, 1 = Idle, 2 = Active, 3 = Wait Replace, 4 = Cancel
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
        Schema::dropIfExists('shelves');
    }
}
