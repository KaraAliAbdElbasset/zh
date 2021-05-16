@extends('layouts.auth-app')

@section('content')

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="col-12 mb-3 mt-5">
        <label for="email" class="small text-muted mb-1">{{__('names.email')}} <span class="text-danger">*</span></label>
        <input type="email" name="email"
               class="form-control rounded-0 @error('email') is-invalid @enderror"
               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
               placeholder="{{__('names.email')}}" >
        @error('email')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="password" class="small text-muted mb-1">{{__('names.password')}} <span class="text-danger">*</span></label>
        <input type="password" id="password"
               class="form-control rounded-0 @error('password') is-invalid @enderror"
                placeholder="{{__('names.password')}}" name="password" required autocomplete="new-password">
        @error('password')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="password-confirm" class="small text-muted mb-1">{{__('names.password_confirmation')}} <span class="text-danger">*</span></label>
        <input id="password-confirm" placeholder="{{__('names.password_confirmation')}}" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">

    </div>

    <div class="col-12 mb-3 text-center">
        <button type="submit" class="btn bg-success text-white px-5">
            إعادة تعيين كلمة المرور
        </button>
    </div>

</form>
@endsection
