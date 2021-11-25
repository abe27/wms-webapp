<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique(); //RMW/J03/CK1/CK2/FG
            $table->text('description')->nullable();
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
        Schema::dropIfExists('whs');
    }
}
