@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.edit')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('payments.update', $p->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group  @error('month') has-danger @enderror">
                            <label for="month">{{__('names.month')}}</label>
                            <input type="date" class="form-control" name="month" value="{{old('month', $p->month)}}" id="month" disabled placeholder="{{__('names.month')}}">
                            @error('month')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  @error('amount') has-danger @enderror">
                            <label for="amount">{{__('names.amount')}}</label>
                            <input type="number" class="form-control" value="{{old('amount', $p->amount)}}" id="amount" name="amount" placeholder="{{__('names.amount')}}">
                            @error('amount')
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
