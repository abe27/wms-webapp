<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pallets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('invoice_id')->unsigned();
            $table->enum('prefix', ['-', 'B', 'C', 'P']);
            $table->integer('seq')->nullable()->default(1);
            $table->integer('total')->nullable()->default(0);
            $table->decimal('limit', 10, 2)->nullable()->default(0);
            $table->decimal('width', 10, 2)->nullable()->default(0);
            $table->decimal('length', 10, 2)->nullable()->default(0);
            $table->decimal('height', 10, 2)->nullable()->default(0);
            $table->string('plout_no')->nullable()->default('-');
            $table->boolean('is_sync')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0); //0 = None, 1 = In Process, 2 = Loading, 3 = Complete, 4 = Hold, 5 = Cancel
            $table->timestamps();
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_pallets');
    }
}
