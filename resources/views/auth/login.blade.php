@extends('layouts.auth-app')

@section('content')
    <div class="text-center m-1">
        المجمع الثقافي للزاوية التجانية بالهمائسة
    </div>
<!-- /.login-logo -->
<form action="{{route('login')}}" method="post">
    @csrf
    <div class="col-12 mb-3 mt-2">
        <label for="email" class="small text-muted mb-1">{{__('names.email')}} <span class="text-danger">*</span></label>
        <input type="email" name="email"
               class="form-control rounded-0 @error('email') is-invalid @enderror"
               value="{{old('password')}}"
               placeholder="{{__('names.email')}}" >
        @error('email')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="password" class="small text-muted mb-1">{{__('names.password')}} <span class="text-danger">*</span></label>
        <input type="password" id="password"  class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" placeholder="{{__('names.password')}}">
        @error('password')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col-12 mb-4">
        <div class="form-check text-muted">
            <input class="form-check-input" type="checkbox" value="" id="remember" {{ old('remember') ? 'checked' : '' }} >
            <label class="form-check-label" for="remember">
                مواصلة الدخول
            </label>
        </div>
    </div>
    <div class="col-12 mb-3 text-center">
        <button type="submit" class="btn bg-success text-white px-5">
            تسجيل الدخول
        </button>
    </div>
    <div class="text-center">
        <a href="{{ route('password.request')}}" class="text-decoration-underline text-success">
            هل نسيت كلمة المرور ؟
        </a>
    </div>
</form>

@endsection
