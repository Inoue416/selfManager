@extends('/base')
@section('head')
@section('title')
GOAL LIST
@endsection
@endsection
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">Goalリスト</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    @if ($goals!=NULL)
    <table class="table text-center">
      <tr>
        <th class="text-center">Goal</th>
        <th class="text-center">達成度</th>
        <th class="text-center">詳細</th>
        <th class="text-center">ポイント割り振り</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($goals as $goal)
      <tr>
        <td>{{ $goal->goal_contents }}</td>
        <td>{{ $goal->total_point }} / {{ $goal->goal_point }}</td>
        <td>
          <form action="{{ url('/goal/detail_goal', $goal->id) }}" method="get">
            <input type="hidden" name="give_id" value="{{ $goal->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-default" aria-label="Left Align">detail</button>
          </form>
        </td>
        <td>
          <form action="{{ url('/goal/part_point', $goal->id) }}" method="get">
            <input type="hidden" name="give_id" value="{{ $goal->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-default" aria-label="Left Align">part</button>
          </form>
        </td>
        <td>
          <form action="{{ url('/goal/delete_goal') }}" method="post">
            <input type="hidden" name="delete_id" value="{{ $goal->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-xs btn-danger" aria-label="Left Align" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-trash"></span></button>
            <x-modal>
              <x-slot name="modal_id">deleteModal</x-slot>
              <x-slot name="modal_title">本当に削除しますか?</x-slot>
              <x-slot name="modal_body">削除したデータは復元することはできません。</x-slot>
              <x-slot name="modal_btn">btn-danger</x-slot>
              <x-slot name="modal_type">削除</x-slot>
            </x-modal>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    {{ $goals->links('vendor.pagination.default') }}

    @else
    <p>設定している報酬が何もありません。報酬を設定しましょう。</p>
    @endif
    <div class="btn-group" role="group">
      <a href="/goal/create_goal" class="btn btn-default">新規作成</a>
    </div>
  </div>
</div>
@endsection
