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
                <div class="card-header"><h1>{{ __('Goal新規作成')}}</h1></div><br />

                <div class="card-body">
                    <form method="POST" action="{{ url('/goal/add_goal') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="goal_contents" class="col-md-4 col-form-label text-md-right">{{ __('Goal') }}</label>

                            <div class="col-md-6">
                                <input id="goal_contents" type="text" class="form-control @error('goal_contents') is-invalid @enderror" name="goal_contents" required>

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
                                <textarea id="goal_memo" rows="5" type="text" class="form-control @error('goal_memo') is-invalid @enderror" name="goal_memo" value=""></textarea>

                                @error('goal_memo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="total_point" value="0">

                        <div class="form-group row">
                            <label for="goal_point" class="col-md-4 col-form-label text-md-right">{{ __('ゴールポイント') }}</label>

                            <div class="col-md-6">
                                <input id="goal_point" type="number" class="form-control @error('goal_point') is-invalid @enderror" name="goal_point" required>

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
                                    {{ __('作成') }}
                                </button>
                              </div>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-default" href="{{ url('/goal/goal') }}">キャンセル</a>
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
