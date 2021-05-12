@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.edit')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('funerals.update',$f->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6 @error('first_name') has-danger @enderror">
                                <label for="first_name">{{__('names.f_name')}}</label>
                                <input type="text" class="form-control" value="{{old('first_name',$f->first_name)}}" id="first_name" name="first_name" placeholder="{{__('names.f_name')}}">
                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 @error('last_name') has-danger @enderror">
                                <label for="last_name">{{__('names.l_name')}}</label>
                                <input type="text" class="form-control" id="last_name" value="{{old('last_name',$f->last_name)}}" name="last_name"  placeholder="{{__('names.l_name')}}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('gender') has-danger @enderror">
                            <label for="gender">{{__('names.gender')}}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" {{$f->gender === 'male' ? 'selected' : ''}}>{{__('names.male')}}</option>
                                <option value="female" {{$f->gender === 'female' ? 'selected' : ''}}>{{__('names.female')}}</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_date') has-danger @enderror">
                            <label for="birth_date">{{__('names.birth_date')}}</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{old('birth_date',$f->birth_date->format('Y-m-d'))}}" placeholder="{{__('names.birth_date')}}">
                            @error('birth_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_place') has-danger @enderror">
                            <label for="birth_place">{{__('names.birth_place')}}</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{old('birth_place',$f->birth_place)}}" placeholder="{{__('names.birth_place')}}">
                            @error('birth_place')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('death_date') has-danger @enderror">
                            <label for="death_date">{{__('names.death_date')}}</label>
                            <input type="date" class="form-control" id="death_date" name="death_date" value="{{old('death_date',$f->death_date->format('Y-d-m'))}}" placeholder="{{__('names.death_date')}}">
                            @error('death_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('death_place') has-danger @enderror">
                            <label for="death_place">{{__('names.death_place')}}</label>
                            <input type="text" class="form-control" id="death_place" name="death_place" value="{{old('death_place',$f->death_place)}}" placeholder="{{__('names.death_place')}}">
                            @error('death_place')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('father_name') has-danger @enderror">
                            <label for="father_name">{{__('names.father_name')}}</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{old('father_name',$f->father_name)}}" placeholder="{{__('names.father_name')}}">
                            @error('father_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('mother_full_name') has-danger @enderror">
                            <label for="mother_full_name">{{__('names.mother_full_name')}}</label>
                            <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" value="{{old('mother_full_name',$f->mother_full_name)}}" placeholder="{{__('names.mother_full_name')}}">
                            @error('mother_full_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('expenses') has-danger @enderror">
                            <label for="expenses">{{__('names.expenses')}}</label>
                            <input type="number" class="form-control" id="expenses" name="expenses" value="{{old('expenses',$f->expenses)}}" placeholder="{{__('names.expenses')}}">
                            @error('expenses')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('meals_number') has-danger @enderror">
                            <label for="meals_number">{{__('names.n_meals')}}</label>
                            <input type="number" class="form-control" id="meals_number" name="meals_number" value="{{old('meals_number',$f->meals_number)}}" placeholder="{{__('names.n_meals')}}">
                            @error('meals_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('contributors') has-danger @enderror">
                            <label for="contributors">{{__('names.contributors')}}</label>
                            <input type="text" class="form-control" id="contributors" name="contributors" value="{{old('contributors',$f->contributors)}}" placeholder="{{__('names.contributors')}}">
                            @error('contributors')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('moderators') has-danger @enderror">
                            <label for="moderators">{{__('names.moderators')}}</label>
                            <input type="text" class="form-control" id="moderators" name="moderators" value="{{old('moderators',$f->moderators)}}" placeholder="{{__('names.moderators')}}">
                            @error('moderators')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('note') has-danger @enderror">
                            <label for="note">{{__('names.note')}}</label>
                            <input type="text" class="form-control" id="note" name="note" value="{{old('note',$f->note)}}" placeholder="{{__('names.note')}}">
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
