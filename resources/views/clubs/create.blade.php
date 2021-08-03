@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.create')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('clubs.store')}}">
                        @csrf
                        <div class="form-group  @error('name') has-danger @enderror">
                            <label for="name">{{__('names.f_name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name"  placeholder="{{__('names.f_name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  @error('managing_office') has-danger @enderror">
                            <label for="managing_office">{{__('names.managing_office')}}</label>
                            <input type="text" class="form-control" name="managing_office" value="{{old('managing_office')}}" id="managing_office"  placeholder="{{__('names.managing_office')}}">
                            @error('managing_office')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  @error('establishing_date') has-danger @enderror">
                            <label for="establishing_date">{{__('names.establishing_date')}}</label>
                            <input type="date" class="form-control" name="establishing_date" value="{{old('establishing_date')}}" id="establishing_date"  placeholder="{{__('names.establishing_date')}}">
                            @error('establishing_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

{{--                        <div class="form-group  @error('year') has-danger @enderror">--}}
{{--                            <label for="year">{{__('names.year')}}</label>--}}
{{--                            <input type="text" class="form-control" name="year" value="{{old('year')}}" id="year"  placeholder="{{__('names.year')}}">--}}
{{--                            @error('year')--}}
{{--                            <div class="text-danger">{{$message}}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group  @error('address') has-danger @enderror">
                            <label for="address">{{__('names.address')}}</label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address"  placeholder="{{__('names.address')}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  @error('goals') has-danger @enderror">
                            <label for="goals">{{__('names.goals')}}</label>
                            <input type="text" class="form-control" name="goals" value="{{old('goals')}}" id="goals"  placeholder="{{__('names.goals')}}">
                            @error('goals')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  @error('funding_sources') has-danger @enderror">
                            <label for="funding_sources">{{__('names.funding_sources')}}</label>
                            <input type="text" class="form-control" name="funding_sources" value="{{old('funding_sources')}}" id="funding_sources"  placeholder="{{__('names.funding_sources')}}">
                            @error('funding_sources')
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
