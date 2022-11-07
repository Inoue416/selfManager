@extends('/base')
@section('head')
@section('title')
ACHIEVED GOAL LIST
@endsection
@endsection
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">達成済みGoalリスト</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    @if ($achieved_goals!=NULL)
    <table class="table text-center">
      <tr>
        <th class="text-center">獲得済みGoal</th>
        <th class="text-center">達成済みポイント</th>
        <th class="text-center">詳細</th>
      </tr>
      @foreach($achieved_goals as $achieved_goal)
      <tr>
        <td>{{ $achieved_goal->achieved_contents }}</td>
        <td>{{ $achieved_goal->achieved_point }}</td>
        <td>
          <form action="{{ url('/goal/detail_achieved_goal', $achieved_goal->id) }}" method="get">
            <input type="hidden" name="detail_achieved_id" value="{{ $achieved_goal->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-default" aria-label="Left Align">detail</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    {{ $achieved_goals->links('vendor.pagination.default') }}
    @else
    <p>達成済みのGoalが何もありません。TODOリストをクリアしてGoalを目指しましょう。</p>
    <div class="btn-group" role="group">
        <a class="btn btn-default" href="{{ url('/todolist/todolist') }}">TODOリストへ</a>
    </div>
    @endif
  </div>
</div>
@endsection
