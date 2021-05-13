@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.edit')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('general-statistics.update',$gs->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6 @error('first_name') has-danger @enderror">
                                <label for="first_name">{{__('names.f_name')}}</label>
                                <input type="text" class="form-control" value="{{old('first_name',$gs->first_name)}}" id="first_name" name="first_name" placeholder="{{__('names.f_name')}}">
                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 @error('last_name') has-danger @enderror">
                                <label for="last_name">{{__('names.l_name')}}</label>
                                <input type="text" class="form-control" id="last_name" value="{{old('last_name',$gs->last_name)}}" name="last_name"  placeholder="{{__('names.l_name')}}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('gender') has-danger @enderror">
                            <label for="gender">{{__('names.gender')}}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" {{$gs->gender === 'male' ? 'selected' : ''}}>{{__('names.male')}}</option>
                                <option value="female" {{$gs->gender === 'female' ? 'selected' : ''}}>{{__('names.female')}}</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_date') has-danger @enderror">
                            <label for="birth_date">{{__('names.birth_date')}}</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{old('birth_date',$gs->birth_date->format('Y-m-d'))}}" placeholder="{{__('names.birth_date')}}">
                            @error('birth_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_place') has-danger @enderror">
                            <label for="birth_place">{{__('names.birth_place')}}</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{old('birth_place',$gs->birth_place)}}" placeholder="{{__('names.birth_place')}}">
                            @error('birth_place')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('father_name') has-danger @enderror">
                            <label for="father_name">{{__('names.father_name')}}</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{old('father_name',$gs->father_name)}}" placeholder="{{__('names.father_name')}}">
                            @error('father_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('mother_full_name') has-danger @enderror">
                            <label for="mother_full_name">{{__('names.mother_full_name')}}</label>
                            <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" value="{{old('mother_full_name',$gs->mother_full_name)}}" placeholder="{{__('names.mother_full_name')}}">
                            @error('mother_full_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-danger @enderror">
                            <label for="address">{{__('names.address')}}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address',$gs->address)}}" placeholder="{{__('names.address')}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('phone_number') has-danger @enderror">
                            <label for="phone_number">{{__('names.phone_number')}}</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number',$gs->phone_number)}}" placeholder="{{__('names.phone_number')}}">
                            @error('phone_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('job') has-danger @enderror">
                            <label for="job">{{__('names.job')}}</label>
                            <input type="text" class="form-control" id="job" name="job" value="{{old('job',$gs->job)}}" placeholder="{{__('names.job')}}">
                            @error('job')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('job_address') has-danger @enderror">
                            <label for="job">{{__('names.job_address')}}</label>
                            <input type="text" class="form-control" id="job_address" name="job_address" value="{{old('job_address',$gs->job_address)}}" placeholder="{{__('names.job_address')}}">
                            @error('job_address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('serial_number') has-danger @enderror">
                            <label for="contributors">{{__('names.serial_number')}}</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{old('serial_number',$gs->serial_number)}}" placeholder="{{__('names.serial_number')}}">
                            @error('serial_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('national_number') has-danger @enderror">
                            <label for="national_number">{{__('names.national_number')}}</label>
                            <input type="text" class="form-control" id="national_number" name="national_number" value="{{old('national_number',$gs->national_number)}}" placeholder="{{__('names.national_number')}}">
                            @error('national_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('social_status') has-danger @enderror">
                            <label for="social_status">{{__('names.social_status')}}</label>
                            <input type="text" class="form-control" id="social_status" name="social_status" value="{{old('social_status',$gs->social_status)}}" placeholder="{{__('names.social_status')}}">
                            @error('social_status')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('qualification') has-danger @enderror">
                            <label for="moderators">{{__('names.qualification')}}</label>
                            <input type="text" class="form-control" id="qualification" name="qualification" value="{{old('qualification',$gs->qualification)}}" placeholder="{{__('names.qualification')}}">
                            @error('qualification')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('note') has-danger @enderror">
                            <label for="note">{{__('names.note')}}</label>
                            <input type="text" class="form-control" id="note" name="note" value="{{old('note',$gs->note)}}" placeholder="{{__('names.note')}}">
                            @error('note')
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
