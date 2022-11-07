@extends('/base')
@section('head')
@section('title')
UPDATE TODO
@endsection
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('TODO編集')}}</h1></div><br />

                <div class="card-body">
                  @if($data != NULL)
                  @foreach($data as $d)
                    <form method="POST" action="{{ url('/todolist/update_todolist') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $d->title }}" required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contents" class="col-md-4 col-form-label text-md-right">{{ __('内容') }}</label>

                            <div class="col-md-6">
                                <input id="contents" type="contents" class="form-control @error('contents') is-invalid @enderror" name="contents" value="{{ $d->contents }}" required>

                                @error('contents')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="memo" class="col-md-4 col-form-label text-md-right">{{ __('メモ') }}</label>

                            <div class="col-md-6">
                                <textarea id="memo" rows="5" type="textarea" class="form-control @error('memo') is-invalid @enderror" name="memo">{{ $d->todolist_memo }}</textarea>

                                @error('contents')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="limit" class="col-md-4 col-form-label text-md-right">{{ __('期限') }}</label>

                            <div class="col-md-6">
                                <input id="limit" type="limit" class="form-control @error('limit') is-invalid @enderror" name="limit" value="{{ $d->limit }}" required>

                                @error('limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="point" class="col-md-4 col-form-label text-md-right">{{ __('点数') }}</label>

                            <div class="col-md-6">
                                <input id="point" type="number" class="form-control" name="point" value="{{ $d->point }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('更新') }}
                                </button>
                              </div>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-default" href="{{ url('/todolist/detail_todolist', $d->id) }}">キャンセル</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                    @else
                    <p>エラーです。ホームに戻ってください。</p>
                    <div class="btn-group" role="group">
                        <a class="btn btn-default" href="{{ url('/') }}">HOME</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
