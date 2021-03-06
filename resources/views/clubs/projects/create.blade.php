@extends('clubs.show')


@section('form-content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('actions.create')}}</h4>
            </div>
            <div class="card-body ">
                <form method="post" action="{{route('clubs.projects.store',$club->id)}}">
                    @csrf

                    <div class="form-group  @error('name') has-danger @enderror">
                        <label for="name">{{__('names.f_name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name"  placeholder="{{__('names.f_name')}}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>



                    <div class="form-group  @error('owner') has-danger @enderror">
                        <label for="owner">{{__('names.project_owner')}}</label>
                        <input type="text" class="form-control" name="owner" value="{{old('owner')}}" id="owner"  placeholder="{{__('names.project_owner')}}">
                        @error('owner')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('amount') has-danger @enderror">
                        <label for="client_name">{{__('names.amount')}}</label>
                        <input type="number" class="form-control" name="amount" value="{{old('amount')}}" id="amount"  placeholder="{{__('names.amount')}}">
                        @error('amount')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('start_date') has-danger @enderror">
                        <label for="start_date">{{__('names.start_date')}}</label>
                        <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}" id="start_date"  placeholder="{{__('names.start_date')}}">
                        @error('start_date')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('end_date') has-danger @enderror">
                        <label for="end_date">{{__('names.end_date')}}</label>
                        <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}" id="end_date"  placeholder="{{__('names.end_date')}}">
                        @error('end_date')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('note') has-danger @enderror">
                        <label for="year">{{__('names.note')}}</label>
                        <input type="text" class="form-control" name="note" value="{{old('note')}}" id="note"  placeholder="{{__('names.note')}}">
                        @error('note')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{__('names.save')}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
