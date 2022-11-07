<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Support\Facades\Auth;
use App\Models\AchievedTodolist;

class TodolistController extends Controller{
  public function todolist()
  {
      // DBより各UserのTodolistテーブルの値を全て取得
      $todolists = Todolist::where('user_id', Auth::id());
      if($todolists!=NULL){
        $todolists = $todolists->paginate(10);
      }
      // 取得した値をビュー「book/index」に渡す
      return view('todolist/todolist', compact('todolists'));
  }

  public function create_todolist(){
    return view('/todolist/create_todolist');
  }

  public function add_todolist(Request $request)
  {
    Todolist::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
      'contents' => $request->contents,
      'todolist_memo' => $request->memo,
      'limit' => $request->limit,
      'point' => $request->point,
    ]);
    return redirect('todolist/todolist')->with('flash_message', 'TODOを作成しました。');
  }

  public function delete_todolist(Request $request){
    Todolist::where('id', $request->delete_id)->delete();
    return redirect('/todolist/todolist')->with('flash_message', 'TODOを削除しました。');
  }

  public function finish_todolist(Request $request){
    $data = Todolist::where('id', $request->finish_id)->get();
    $user_data = Auth::user()->points;
    $total = 0;
    if(!empty($data)){
      foreach ($data as $d) {
        AchievedTodolist::create([
          'user_id' => Auth::user()->id,
          'achieved_title' => $d->title,
          'achieved_contents' => $d->contents,
          'achieved_memo' => $d->todolist_memo,
          'got_point' => $d->point,
        ]);
        $total = $d->point;
      }
      $total += $user_data;
      Auth::user()->update(['points' => $total]);
      Todolist::where('id', $request->finish_id)->delete();
      return redirect(url('/todolist/achieved_todolist'))->with('flash_message', 'TODOを達成しました。');
    }
    return redirect(url('/todolist/todolist'))->with('flash_message', 'エラーです。');
  }

  public function achieved_todolist(){
    $achieved_todolists = AchievedTodolist::where('user_id', Auth::id())->orderBy('updated_at', 'desc');
    if($achieved_todolists!=NULL){
      $achieved_todolists = $achieved_todolists->paginate(10);
    }
    return view('/todolist/achieved_todolist', compact('achieved_todolists'));
  }

  public function detail_todolist($id){
    $data = Todolist::where('id', $id);
    if($data != NULL){
      $data = $data->get();
    }
    return view('/todolist/detail_todolist', ['data' => $data]);
  }

  public function edit_todolist($id){
    $data = Todolist::where('id', $id);
    if($data != NULL){
      $data = $data->get();
    }
    return view('/todolist/edit_todolist', ['data' => $data]);
  }

  public function update_todolist(Request $request){
    Todolist::where('id', $request->id)->update([
      'title'=>$request->title,
      'contents'=>$request->contents,
      'todolist_memo'=>$request->memo,
      'limit'=>$request->limit,
      'point'=>$request->point,
    ]);
    return redirect(url('/todolist/detail_todolist', $request->id))->with('flash_message', 'TODOを更新しました。');
  }

  public function detail_achieved_todolist($id){
    $data = AchievedTodolist::where('id', $id);
    if($data != NULL){
      $data = $data->get();
    }
    return view('/todolist/detail_achieved_todolist', ['data' => $data]);
  }

  public function __construct(){
    $this -> middleware('auth');
  }
}
