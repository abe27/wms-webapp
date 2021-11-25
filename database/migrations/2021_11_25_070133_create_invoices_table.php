<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('invoice_no', 25);
            $table->string('system_no', 25)->unique();
            $table->uuid('order_id')->unsigned();
            $table->string('vessel')->nullable();
            $table->string('payment')->nullable();
            $table->string('zone_code')->nullable();
            $table->string('ship_from')->nullable();
            $table->string('ship_to')->nullable();
            $table->string('via')->nullable();
            $table->string('title')->nullable()->default('000');
            $table->uuid('container_type_id')->nullable()->unsigned();
            $table->string('note_1')->nullable();
            $table->string('note_2')->nullable();
            $table->string('note_3')->nullable();
            $table->decimal('ctn_total', 10, 2)->nullable()->default(0);
            $table->string('tap_flg')->nullable();
            $table->enum('resend_gedi', ['-', 'Y'])->nullable()->default('-');
            $table->boolean('is_send_gedi')->nullable()->default(false);
            $table->enum('inv_type', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0); //0 = Normal, 1 = Special, 2 = VTA
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0); //0 = Normal, 1 = Set Pallet, 2 = In Process, 3 = Container/Loading, 4 = Hold, 5 = Cancel
            $table->boolean('is_sync')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreign('container_type_id')->references('id')->on('container_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
