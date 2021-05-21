@extends('groups.show')


@section('group-content')

            <div class="card">

                <div class="card-body ">
                    <form method="post" action="{{route('groups.add.students.post', $group->id)}}">
                        @csrf
                        <div class="form-group @error('type') has-danger @enderror">
                            <label for="students">{{__('names.students')}}</label>
                            <select  class="form-control select-2" multiple name="students[]"  id="students">
                                @foreach($students as $s)
                                    <option value="{{$s->id}}" {{old('type') == $s->id ? 'selected' : ''}}>{{$s->name}}</option>
                                @endforeach

                            </select>
                            @error('students')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('names.save')}}</button>
                    </form>
                </div>
            </div>

@endsection
