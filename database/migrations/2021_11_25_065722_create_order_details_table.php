<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('plan_id')->nullable()->unsigned();
            $table->uuid('order_id')->nullable()->unsigned();
            $table->uuid('revise_id')->nullable()->unsigned();
            $table->uuid('part_id')->nullable()->unsigned();
            $table->uuid('unit_id')->nullable()->unsigned();
            $table->string('pono');
            $table->string('sampleflg');
            $table->decimal('orderorgi', 10, 2)->nullable()->default(0);
            $table->decimal('orderround', 10, 2)->nullable()->default(0);
            $table->string('firmflg');
            $table->string('shippedflg');
            $table->decimal('shippedqty', 10, 2)->nullable()->default(0);
            $table->date('ordermonth');
            $table->decimal('balqty', 10, 2)->nullable()->default(0);
            $table->string('bidrfl')->nullable();
            $table->string('deleteflg')->nullable();
            $table->string('reasoncd')->nullable();
            $table->string('carriercode')->nullable();
            $table->decimal('bistdp', 10, 2)->nullable()->default(0);
            $table->decimal('binewt', 10, 2)->nullable()->default(0);
            $table->decimal('bigrwt', 10, 2)->nullable()->default(0);
            $table->decimal('biwidt', 10, 2)->nullable()->default(0);
            $table->decimal('bihigh', 10, 2)->nullable()->default(0);
            $table->decimal('bileng', 10, 2)->nullable()->default(0);
            $table->string('lotno')->nullable()->default('-');
            $table->boolean('is_sync')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4])->nullable()->default(0); //0 = None, 1 = Invoice, 2= Pallet, 3=Prepare, 4= Cancel
            $table->timestamps();
            $table->foreign('plan_id')->references('id')->on('order_plans')->nullOnDelete();
            $table->foreign('order_id')->references('id')->on('orders')->nullOnDelete();
            $table->foreign('revise_id')->references('id')->on('revise_groups')->nullOnDelete();
            $table->foreign('part_id')->references('id')->on('products')->nullOnDelete();
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
        Schema::dropIfExists('order_details');
    }
}
