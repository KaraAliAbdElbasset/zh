@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.edit')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('users.update',$u->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group  @error('name') has-danger @enderror">
                            <label for="name">{{__('names.f_name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$u->name)}}" id="name"  placeholder="{{__('names.f_name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group  @error('email') has-danger @enderror">
                            <label for="email">{{__('names.email')}}</label>
                            <input type="email" class="form-control" value="{{old('email',$u->email)}}" id="email" name="email" placeholder="{{__('names.email')}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group  @error('password') has-danger @enderror">
                            <label for="password">{{__('names.password')}}</label>
                            <input type="password" class="form-control"  id="password" name="password" placeholder="{{__('names.password')}}">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="password_confirmation">{{__('names.password_confirmation')}}</label>
                            <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation" placeholder="{{__('names.password_confirmation')}}">
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('names.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
