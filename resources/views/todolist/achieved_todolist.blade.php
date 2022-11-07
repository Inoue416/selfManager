@extends('/base')
@section('head')
@section('title')
ACHIEVED TODOLIST
@endsection
@endsection
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">達成済みTODOリスト</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    @if ($achieved_todolists!=NULL)
    <table class="table text-center">
      <tr>
        <th class="text-center">達成済みTODO</th>
        <th class="text-center">獲得済みポイント</th>
        <th class="text-center">詳細</th>
      </tr>
      @foreach($achieved_todolists as $achieved_todolist)
      <tr>
        <td>{{ $achieved_todolist->achieved_title }}</td>
        <td>{{ $achieved_todolist->got_point }}</td>
        <td>
          <form action="{{ url('/todolist/detail_achieved_todolist', $achieved_todolist->id) }}" method="get">
            <input type="hidden" name="detail_achieved_id" value="{{ $achieved_todolist->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-default" aria-label="Left Align">detail</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    @else
    <p>達成済みのTODOが何もありません。TODOリストを設定して達成し、ポイントをゲットしましょう。</p>
    <div class="btn-group" role="group">
        <a class="btn btn-default" href="{{ url('/todolist/todolist') }}">TODOリストへ</a>
    </div>
    @endif
  </div>
</div>
@endsection
