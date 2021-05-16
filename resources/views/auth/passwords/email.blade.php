@extends('layouts.auth-app')

@section('content')
@if (session('status'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('password.email') }}">
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
    <div class="col-12 mb-3 text-center">
        <button type="submit" class="btn bg-success text-white px-5">
            {{ __('إرسال رابط إعادة تعيين كلمة السر') }}
        </button>
    </div>
    <div class="text-center">
        <a href="{{url('login')}}" class="text-decoration-underline text-success">
            تسجيل الدخول
        </a>
    </div>
</form>
@endsection
