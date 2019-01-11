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
            $table->float('estimated_gfa');
            $table->float('no_of_stall');
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
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
