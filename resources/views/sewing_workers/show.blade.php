@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.details')}}</h4>
                    <button class="btn btn-danger btn-sm" onclick="deleteForm({{$sw->id}})"  rel="tooltip"  title="{{__('actions.delete')}}" data-original-title="{{__('actions.delete')}}">
                        <i class="material-icons">close</i>
                    </button>
                    <a class="btn btn-warning btn-sm" href="{{route('sewing-workers.edit',$sw->id)}}"  rel="tooltip"  title="{{__('actions.edit')}}" data-original-title="{{__('actions.edit')}}">
                        <i class="material-icons">edit</i>
                    </a>

                </div>
                <div class="card-body ">
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.f_name')}}</div>
                        <div class="col-md-6 border">{{$sw->first_name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.l_name')}}</div>
                        <div class="col-md-6 border">{{$sw->last_name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.gender')}}</div>
                        <div class="col-md-6 border">{{__('names.'.$sw->gender)}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.birth_date')}}</div>
                        <div class="col-md-6 border">{{$sw->birth_date->format('d/m/Y')}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.birth_place')}}</div>
                        <div class="col-md-6 border">{{$sw->birth_place}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.start_date')}}</div>
                        <div class="col-md-6 border">{{$sw->work_start_date->format('d/m/Y')}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.end_date')}}</div>
                        <div class="col-md-6 border">{{$sw->work_end_date ? $sw->work_end_date->format('d/m/Y') : ''}}</div>
                    </div>

                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.father_name')}}</div>
                        <div class="col-md-6 border">{{$sw->father_name}}</div>
                    </div>

                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.mother_full_name')}}</div>
                        <div class="col-md-6 border">{{$sw->mother_full_name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.address')}}</div>
                        <div class="col-md-6 border">{{$sw->address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.phone_number')}}</div>
                        <div class="col-md-6 border">{{$sw->phone_number}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.salary')}}</div>
                        <div class="col-md-6 border">{{$sw->salary}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.qualification')}}</div>
                        <div class="col-md-6 border">{{$sw->qualification}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.note')}}</div>
                        <div class="col-md-6 border">{{$sw->note}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.created_at')}}</div>
                        <div class="col-md-6 border">{{$sw->created_at->format('d/m/Y')}}</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('actions.create')}}</h4>
                </div>
                <div class="card-body ">
                    <form method="post" action="{{route('sewing-workers.add.payments', $sw->id)}}">
                        @csrf
                        <div class="form-group  @error('month') has-danger @enderror">
                            <label for="month">{{__('names.month')}}</label>
                            <input type="date" class="form-control" name="month" value="{{old('month')}}" id="month"  placeholder="{{__('names.month')}}">
                            @error('month')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  @error('amount') has-danger @enderror">
                            <label for="amount">{{__('names.amount')}}</label>
                            <input type="number" class="form-control" value="{{old('amount')}}" id="amount" name="amount" placeholder="{{__('names.amount')}}">
                            @error('amount')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('names.save')}}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12" id="app">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.list',['name' => __('names.payments')])}}</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{__('names.month')}}</th>
                                <th>{{__('names.amount')}}</th>
                                <th class="text-right">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sw->payments as $key => $p)
                                <tr>
                                    <td class="text-center">{{$key + 1}}</td>
                                    <td>{{$p->month}}</td>
                                    <td>{{$p->amount}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" onclick="window.location='{{route('payments.edit',$p->id)}}'" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">edit</i>
                                        </button>

                                        <button onclick="deletePaymentForm({{$sw->id}},{{$p->id}})" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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

        const deletePaymentForm = (sewingWorkerId,paymentId) => {
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
                    createPaymentForm(sewingWorkerId,paymentId).submit();
                }
            });
        }

        const createForm = id => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/sewing-workers/${id}`);

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

        const createPaymentForm = (sewingWorkerId,paymentId) => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/sewing-workers/${sewingWorkerId}/remove-payment/${paymentId}`);

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
