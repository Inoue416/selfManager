@extends('/base')
@section('head')
@section('title')
TODO LIST DETAIL
@endsection
@endsection
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">TODOの詳細</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    @if($data!=NULL)
    @foreach($data as $d)
    <div class="panel panel-default">
    	<div class="panel-heading">
    		TODO
    	</div>
    	<div class="panel-body">
    		{{ $d->title }}
    	</div>
      <div class="panel-heading">
        内容
      </div>
      <div class="panel-body">
        {{ $d->contents }}
      </div>
    	<div class="panel-heading">
    		メモ
    	</div>
    	<div class="panel-body">
        {!! nl2br(e($d->todolist_memo)) !!}
    	</div>
      <div class="panel-heading">
        期限
      </div>
      <div class="panel-body">
        {{ $d->limit }}
      </div>
      <div class="panel-heading">
    		ポイント
    	</div>
    	<div class="panel-body">
    		{{ $d->point }}
    	</div>
    </div>
      <form action="{{ url('/todolist/edit_todolist', $d->id) }}" method="get">
        <input type="hidden" name="edit_id" value="{{ $d->id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group" role="group">
        <button type="submit" class="btn btn-default">編集</button>
        </div>
      </form>
      @endforeach
      @else
      <p>エラーです。ホームに戻ってください。</p>
      <div class="btn-group" role="group">
          <a class="btn btn-default" href="{{ url('/') }}">HOME</a>
      </div>
      @endif
  </div>
</div>
@endsection
