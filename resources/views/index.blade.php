@extends('/base')
@section('head')
@section('title')
Home
@endsection
@endsection
@section('content')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h1 class="ops-title">Self Management</h1><br />
      </div>
    </div>
    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        @auth
        <p>ようこそ!&emsp;{{ Auth::user()->name }}さん</p>
        <p>現在の所持ポイント: {{ Auth::user()->points }} ポイント</p>
        <div class="btn-group" role="group">
            <a class="btn btn-default" href="{{ url('/todolist/todolist') }}">TODOリストへ</a>
    	  </div>
        <div class="btn-group" role="group">
           <a class="btn btn-default" href="/goal/goal">ポイント割り振り</a>
        </div>
        @else
        <h3>TODOリストを作成し、自分のGoalに向け、計画を立てよう。</h3><br />
        <p>&emsp;このアプリでは、GoalとTODOに点数をつけることができます。<br />
          TODOリストをこなし、点数を稼いで自分のGoalへ向かうことで、<br />
          あなたの目標、計画管理への手助けになるでしょう。
        </p>
        @endauth
      </div>
    </div>
@endsection
