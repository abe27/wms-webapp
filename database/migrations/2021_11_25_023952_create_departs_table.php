<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->unique();
            $table->longText('description')->nullable()->default('-');
            $table->string('chief_name')->nullable()->default('-');
            $table->string('mail_to')->nullable()->default('admin@localhost');
            $table->string('mail_cc')->nullable();
            $table->string('mail_bc')->nullable();
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
        Schema::dropIfExists('departs');
    }
}
