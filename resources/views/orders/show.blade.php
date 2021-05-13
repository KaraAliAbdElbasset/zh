@extends('layouts.app')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">

                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 ">
                                            <span class="font-weight-bold">{{__('names.client')}} :</span>
                                            <address>
                                                {{$o->client->name}}<br>
                                                {{$o->client->address}}<br>
                                                {{$o->client->phone_number}}<br>
                                            </address>
                                        </div>
                                        <div class="col-sm-4 ">
{{--                                            <span class="font-weight-bold">De :</span>--}}
{{--                                            <address>--}}
{{--                                                {{config('settings.company_name')}}<br>--}}
{{--                                                {{config('settings.address')}}<br>--}}
{{--                                                {{config('settings.city')}}, {{config('settings.zip_code')}}<br>--}}
{{--                                                {{config('settings.phone_1')}}<br>--}}
{{--                                                {{config('settings.contact_email')}}--}}
{{--                                            </address>--}}
                                        </div>
                                        <!-- /.col -->

                                        <!-- /.col -->
                                        <div class="col-sm-4 ">
                                            <b>{{__('names.created_at')}} :</b> {{$o->created_at->format('d/m/Y')}}<br>
                                            <b>{{__('names.due_date')}} :</b> {{$o->due_date->format('d/m/Y')}}<br>
                                            {{--                                        <b>Numéro de compte:</b> 968-34567--}}
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table">
                                                <thead class="bg-info">
                                                <tr>
                                                    <th>{{__('names.product')}}</th>
                                                    <th>{{__('names.qty')}}</th>
                                                    <th>{{__('names.unit_price')}}</th>
                                                    <th>{{__('names.amount')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($o->products as $p)
                                                    <tr>
                                                        <td>{{$p['name']}}</td>
                                                        <td>{{$p['qty']}}</td>
                                                        <td>{{$p['price']}} {{config('settings.currency_code')}}</td>
                                                        <td>{{$p['price']}} {{config('settings.currency_code')}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <hr>

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
                                            @if($o->note)
                                                <p class="font-weight-bold mb-0">{{__('names.note')}} :</p>
                                                <p>
                                                    {{$o->note}}
                                                </p>
                                            @endif
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>{{__('names.paid')}} :</th>
                                                        <td>{{$o->paid}} {{config('settings.currency_code')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{__('names.amount')}} :</th>
                                                        <td>{{$o->amount}} {{config('settings.currency_code')}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
{{--                                    <div class="row no-print">--}}
{{--                                        <div class="col-12" id="app">--}}
{{--                                            <a href="{{route('estimates.print',$q->id)}}" target="_blank" class="btn btn-info"><i class="fas fa-print mr-2"></i>Imprimer</a>--}}
{{--                                            <send-mail-btn type='estimates' :id="{{$q->id}}"></send-mail-btn>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <!-- /.invoice -->
                                <hr>
                                <div class="text-right">
                                    <a href="{{route('orders.index')}}" type="button" rel="tooltip" class="btn btn-success info my-3">
                                        {{__('names.list',['name' => __('names.orders')])}}
                                    </a>
                                    <a href="{{route('orders.edit',$o->id)}}" class="btn btn-warning info my-3" style="width: 135px">
                                        {{__('actions.edit')}}
                                    </a>
                                    <a href="javascript:void(0)" onclick="deleteForm({{$o->id}})" class="btn btn-danger my-3" style="width: 135px">
                                        {{__('actions.delete')}}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </section>
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
            f.setAttribute('action',`/orders/${id}`);

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
