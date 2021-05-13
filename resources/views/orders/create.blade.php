@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.create')}}</h4>
                </div>
                <div class="card-body " id="app">
                    <order-create :clients="[{name:'test',id:1}]"></order-create>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')

    <script src="{{asset('js/app.js')}}"></script>

@endpush
