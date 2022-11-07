<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievedTodolistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achieved_todolists', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          $table->string('achieved_title', 20);
          $table->string('achieved_contents', 100);
          $table->string('achieved_memo', 300)->nullable();
          $table->integer('got_point');
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
        Schema::dropIfExists('achieved_todolists');
    }
}
