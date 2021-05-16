@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.create')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('groups.store')}}">
                        @csrf
                        <div class="form-group  @error('name') has-danger @enderror">
                            <label for="name">{{__('names.f_name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name"  placeholder="{{__('names.f_name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group  @error('teacher_id') has-danger @enderror">
                            <label for="teacher_id">{{__('names.teachers')}}</label>
                            <select name="teacher_id" id="teacher_id" class="form-control">
                                @foreach($teachers as $t)
                                    <option value="{{$t->id}}" {{$t->id === old('teacher_id')}}>{{$t->name}}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group  @error('study_place') has-danger @enderror">
                            <label for="study_place">{{__('names.study_place')}}</label>
                            <input type="text" class="form-control" value="{{old('study_place')}}" id="study_place" name="study_place" placeholder="{{__('names.study_place')}}">
                            @error('study_place')
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
