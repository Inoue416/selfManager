<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TodolistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // テーブルのクリア
      DB::table('todolists')->truncate();

      // 初期データ用意（列名をキーとする連想配列）
      $todolists = [
                ['title' => 'sample title1',
                 'contents' => 'sample contents1',
                 'limit' => '2021 1/1',
                 'point' => 3],
                ['title' => 'sample title2',
                 'contents' => 'sample contents2',
                 'limit' => '2021 1/2',
                 'point' => 1],
                ['title' => 'sample title3',
                 'contents' => 'sample contents3',
                 'limit' => '2021 1/3',
                 'point' => 2],
               ];
      // 登録
      foreach($todolists as $todolist) {
        \App\Models\Todolist::create($todolist);
      }
    }
}
