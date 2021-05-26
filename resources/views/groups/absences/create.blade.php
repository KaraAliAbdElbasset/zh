@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.create')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('groups.students.absences.store',[$g->id,$student_id])}}">
                        @csrf
                        <div class="form-group  @error('reason') has-danger @enderror">
                            <label for="reason">{{__('names.reason')}}</label>
                            <input type="text" class="form-control" name="reason" value="{{old('reason')}}" id="reason"  placeholder="{{__('names.reason')}}">
                            @error('reason')
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
