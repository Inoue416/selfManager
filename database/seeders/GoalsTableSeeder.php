<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // テーブルのクリア
      DB::table('goals')->truncate();
      // 初期データ用意（列名をキーとする連想配列）
      $goals = [
                ['goal_contents' => 'sample goal1',
                 'total_point' => 3,
                 'goal_point' => 10,],
                ['goal_contents' => 'sample goal2',
                 'total_point' => 5,
                 'goal_point' => 20,],
                ['goal_contents' => 'sample goal3',
                 'total_point' => 8,
                 'goal_point' => 15,],
               ];
      // 登録
        foreach($goals as $goal) {
          \App\Models\Goal::create($goal);
        }
    }
}
