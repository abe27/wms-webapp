<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('service_id')->nullable()->unsigned();
            $table->integer('seq');
            $table->string('vendor')->nullable();
            $table->string('cd')->nullable();
            $table->string('unit')->nullable();
            $table->string('whs')->nullable();
            $table->string('tagrp')->nullable();
            $table->string('factory')->nullable();
            $table->string('sortg1')->nullable();
            $table->string('sortg2')->nullable();
            $table->string('sortg3')->nullable();
            $table->string('plantype')->nullable();
            $table->string('orderid')->nullable();
            $table->string('pono')->nullable();
            $table->string('recid')->nullable();
            $table->string('biac')->nullable();
            $table->string('shiptype', 1)->nullable();
            $table->date('etdtap')->nullable();
            $table->string('partno')->nullable();
            $table->string('partname')->nullable();
            $table->string('pc')->nullable();
            $table->string('commercial')->nullable();
            $table->string('sampleflg')->nullable();
            $table->string('orderorgi')->nullable();
            $table->string('orderround')->nullable();
            $table->string('firmflg')->nullable();
            $table->string('shippedflg')->nullable();
            $table->string('shippedqty')->nullable();
            $table->string('ordermonth')->nullable();
            $table->integer('balqty')->nullable();
            $table->string('bidrfl')->nullable();
            $table->string('deleteflg')->nullable();
            $table->string('ordertype')->nullable();
            $table->string('reasoncd')->nullable();
            $table->date('upddte')->nullable();
            $table->time('updtime')->nullable();
            $table->string('carriercode')->nullable();
            $table->integer('bioabt')->nullable();
            $table->string('bicomd')->nullable();
            $table->decimal('bistdp', 10, 2)->nullable();
            $table->decimal('binewt', 10, 2)->nullable();
            $table->decimal('bigrwt', 10, 2)->nullable();
            $table->string('bishpc')->nullable();
            $table->string('biivpx')->nullable();
            $table->string('bisafn')->nullable();
            $table->decimal('biwidt', 10, 2)->nullable();
            $table->decimal('bihigh', 10, 2)->nullable();
            $table->decimal('bileng', 10, 2)->nullable();
            $table->string('lotno')->nullable();
            $table->integer('minimum')->nullable();
            $table->integer('maximum')->nullable();
            $table->string('picshelfbin')->nullable();
            $table->string('stkshelfbin')->nullable();
            $table->string('ovsshelfbin')->nullable();
            $table->integer('picshelfbasicqty')->nullable();
            $table->integer('outerpcs')->nullable();
            $table->integer('allocateqty')->nullable();
            $table->boolean('is_sync')->nullable();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('file_services')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_plans');
    }
}
