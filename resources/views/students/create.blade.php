@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.create')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('students.store')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 @error('first_name') has-danger @enderror">
                                <label for="first_name">{{__('names.f_name')}}</label>
                                <input type="text" class="form-control" value="{{old('first_name')}}" id="first_name" name="first_name" placeholder="{{__('names.f_name')}}">
                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 @error('last_name') has-danger @enderror">
                                <label for="last_name">{{__('names.l_name')}}</label>
                                <input type="text" class="form-control" id="last_name" value="{{old('last_name')}}" name="last_name"  placeholder="{{__('names.l_name')}}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('gender') has-danger @enderror">
                            <label for="gender">{{__('names.gender')}}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" {{old('gender') === 'male' ? 'selected' : ''}}>{{__('names.male')}}</option>
                                <option value="female" {{old('gender') === 'female' ? 'selected' : ''}}>{{__('names.female')}}</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_date') has-danger @enderror">
                            <label for="birth_date">{{__('names.birth_date')}}</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{old('birth_date')}}" placeholder="{{__('names.birth_date')}}">
                            @error('birth_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('birth_place') has-danger @enderror">
                            <label for="birth_place">{{__('names.birth_place')}}</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{old('birth_place')}}" placeholder="{{__('names.birth_place')}}">
                            @error('birth_place')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('father_name') has-danger @enderror">
                            <label for="father_name">{{__('names.father_name')}}</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{old('father_name')}}" placeholder="{{__('names.father_name')}}">
                            @error('father_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('father_job') has-danger @enderror">
                            <label for="father_job">{{__('names.father_job')}}</label>
                            <input type="text" class="form-control" id="father_job" name="father_job" value="{{old('father_job')}}" placeholder="{{__('names.father_job')}}">
                            @error('father_job')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('mother_full_name') has-danger @enderror">
                            <label for="mother_full_name">{{__('names.mother_full_name')}}</label>
                            <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" value="{{old('mother_full_name')}}" placeholder="{{__('names.mother_full_name')}}">
                            @error('mother_full_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-danger @enderror">
                            <label for="address">{{__('names.address')}}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" placeholder="{{__('names.address')}}">
                            @error('address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('phone_number') has-danger @enderror">
                            <label for="phone_number">{{__('names.phone_number')}}</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}" placeholder="{{__('names.phone_number')}}">
                            @error('phone_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('education_level') has-danger @enderror">
                            <label for="education_level">{{__('names.education_level')}}</label>
                            <input type="text" class="form-control" id="education_level" name="education_level" value="{{old('education_level')}}" placeholder="{{__('names.education_level')}}">
                            @error('education_level')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('enter_date') has-danger @enderror">
                            <label for="enter_date">{{__('names.enter_date')}}</label>
                            <input type="date" class="form-control" id="enter_date" name="enter_date" value="{{old('enter_date')}}" placeholder="{{__('names.start_date')}}">
                            @error('enter_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('leave_date') has-danger @enderror">
                            <label for="leave_date">{{__('names.end_date')}}</label>
                            <input type="date" class="form-control" id="enter_date" name="leave_date" value="{{old('leave_date' )}}" placeholder="{{__('names.end_date')}}">
                            @error('leave_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('behaviors') has-danger @enderror">
                            <label for="behaviors">{{__('names.behaviors')}}</label>
                            <input type="text" class="form-control" id="behaviors" name="behaviors" value="{{old('behaviors')}}" placeholder="{{__('names.behaviors')}}">
                            @error('behaviors')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('type') has-danger @enderror">
                            <label for="type">{{__('names.type')}}</label>
                            <select  class="form-control" name="type" data-style="btn btn-link" id="type">
                                @foreach(config('student.types') as $t)
                                    <option value="{{$t}}" {{old('type') == $t ? 'selected' : ''}}>{{__('student.'.$t)}}</option>
                                @endforeach

                            </select>                            @error('type')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('memorizing_level') has-danger @enderror" id="memorizing_level_block">
                            <label for="memorizing_level">{{__('names.memorizing_level')}} ({{__('names.number_of_parties')}})</label>
                            <select  class="form-control" name="memorizing_level" data-style="btn btn-link" id="memorizing_level">
                                @for($i = 0 ; $i <= 60 ; $i++)
                                    <option value="{{$i}}"{{old('type') == $i ? 'selected': ''}} >{{$i}}</option>
                                @endfor
                            </select>
                            @error('memorizing_level')
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

@push('js')

    <script>
        let block = document.getElementById('memorizing_level_block');
        let selectType = document.getElementById('type');

        selectType.addEventListener('change',(event) => {
            updateDOM();
        })

        const updateDOM = () => {
            if (parseInt(selectType.value) === 1)
            {
                block.style.display = '';
            }else {
                block.style.display = 'none';
            }
        }

        updateDOM();
    </script>

@endpush
