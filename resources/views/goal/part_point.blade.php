@extends('/base')
@section('head')
@section('title')
PART POINT
@endsection
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('ポイント割り振り')}}</h1></div><br />

                <div class="card-body">
                  <p>現在の所有ポイント: {{ Auth::user()->points }}</p>
                  <p>いくら割り振りますか?</p>
                  <br />
                    <form method="POST" action="{{ url('/goal/give_point') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="give_point" class="col-md-4 col-form-label text-md-right">{{ __('割り振るポイント数') }}</label>

                            <div class="col-md-6">
                                <input id="give_point" type="number" class="form-control @error('give_point') is-invalid @enderror" name="give_point" value="{{ old('give_point') }}" required>
                                @error('give_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="give_id" value="{{ $give_id }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#partModal">
                                    {{ __('割り振り') }}
                                </button>
                                <x-modal>
                                  <x-slot name="modal_id">partModal</x-slot>
                                  <x-slot name="modal_title">ポイントを割り振ってよろしいですか?</x-slot>
                                  <x-slot name="modal_body">割り振ったポイントは戻すことはできません。</x-slot>
                                  <x-slot name="modal_btn">btn-primary</x-slot>
                                  <x-slot name="modal_type">割り振り</x-slot>
                                </x-modal>
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
