@extends('clubs.show')


@section('form-content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('actions.edit')}}</h4>
            </div>
            <div class="card-body ">
                <form method="post" action="{{route('clubs.subs.update',[$club->id,$sub->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group  @error('name') has-danger @enderror">
                        <label for="name">{{__('names.f_name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$sub->name)}}" id="name"  placeholder="{{__('names.f_name')}}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('amount') has-danger @enderror">
                        <label for="client_name">{{__('names.amount')}}</label>
                        <input type="number" class="form-control" name="amount" value="{{old('amount',$sub->amount)}}" id="amount"  placeholder="{{__('names.amount')}}">
                        @error('amount')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group  @error('note') has-danger @enderror">
                        <label for="year">{{__('names.note')}}</label>
                        <input type="text" class="form-control" name="note" value="{{old('note',$sub->note)}}" id="note"  placeholder="{{__('names.note')}}">
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
