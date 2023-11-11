@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Github Token') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('UserTokenStore') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="email"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Github Token') }}</label>

                                                <div class="col-md-6">
                                                    <input id="token" type="text"
                                                           class="form-control @error('token') is-invalid @enderror"
                                                           name="token" value="{{ old('token') }}" required
                                                           autocomplete="token" autofocus>

                                                    @error('token')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Expire Date') }}</label>

                                                <div class="col-md-6">
                                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="current-date">

                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Save') }}
                                                    </button>


                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
