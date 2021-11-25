<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('container_seq');
            $table->string('container_no');
            $table->string('seal_no');
            $table->uuid('container_size_id')->nullable()->unsigned();
            $table->enum('release_days', ['-', 'SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'])->nullable()->default('-');
            $table->date('release_date');
            $table->boolean('is_sync')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0); // 0 = Normal, 1 =In process/Loading, 2 = Complete, 3 = Hold, 4 = Cancel
            $table->timestamps();
            $table->foreign('container_size_id')->references('id')->on('container_sizes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('containers');
    }
}
