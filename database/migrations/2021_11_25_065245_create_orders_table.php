<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('consumer_id')->nullable()->unsigned();
            $table->uuid('zone_id')->nullable()->unsigned();
            $table->uuid('ship_id')->nullable()->unsigned();
            $table->date('etd_date');
            $table->string('group_no', 5);
            $table->string('pc', 1)->nullable()->default('C');
            $table->string('commercial', 1)->nullable()->default('C');
            $table->integer('bioabt');
            $table->string('ordertype', 1);
            $table->string('bicomd', 1)->nullable()->default('-');
            $table->string('biivpx', 5);
            $table->string('is_type', 1)->nullable()->default('N');
            $table->boolean('is_split')->nullable()->default(false);
            $table->boolean('is_check_agian')->nullable()->default(false);
            $table->boolean('is_sync')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4])->nullable()->default(0); //0 = None, 1 = Invoice, 2 = In Process, 3 = Completed, 4 = Cancel
            $table->timestamps();
            $table->foreign('consumer_id')->references('id')->on('territories')->nullOnDelete();
            $table->foreign('zone_id')->references('id')->on('zone_groups')->nullOnDelete();
            $table->foreign('ship_id')->references('id')->on('shipments')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
