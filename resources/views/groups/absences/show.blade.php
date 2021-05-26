@extends('layouts.app')

@push('css')

    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

@endpush

@section('content')

    <div class="row">

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.details')}}</h4>

                    <a class="btn btn-warning btn-sm" href="{{route('absences.edit',$a->id)}}"  rel="tooltip"  title="{{__('actions.edit')}}" data-original-title="{{__('actions.edit')}}">
                        <i class="material-icons">edit</i>
                    </a>

                </div>
                <div class="card-body ">
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.f_name')}}</div>
                        <div class="col-md-6 border">{{$a->absenceable->name}}</div>
                    </div>

                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.ab-type')}}</div>
                        <div class="col-md-6 border">{{$a->absenceable instanceof \App\Models\Student ? __('names.student') : __('names.teacher')}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.created_at')}}</div>
                        <div class="col-md-6 border">{{$a->created_at->format('d/m/Y')}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

