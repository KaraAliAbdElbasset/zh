@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.list',['name' => __('names.teachers')])}}</h4>
                    <a class="btn btn-info btn-sm" href="{{route('teachers.create')}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
                        <i class="material-icons">add</i>
                    </a>
                    <form action="" id="filter-form">
                        @if(request()->has('search') && !empty(request()->get('search')))
                            <input type="hidden" name="search" value="{{request('search')}}">
                        @endif
                        <div class="d-flex justify-content-start row">

                            <div class="form-group col-md-2 select-filter"><select name="gender" id="select-filter" class="form-control">
                                    <option value="all" selected>{{__('names.all')}}</option>
                                    <option value="male" {{request('gender') === 'male' ? 'selected' : ''}}>{{__('names.male')}}</option>
                                    <option value="female" {{request('gender') === 'female' ? 'selected' : ''}}>{{__('names.female')}}</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
                        <form class="navbar-form">
                            @if(request()->has('gender') && !empty(request()->get('gender')))
                                <input type="hidden" name="gender" value="{{request('gender')}}">
                            @endif
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
                    <button type="button"  onclick="printTable()">
                        Print
                    </button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{__('names.f_name')}}</th>
                                <th>{{__('names.l_name')}}</th>
                                <th>{{__('names.gender')}}</th>
                                <th>{{__('names.phone_number')}}</th>
                                <th>{{__('names.created_at')}}</th>
                                <th class="text-right">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $key => $gs)
                                <tr>
                                    <td class="text-center">{{$key + 1}}</td>
                                    <td>{{$gs->first_name}}</td>
                                    <td>{{$gs->last_name}}</td>
                                    <td>{{__('names.'.$gs->gender)}}</td>
                                    <td>{{$gs->phone_number}}</td>
                                    <td>{{$gs->created_at->format('d/m/Y')}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" onclick="window.location='{{route('teachers.show',$gs->id)}}'" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">info</i>
                                        </button>
                                        <button onclick="window.location='{{route('teachers.edit',$gs->id)}}'" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button onclick="deleteForm({{$gs->id}})" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$teachers->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <script>
        let teachers = {!! $teachers->toJson() !!}

        function printTable()
        {
            var someJSONdata = teachers.data
            printJS({
                printable: someJSONdata,
                properties: [
                    { field: 'birth_date', displayName: '{{__('names.birth_date')}}'}
                    { field: 'first_name', displayName: '{{__('names.f_name')}}'},
                    { field: 'last_name', displayName: '{{__('names.l_name')}}'},
                ],
                table: '.table',
                type: 'json'
            })
        }


    </script>


    <script>
        let elements = document.getElementsByClassName('select-filter');
        Array.from(elements).forEach(e => {
            e.addEventListener('change',() => {
                document.getElementById('filter-form').submit()
            });
        })
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
            f.setAttribute('action',`/teachers/${id}`);

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
