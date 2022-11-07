@extends('/base')
@section('head')
@section('title')
CREARE GOAL
@endsection
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Goalの編集')}}</h1></div><br />

                <div class="card-body">
                  @if($data != NULL)
                  @foreach($data as $d)
                    <form method="POST" action="{{ url('/goal/update_goal') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="goal_contents" class="col-md-4 col-form-label text-md-right">{{ __('Goal') }}</label>

                            <div class="col-md-6">
                                <input id="goal_contents" type="text" class="form-control @error('goal_contents') is-invalid @enderror" name="goal_contents" value="{{ $d->goal_contents }}" required>

                                @error('goal_contents')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goal_memo" class="col-md-4 col-form-label text-md-right">{{ __('メモ') }}</label>

                            <div class="col-md-6">
                                <textarea id="goal_memo" rows="5" type="textarea" class="form-control @error('goal_memo') is-invalid @enderror" name="goal_memo">{{ $d->goal_memo }}</textarea>

                                @error('goal_memo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="total_point" value="{{ $d->total_point }}">

                        <div class="form-group row">
                            <label for="goal_point" class="col-md-4 col-form-label text-md-right">{{ __('ゴールポイント') }}</label>

                            <div class="col-md-6">
                                <input id="goal_point" type="number" class="form-control @error('goal_point') is-invalid @enderror" name="goal_point" value="{{ $d->goal_point }}" required>

                                @error('goal_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集') }}
                                </button>
                              </div>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-default" href="{{ url('/goal/detail_goal', $d->id) }}">キャンセル</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
