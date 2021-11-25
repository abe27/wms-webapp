<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable()->unsigned();
            $table->uuid('consumer_id')->nullable()->unsigned();
            $table->uuid('store_id')->nullable()->unsigned();
            $table->uuid('order_group_id')->nullable()->unsigned();
            $table->string('prefix');
            $table->boolean('ship_air')->nullable()->default(false);
            $table->boolean('ship_boat')->nullable()->default(false);
            $table->boolean('ship_truck')->nullable()->default(false);
            $table->boolean('by_pallet')->nullable()->default(false);
            $table->boolean('new_seq')->nullable()->default(false);
            $table->boolean('weight_limit')->nullable()->default(false);
            $table->integer('weight_limit_total')->nullable()->default(1600);
            $table->integer('last_inv_no')->nullable()->default(1);
            $table->integer('on_last_year')->nullable()->default(0);
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('profiles')->nullOnDelete();
            $table->foreign('consumer_id')->references('id')->on('consumers')->nullOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->nullOnDelete();
            $table->foreign('order_group_id')->references('id')->on('order_groups')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('territories');
    }
}
