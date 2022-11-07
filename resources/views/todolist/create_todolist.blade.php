@extends('/base')
@section('head')
@section('title')
CREARE TODO
@endsection
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('TODOの新規作成')}}</h1></div><br />

                <div class="card-body">
                    <form method="POST" action="{{ url('/todolist/add_todolist') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required>

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
                                <input id="contents" type="contents" class="form-control @error('contents') is-invalid @enderror" name="contents" required>

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
                                <textarea id="memo" rows="5" type="textarea" class="form-control @error('memo') is-invalid @enderror" name="memo"></textarea>

                                @error('memo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="limit" class="col-md-4 col-form-label text-md-right">{{ __('期限') }}</label>

                            <div class="col-md-6">
                                <input id="limit" type="limit" class="form-control @error('limit') is-invalid @enderror" name="limit" required>

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
                                <input id="point" type="number" class="form-control" name="point" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('作成') }}
                                </button>
                              </div>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-default" href="{{ url('/todolist/todolist') }}">キャンセル</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
