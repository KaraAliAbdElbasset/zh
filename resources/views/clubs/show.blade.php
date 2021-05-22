@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.details')}}</h4>
                    <button class="btn btn-danger btn-sm" onclick="deleteForm('/clubs/'+{{$club->id}})"  rel="tooltip"  title="{{__('actions.delete')}}" data-original-title="{{__('actions.delete')}}">
                        <i class="material-icons">close</i>
                    </button>
                    <a class="btn btn-warning btn-sm" href="{{route('clubs.edit',$club->id)}}"  rel="tooltip"  title="{{__('actions.edit')}}" data-original-title="{{__('actions.edit')}}">
                        <i class="material-icons">edit</i>
                    </a>
                </div>
                <div class="card-body ">
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.f_name')}}</div>
                        <div class="col-md-6 border">{{$club->name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.managing_office')}}</div>
                        <div class="col-md-6 border">{{$club->managing_office}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.establishing_date')}}</div>
                        <div class="col-md-6 border">{{$club->establishing_date->format('d-m-Y')}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.year')}}</div>
                        <div class="col-md-6 border">{{$club->year}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.address')}}</div>
                        <div class="col-md-6 border">{{$club->address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.goals')}}</div>
                        <div class="col-md-6 border">{{$club->address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.funding_sources')}}</div>
                        <div class="col-md-6 border">{{$club->address}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 border">{{__('names.created_at')}}</div>
                        <div class="col-md-6 border">{{$club->created_at->format('d/m/Y')}}</div>
                    </div>

                </div>
            </div>
        </div>
        @if(!request()->routeIs('clubs.show'))
            @yield('form-content')
        @else
            @include('clubs.invoices.index')
            @include('clubs.projects.index')
        @endif

    </div>
@endsection

@push('js')

    <script>

        const deleteForm = route => {
            console.log('here')
            Swal.fire({
                title: '{{__('actions.delete_confirm_title')}}',
                text: "{{__('actions.delete_confirm_text')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('actions.delete_btn_yes')}}',
                cancelButtonText: '{{__('actions.delete_btn_cancel')}}'
            }).then((result) => {

                if (result.value) {
                    createForm(route).submit();
                }
            });
        }
        const createForm = route => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',route);

            let i1 = document.createElement("input"); //input element, text
            i1.setAttribute('type',"hidden");
            i1.setAttribute('name','_token');
            i1.setAttribute('value','{{csrf_token()}}');

            let i2 = document.createElement("input"); //input element, text
            i2.setAttribute('type',"hidden");
            i2.setAttribute('name','_method');
            i2.setAttribute('value','DELETE');

            f.appendChild(i1);
            f.appendChild(i2);
            document.body.appendChild(f);
            return f;
        }
    </script>

@endpush
