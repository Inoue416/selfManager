@extends('/base')
@section('head')
@section('title')
TODO LIST
@endsection
@endsection
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">TODOリスト</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    @if($todolists!=NULL)
    <table class="table text-center">
      <tr>
        <th class="text-center">TODO</th>
        <th class="text-center">期限</th>
        <th class="text-center">ポイント</th>
        <th class="text-center">詳細</th>
        <th class="text-center">達成</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($todolists as $todolist)
      <tr>
        <td>
          {{ $todolist->title }}
        </td>
        <td>{{ $todolist->limit }}</td>
        <td>{{ $todolist->point }}</td>
        <td>
          <form action="{{ url('/todolist/detail_todolist', $todolist->id) }}" method="get">
            <input type="hidden" name="detail_id" value="{{ $todolist->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-default" aria-label="Left Align">detail</button>
          </form>
        </td>
        <td>
          <form action="{{ url('/todolist/finish_todolist') }}" method="post">
            <input type="hidden" name="finish_id" value="{{ $todolist->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-xs btn-default" aria-label="Left Align" data-toggle="modal" data-target="#finishModal">fin</button>
            <x-modal>
              <x-slot name="modal_id">finishModal</x-slot>
              <x-slot name="modal_title">達成でよろしいですか?</x-slot>
              <x-slot name="modal_body">達成することでポイントが加算されます。</x-slot>
              <x-slot name="modal_btn">btn-primary</x-slot>
              <x-slot name="modal_type">達成</x-slot>
            </x-modal>
          </form>
        </td>
        <td>
          <form action="{{ url('/todolist/delete_todolist') }}" method="post">
            <input type="hidden" name="delete_id" value="{{ $todolist->id }}">
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
    {{ $todolists->links('vendor.pagination.default') }}
    <!-- モーダル処理 -->
    @else
    <p>TODOリストは何にも存在しません。新規追加しましょう。</p>
    @endif
    <div class="btn-group" role="group">
      <div><a href="{{ url('/todolist/create_todolist') }}" class="btn btn-default">新規作成</a></div>
    </div>
  </div>
</div>
@endsection
