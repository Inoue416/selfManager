<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodolistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolists', function (Blueprint $table) {
          //todoリスト
            $table->id();
            $table->integer('user_id');
            $table->string('title', 20);
            $table->string('contents', 100);
            $table->string('todolist_memo', 300)->nullable();
            $table->string('limit', 50);
            $table->integer('point');
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
        Schema::dropIfExists('todolists');
    }
}
