@extends('clubs.show')


@section('form-content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('actions.create')}}</h4>
            </div>
            <div class="card-body ">
                <form method="post" action="{{route('clubs.invoices.update',[$club->id,$invoice->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group  @error('client_name') has-danger @enderror">
                        <label for="client_name">{{__('names.f_name')}}</label>
                        <input type="text" class="form-control" name="client_name" value="{{old('client_name',$invoice->client_name)}}" id="client_name"  placeholder="{{__('names.f_name')}}">
                        @error('client_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('amount') has-danger @enderror">
                        <label for="client_name">{{__('names.amount')}}</label>
                        <input type="number" class="form-control" name="amount" value="{{old('amount',$invoice->amount)}}" id="amount"  placeholder="{{__('names.amount')}}">
                        @error('amount')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('date') has-danger @enderror">
                        <label for="date">{{__('names.date')}}</label>
                        <input type="date" class="form-control" name="date" value="{{old('date',$invoice->date ? $invoice->date->format('Y-m-d') : '')}}" id="date"  placeholder="{{__('names.date')}}">
                        @error('date')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group  @error('note') has-danger @enderror">
                        <label for="year">{{__('names.note')}}</label>
                        <input type="text" class="form-control" name="note" value="{{old('note',$invoice->note)}}" id="note"  placeholder="{{__('names.note')}}">
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
