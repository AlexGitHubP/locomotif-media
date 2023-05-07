<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id',        )->length(10);
            $table->string('original_name', 255);
            $table->string('file',          255);
            $table->string('owner',         255);
            $table->string('owner_id',      255)->index();
            $table->tinyInteger('main')->length(1)->unsigned();
            $table->string('folder',        255);
            $table->string('type',          255);
            $table->integer('ordering'         )->length(10)->unsigned()->nullable();
            $table->enum('status', array('hidden', 'published'));
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
