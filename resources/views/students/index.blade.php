@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.list',['name' => __('names.students')])}}</h4>
                    <a class="btn btn-info btn-sm" href="{{route('students.create')}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
                        <i class="material-icons">add</i>
                    </a>
                    <form action="" id="filter-form">
                        @if(request()->has('search') && !empty(request()->get('search')))
                            <input type="hidden" name="search" value="{{request('search')}}">
                        @endif
                        <div class="d-flex justify-content-start row">
                            <div class="form-group col-md-2 select-filter">
                                <select name="gender"  id="select-filter" class="form-control">
                                    <option value="all" selected>فلتر حسب الجنس</option>
                                    <option value="male" {{request('gender') === 'male' ? 'selected' : ''}}>{{__('names.male')}}</option>
                                    <option value="female" {{request('gender') === 'female' ? 'selected' : ''}}>{{__('names.female')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 select-filter">
                                <select name="type" id="select-type" class="form-control select-filter">
                                    <option value="all" selected>فيلتر حسب النوع</option>
                                    @foreach(config('student.types') as $t)
                                        <option value="{{$t}}"{{request('type') == $t ? 'selected': ''}}>{{__('student.'.$t)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2 select-filter">
                                <select name="group" id="select-type" class="form-control select-filter">
                                    <option value="all" selected>فيلتر حسب الفوج</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}"{{request('group') == $group->id ? 'selected': ''}}>{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2 select-filter">
                                <select name="sort"  id="select-honor_rate" class="form-control">
                                    <option value="all" selected>فيلتر حسب المعدل</option>
                                    <option value="honor_rate" {{request('sort') === 'honor_rate' ? 'selected' : ''}}>{{__('names.honor_rate')}}</option>
                                </select>
                            </div>
                            @if(request()->get('type') === '1')

                                <div class="form-group col-md-3 select-filter">
                                    <select  class="form-control select-filter" name="memorizing_level" data-style="btn btn-link" id="memorizing_level">
                                        <option selected disabled>{{__('names.memorizing_level')}}  ({{__('names.number_of_parties')}})</option>
                                        <option value="all">{{__('names.all')}}</option>
                                        @for($i = 0 ; $i <= 60 ; $i++)

                                            <option value="{{$i}}"{{request('memorizing_level') == $i ? 'selected': ''}} >
                                                {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            @endif
                        </div>

                    </form>
                    <div class="d-flex justify-content-end">
                        <form class="navbar-form">
                            @if(request()->has('type') && !empty(request()->get('type')))
                                <input type="hidden" name="type" value="{{request('type')}}">
                                @if(request()->get('type') === '1')
                                    <input type="hidden" name="memorizing_level" value="{{request('memorizing_level')}}">
                                @endif
                            @endif

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
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{__('names.f_name')}}</th>
                                <th>{{__('names.l_name')}}</th>
                                <th>{{__('names.gender')}}</th>
                                <th>{{__('names.phone_number')}}</th>
                                <th>{{__('names.father_name')}}</th>
                                <th>{{__('names.honor_rate')}}</th>
                                <th>{{__('names.type')}}</th>
                                <th>{{__('names.birth_date')}}</th>
                                <th class="text-right">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $key => $s)
                                <tr>
                                    <td class="text-center">{{$key + 1}}</td>
                                    <td>{{$s->first_name}}</td>
                                    <td>{{$s->last_name}}</td>
                                    <td>{{__('names.'.$s->gender)}}</td>
                                    <td>{{$s->phone_number}}</td>
                                    <td>{{$s->father_name}}</td>
                                    <td>{{$s->honor_rate ?? '/'}}</td>
                                    <td>{{__('student.'.$s->type) }}</td>
                                    <td>{{$s->birth_date->format('d/m/Y')}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" onclick="window.location='{{route('students.show',$s->id)}}'" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">info</i>
                                        </button>
                                        <button onclick="window.location='{{route('students.edit',$s->id)}}'" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button onclick="deleteForm({{$s->id}})" type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @if(isset($g) && $teacher = $g->teacher)
                                <tfoot>
                                <tr>
                                    <th class="text-center" ></th>
                                    <th colspan="">{{__('names.teacher')}} : </th>
                                    <th >{{$teacher->name}}</th>
                                    <th ></th>
                                    <th ></th>
                                    <th ></th>
                                    <th class=""></th>
                                    <th class=""></th>
                                    <th class=""></th>
                                    <th class=""></th>
                                </tr>
                                </tfoot>
                            @endif
                        </table>

                        <div class="d-flex justify-content-center">
                            {{$students->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

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
            f.setAttribute('action',`/students/${id}`);

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


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable( {
                paging: false,
                searching: false,
                info: false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        title:'<h1 class="text-center"> الجمهوريه الجزائريه الشعبيه الديمقراطيه</h1> ',
                        extend: 'print',
                        footer: true ,
                        text:'طباعه القائمه الاسميه',
                        message: `<h2 class="text-center"> الزاويه تيجانيه تماسين</h2>
                                  <h3 class="text-center"> المجمع الثقافي للزاويه التجانيه بالهمائسه</h3>
                                   @if(isset($g))
                        <h3 class="text-center">القائمه الاسميه لفوج {{$g->name}}   </h3>
                        @endif
`,
                        exportOptions: {
                            columns: [  1, 2 ,3, 5,8]
                        },
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'direction', 'rtl' );
                              //  .prepend(
                               //     '<img src="{{asset('assets/img/logo.jpeg')}}" style="position:absolute; top:0; left:0;" />'
                                //);

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    },
                    {
                        title:'<h1 class="text-center"> الجمهوريه الجزائريه الشعبيه الديمقراطيه</h1> ',
                        extend: 'print',
                        text:'طباعه القائمه مع المعدل',
                        message: `<h2 class="text-center"> الزاويه تيجانيه تماسين</h2>
                                  <h3 class="text-center"> المجمع الثقافي للزاويه التجانيه بالهمائسه</h3>
                                 `,
                        exportOptions: {
                            columns: [  1, 2 ,3, 5,6,8]
                        },
                        footer: true ,
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'direction', 'rtl' );
                            //  .prepend(
                            //     '<img src="{{asset('assets/img/logo.jpeg')}}" style="position:absolute; top:0; left:0;" />'
                            //);

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    }
                ]
            } );
            $('.buttons-print').each(function() {
                $(this).removeClass('btn-default').addClass('btn btn-primary')
            })
        } );

    </script>
@endpush
