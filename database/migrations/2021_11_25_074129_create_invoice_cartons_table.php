<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceCartonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_cartons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('part_id')->unsigned();
            $table->uuid('pallet_id')->unsigned();
            $table->uuid('serial_no_id')->nullable()->unsigned();
            $table->integer('seq');
            $table->string('carton_seq')->unique();
            $table->decimal('qty', 10, 2)->nullable()->default(0);
            $table->decimal('weight', 10, 2)->nullable()->default(0);
            $table->boolean('is_print_label')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0);
            $table->boolean('is_sync')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('part_id')->references('id')->on('invoice_details')->cascadeOnDelete();
            $table->foreign('pallet_id')->references('id')->on('invoice_pallets')->cascadeOnDelete();
            $table->foreign('serial_no_id')->references('id')->on('stock_details')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_cartons');
    }
}
