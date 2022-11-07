@extends('layouts.app')
@section('head')
@section('title')
LOG IN
@endsection
@endsection
@section('content_auth')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h1 class="ops-title">ログイン</h1><br />
      </div>
    </div>
    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        <p>アカウントを登録された方は、(ログイン)ボタンから。<br />
          また、Twitterのアカウントをお持ちの方は、(Twitterから)ボタンからログインが可能です。</p>
        <div class="btn-group" role="group">
            <a class="btn btn-default" href="{{ route('login') }}">通常ログイン</a>
    	  </div>
        <div class="btn-group" role="group">
           <a class="btn btn-default" href="{{ url('/twitter') }}">Twitterから</a>
        </div>
      </div>
    </div>
@endsection
