@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.details')}}</h4>
                    <button class="btn btn-danger btn-sm" onclick="deleteForm({{$gs->id}})"  rel="tooltip"  title="{{__('actions.delete')}}" data-original-title="{{__('actions.delete')}}">
                        <i class="material-icons">close</i>
                    </button>
                    <a class="btn btn-warning btn-sm" href="{{route('general-statistics.edit',$gs->id)}}"  rel="tooltip"  title="{{__('actions.edit')}}" data-original-title="{{__('actions.edit')}}">
                        <i class="material-icons">edit</i>
                    </a>

                </div>
                <div class="card-body ">
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.f_name')}}</div>
                        <div class="col-md-6 border">{{$gs->first_name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.l_name')}}</div>
                        <div class="col-md-6 border">{{$gs->last_name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.gender')}}</div>
                        <div class="col-md-6 border">{{__('names.'.$gs->gender)}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.birth_date')}}</div>
                        <div class="col-md-6 border">{{$gs->birth_date->format('d/m/Y')}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.birth_place')}}</div>
                        <div class="col-md-6 border">{{$gs->birth_place}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.job')}}</div>
                        <div class="col-md-6 border">{{$gs->job}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.job_address')}}</div>
                        <div class="col-md-6 border">{{$gs->job_address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.social_status')}}</div>
                        <div class="col-md-6 border">{{$gs->social_status}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.father_name')}}</div>
                        <div class="col-md-6 border">{{$gs->father_name}}</div>
                    </div>

                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.mother_full_name')}}</div>
                        <div class="col-md-6 border">{{$gs->mother_full_name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.address')}}</div>
                        <div class="col-md-6 border">{{$gs->address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.phone_number')}}</div>
                        <div class="col-md-6 border">{{$gs->phone_number}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.national_number')}}</div>
                        <div class="col-md-6 border">{{$gs->national_number}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.serial_number')}}</div>
                        <div class="col-md-6 border">{{$gs->serial_number}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.qualification')}}</div>
                        <div class="col-md-6 border">{{$gs->qualification}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.note')}}</div>
                        <div class="col-md-6 border">{{$gs->note}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.created_at')}}</div>
                        <div class="col-md-6 border">{{$gs->created_at->format('d/m/Y')}}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('js')

    <script>

        const deleteForm = id => {

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
                    createForm(id).submit();
                }
            });
        }
        const createForm = id => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/general-statistics/${id}`);

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
