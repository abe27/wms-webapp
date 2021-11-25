<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('invoice_id')->unsigned();
            $table->uuid('order_id')->unsigned();
            $table->decimal('set_pallet', 10, 2)->nullable()->default(0);
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0); //0 = None, 1 = Set Pallet, 2 = In Process, 3 = Loading, 4 = Hold, 5 = Cancel
            $table->timestamps();
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
            $table->foreign('order_id')->references('id')->on('order_details')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
