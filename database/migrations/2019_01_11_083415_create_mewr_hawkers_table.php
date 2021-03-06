<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMewrHawkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mewr_hawkers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hawker_centre', 100);
            $table->string('address');
            $table->float('estimated_gfa')->nullable();
            $table->integer('no_of_stall')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mewr_hawkers');
    }
}
