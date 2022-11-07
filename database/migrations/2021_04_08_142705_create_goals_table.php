<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('goals', function (Blueprint $table) {
        //goalリスト
        $table->id();
        $table->integer('user_id');
        $table->string('goal_contents', 100);
        $table->string('goal_memo', 300)->nullable();
        $table->integer('total_point');
        $table->integer('goal_point');
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
        Schema::dropIfExists('goals');
    }
}
