@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.edit')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('teachers.update',$t->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6 @error('first_name') has-danger @enderror">
                                <label for="first_name">{{__('names.f_name')}}</label>
                                <input type="text" class="form-control" value="{{old('first_name',$t->first_name)}}" id="first_name" name="first_name" placeholder="{{__('names.f_name')}}">
                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 @error('last_name') has-danger @enderror">
                                <label for="last_name">{{__('names.l_name')}}</label>
                                <input type="text" class="form-control" id="last_name" value="{{old('last_name',$t->last_name)}}" name="last_name"  placeholder="{{__('names.l_name')}}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('gender') has-danger @enderror">
                            <label for="gender">{{__('names.gender')}}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" {{$t->gender === 'male' ? 'selected' : ''}}>{{__('names.male')}}</option>
                                <option value="female" {{$t->gender === 'female' ? 'selected' : ''}}>{{__('names.female')}}</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_date') has-danger @enderror">
                            <label for="birth_date">{{__('names.birth_date')}}</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{old('birth_date',$t->birth_date->format('Y-m-d'))}}" placeholder="{{__('names.birth_date')}}">
                            @error('birth_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_place') has-danger @enderror">
                            <label for="birth_place">{{__('names.birth_place')}}</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{old('birth_place',$t->birth_place)}}" placeholder="{{__('names.birth_place')}}">
                            @error('birth_place')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('father_name') has-danger @enderror">
                            <label for="father_name">{{__('names.father_name')}}</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{old('father_name',$t->father_name)}}" placeholder="{{__('names.father_name')}}">
                            @error('father_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('mother_full_name') has-danger @enderror">
                            <label for="mother_full_name">{{__('names.mother_full_name')}}</label>
                            <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" value="{{old('mother_full_name',$t->mother_full_name)}}" placeholder="{{__('names.mother_full_name')}}">
                            @error('mother_full_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-danger @enderror">
                            <label for="address">{{__('names.address')}}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address',$t->address)}}" placeholder="{{__('names.address')}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('phone_number') has-danger @enderror">
                            <label for="phone_number">{{__('names.phone_number')}}</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number',$t->phone_number)}}" placeholder="{{__('names.phone_number')}}">
                            @error('phone_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('salary') has-danger @enderror">
                            <label for="salary">{{__('names.salary')}}</label>
                            <input type="number" class="form-control" id="salary" name="salary" value="{{old('salary',$t->salary)}}" placeholder="{{__('names.salary')}}">
                            @error('salary')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('work_start_date') has-danger @enderror">
                            <label for="contributors">{{__('names.start_date')}}</label>
                            <input type="date" class="form-control" id="work_start_date" name="work_start_date" value="{{old('work_start_date',$t->work_start_date->format('Y-m-d'))}}" placeholder="{{__('names.start_date')}}">
                            @error('work_start_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('work_end_date') has-danger @enderror">
                            <label for="contributors">{{__('names.end_date')}}</label>
                            <input type="date" class="form-control" id="work_end_date" name="work_end_date" value="{{old('work_end_date',$t->work_end_date ? $t->work_end_date->format('Y-m-d') :'')}}" placeholder="{{__('names.end_date')}}">
                            @error('work_end_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group @error('qualification') has-danger @enderror">
                            <label for="moderators">{{__('names.qualification')}}</label>
                            <input type="text" class="form-control" id="qualification" name="qualification" value="{{old('qualification',$t->qualification)}}" placeholder="{{__('names.qualification')}}">
                            @error('qualification')
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
