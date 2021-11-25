<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviseGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revise_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('value')->unique();
            $table->string('title');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_revise')->nullable()->default(false);
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
        Schema::dropIfExists('revise_groups');
    }
}
