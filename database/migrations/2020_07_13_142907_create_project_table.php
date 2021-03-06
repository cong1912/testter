<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  Illuminate\Database\QueryException;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->text('notes')->nullable();
            $table->timestamps();



            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('project');

    }
}
