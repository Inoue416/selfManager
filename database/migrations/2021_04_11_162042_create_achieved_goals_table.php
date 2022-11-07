<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievedGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achieved_goals', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          $table->string('achieved_contents', 100);
          $table->string('achieved_memo', 300)->nullable();
          $table->integer('achieved_point');
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
        Schema::dropIfExists('achieved_goals');
    }
}
