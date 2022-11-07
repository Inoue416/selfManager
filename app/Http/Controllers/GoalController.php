<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use App\Models\AchievedGoal;



class GoalController extends Controller
{
  public function goal()//報酬一覧表示
  {
    $goals = Goal::where('user_id', Auth::id());
    if ($goals!=NULL){
      $goals = $goals->paginate(10);
    }
    return view('goal/goal', ['goals' => $goals]);
  }

  public function create_goal(){//$id){
    return view("/goal/create_goal");
  }

  public function add_goal(Request $request){
    Goal::create([
      'user_id' => Auth::id(),
      'goal_contents' => $request->goal_contents,
      'goal_memo' => $request->goal_memo,
      'total_point' => $request->total_point,
      'goal_point' => $request->goal_point,
    ]);
    return redirect('/goal/goal')->with('flash_message', 'Goalの作成が完了しました。');
  }

  public function delete_goal(Request $request){
    Goal::where('id', $request->delete_id)->delete();
    return redirect('/goal/goal')->with('flash_message', 'Goalを削除しました。');
  }

  public function give_point(Request $request){
    $goal_data = Goal::where('id', $request->give_id);
    $goal_point=0;
    $have_point=0;
    $total = 0;
    $j=0;
    if($goal_data == NULL){
      $goal_point = 1;
    }
    else{
      $goal_data = $goal_data->get();
      foreach ($goal_data as $d) {
        // code...
        $goal_point = $d->goal_point;
        $have_point = $d->total_point;
      }
    }
    $total += ($request->give_point+$have_point);
    if(($goal_point-$total)>=0){
      $j = $goal_point-$total;
      if($j==0){
        $j = $request->give_point;
        //$j += 2;
      }
    }
    $point = [
      '{u_point}'=>Auth::user()->points,
      '{g_point}'=>$j,
    ];
    $rules = [
      'give_point' => strtr('integer | max:{u_point} | digits_between:0, {g_point}', $point),
    ];
    $messages = [
      'give_point.numeric' => '正の整数を入力してください。',
      'give_point.max' => '入力エラーです。所持ポイントやゴールまでのポイントをご確認の上、もう1度入力してください。',
      'give_point.digits_between' => '入力エラーです。所持ポイントやゴールまでのポイントをご確認の上、もう1度入力してください。'
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails())
    {
      return redirect()->back()
                  ->withErrors($validator)
                  ->withInput()->with('$request', $request->give_id);
    }
    if($goal_point == $total){
      foreach ($goal_data as $d) {
        AchievedGoal::create([
          'user_id' => $d->user_id,
          'achieved_contents' => $d->goal_contents,
          'achieved_memo' => $d->goal_memo,
          'achieved_point' => $d->goal_point,
        ]);
        $d->delete();
      }
    }
    else{
      foreach ($goal_data as $d) {
        // code...
        $d->update(['total_point'=>$total]);
      }
    }
    Auth::user()->update(['points' => (Auth::user()->points - $request->give_point)]);
    return redirect('/goal/goal')->with('flash_message', 'ポイントを割り振りました。');
  }

  public function part_point($id){
    return view('goal/part_point', ['give_id' => $id]);//, $give_id=string($request->give_id));
  }

  public function achieved_goal(){
    $achieved_goals = AchievedGoal::where('user_id', Auth::id());
    if($achieved_goals!=NULL){
      $achieved_goals = $achieved_goals->paginate(10);
    }
    return view('/goal/achieved_goal', compact('achieved_goals'));
  }

  public function detail_goal($id){
    $data = Goal::where('id', $id);
    if($data != NULL) {
      $data = $data->get();
    }
    return view('/goal/detail_goal', ['data'=>$data]);
  }

  public function edit_goal($id){
    $data = Goal::where('id', $id);
    if($data != NULL){
      $data = $data->get();
    }
    return view('/goal/edit_goal', ['data'=>$data]);
  }

  public function update_goal(Request $request){
    Goal::where('id', $request->id)->update([
      'goal_contents'=>$request->goal_contents,
      'goal_memo'=>$request->goal_memo,
      'total_point'=>$request->total_point,
      'goal_point'=>$request->goal_point,
    ]);
    return redirect(url('/goal/detail_goal', $request->id))->with('flash_message', 'Goalを更新しました。');
  }

  public function detail_achieved_goal($id){
    $data = AchievedGoal::where('id', $id);
    if($data != NULL){
      $data = $data->get();
    }
    return view('/goal/detail_achieved_goal', ['data'=>$data]);
  }

  public function __construct(){
    $this -> middleware('auth');
  }
}
