@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.edit')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('sewing-clients.update',$sc->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group  @error('name') has-danger @enderror">
                            <label for="name">{{__('names.f_name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$sc->name)}}" id="name"  placeholder="{{__('names.f_name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group  @error('phone_number') has-danger @enderror">
                            <label for="phone_number">{{__('names.phone_number')}}</label>
                            <input type="text" class="form-control" value="{{old('phone_number',$sc->phone_number)}}" id="phone_number" name="phone_number" placeholder="{{__('names.phone_number')}}">
                            @error('phone_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group  @error('address') has-danger @enderror">
                            <label for="address">{{__('names.address')}}</label>
                            <input type="text" class="form-control" value="{{old('address',$sc->address)}}" id="address" name="address" placeholder="{{__('names.address')}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">{{__('names.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
