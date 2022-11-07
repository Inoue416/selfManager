@extends('/base')
@section('head')
@section('title')
ACHIEVED GOAL DETAIL
@endsection
@endsection
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">達成済みGoal詳細</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    @if($data!=NULL)
    @foreach($data as $d)
    <div class="panel panel-default">
      <div class="panel-heading">
        内容
      </div>
      <div class="panel-body">
        {{ $d->achieved_contents }}
      </div>
    	<div class="panel-heading">
    		メモ
    	</div>
    	<div class="panel-body">
        {!! nl2br(e($d->achieved_memo)) !!}
    	</div>
      <div class="panel-heading">
    		ポイント
    	</div>
    	<div class="panel-body">
    		{{ $d->achieved_point }}
    	</div>
    </div>
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
