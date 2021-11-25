<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('whs_id')->nullable()->unsigned();
            $table->uuid('tag_id')->nullable()->unsigned();
            $table->uuid('store_id')->nullable()->unsigned();
            $table->uuid('part_type_id')->nullable()->unsigned();
            $table->uuid('part_vendor_id')->nullable()->unsigned();
            $table->uuid('part_id')->unsigned();
            $table->uuid('part_kind_id')->nullable()->unsigned();
            $table->uuid('part_size_id')->nullable()->unsigned();
            $table->uuid('part_color_id')->nullable()->unsigned();
            $table->decimal('weight', 10, 2)->nullable()->default(0.0);
            $table->string('images')->nullable()->default('-');
            $table->boolean('is_actived')->nullable()->default(true);
            $table->timestamps();
            $table->foreign('whs_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->nullOnDelete();
            $table->foreign('tag_id')->references('id')->on('tags')->nullOnDelete();
            $table->foreign('part_type_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('part_vendor_id')->references('id')->on('product_vendors')->nullOnDelete();
            $table->foreign('part_id')->references('id')->on('parts')->cascadeOnDelete();
            $table->foreign('part_kind_id')->references('id')->on('product_types')->nullOnDelete();
            $table->foreign('part_size_id')->references('id')->on('product_sizes')->nullOnDelete();
            $table->foreign('part_color_id')->references('id')->on('product_colors')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
