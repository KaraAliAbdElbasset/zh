@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.list',['name' => __('names.orders')])}}</h4>
                    <a class="btn btn-info btn-sm" href="{{route('orders.create')}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
                        <i class="material-icons">add</i>
                    </a>
                    <div class="d-flex justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="{{request('search')}}" name="search" class="form-control" placeholder="{{__('actions.search')}}...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{__('names.f_name')}}</th>
                                <th>{{__('names.phone_number')}}</th>
                                <th>{{__('names.amount')}}</th>
                                <th>{{__('names.due')}}</th>
                                <th>{{__('names.paid')}}</th>
                                <th>{{__('names.created_at')}}</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $o)
                                <tr>
                                    <td class="text-center">{{$key + 1}}</td>
                                    <td>{{$o->client->name}}</td>
                                    <td>{{$o->client->phone_number}}</td>
                                    <td>{{$o->amount}}</td>
                                    <td>{{$o->due_date->format('d-m-Y')}}</td>
                                    <td>{{$o->paid}}</td>
                                    <td>{{$o->created_at->format('d-m-Y')}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" onclick="window.location='{{route('orders.show',$o->id)}}'" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">info</i>
                                        </button>
                                        <button onclick="window.location='{{route('orders.edit',$o->id)}}'" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button onclick="deleteForm({{$o->id}})" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$orders->links()}}
                        </div>
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
