@extends('layouts.app')

@section('css')
    <style>
        .btn-back  {
            margin-top: 5px;
        }

        .btn-back span:hover {
            border-bottom: 1px black solid;
        }
    </style>
@endsection

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group @error('email') has-error @enderror">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail Address" required="">
            @error('email')
                <span class="text-danger small">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <div style="display: flex; display:inline;">
                <button type="submit" class="btn btn-primary" style="margin-top: 5px;">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
            <div class="pull-right">
                <a href="{{ url('/') }}" class="btn-back btn btn-danger"><span>Back</span></a>
            </div>
        </div>
    </form>
</div>
@endsection
