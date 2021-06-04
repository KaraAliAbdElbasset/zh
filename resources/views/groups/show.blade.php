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
                    <button class="btn btn-danger btn-sm" onclick="deleteForm({{$group->id}})"  rel="tooltip"  title="{{__('actions.delete')}}" data-original-title="{{__('actions.delete')}}">
                        <i class="material-icons">close</i>
                    </button>

                    <a class="btn btn-warning btn-sm" href="{{route('groups.edit',$group->id)}}"  rel="tooltip"  title="{{__('actions.edit')}}" data-original-title="{{__('actions.edit')}}">
                        <i class="material-icons">edit</i>
                    </a>

                    <a class="btn btn-info btn-sm" href="{{route('groups.teachers.absences.create',$group->id)}}"  rel="tooltip"  title="{{__('names.add-absence-to-teacher')}}" data-original-title="{{__('names.add-absence-to-teacher')}}">
                        <i class="material-icons">add</i>
                    </a>
                </div>
                <div class="card-body ">
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.f_name')}}</div>
                        <div class="col-md-6 border">{{$group->name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.teacher')}}</div>
                        <div class="col-md-6 border">{{$group->teacher->name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.type')}}</div>
                        <div class="col-md-6 border">{{__('student.'.$group->type)}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.study_place')}}</div>
                        <div class="col-md-6 border">{{$group->study_place}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.created_at')}}</div>
                        <div class="col-md-6 border">{{$group->created_at->format('d/m/Y')}}</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8" id="app">
            @if(request()->routeIs('groups.show'))
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('names.list',['name' => __('names.students')])}}</h4>

                        <a class="btn btn-info btn-sm" href="{{route('groups.add.students',$group->id)}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
                            <i class="material-icons">add</i>
                        </a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>{{__('names.f_name')}}</th>
                                    <th>{{__('names.l_name')}}</th>
                                    <th>{{__('names.gender')}}</th>
                                    <th>{{__('names.phone_number')}}</th>
                                    <th class="text-right">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($group->students as $key => $s)
                                    <tr>
                                        <td class="text-center">{{$key + 1}}</td>
                                        <td>{{$s->first_name}}</td>
                                        <td>{{$s->last_name}}</td>
                                        <td>{{__('names.'.$s->gender)}}</td>
                                        <td>{{$s->phone_number}}</td>
                                        <td class="td-actions text-right">
                                            <button type="button" onclick="window.location='{{route('groups.students.absences.create',[$group->id,$s->id])}}'" rel="tooltip" title="{{__('names.add-absence-to-student')}}" data-original-title="{{__('names.add-absence-to-student')}}" class="btn btn-info">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <button type="button" onclick="window.location='{{route('students.show',$s->id)}}'" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">info</i>
                                            </button>

                                            <button onclick="deleteStudentForm({{$group->id}},{{$s->id}})" type="button" rel="tooltip" class="btn btn-danger">
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
            @else
                @yield('group-content')
            @endif
        </div>

        <div class="col-md-8" id="app">
            @if(request()->routeIs('groups.show'))
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('names.list',['name' => __('names.absences')])}}</h4>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>{{__('names.f_name')}}</th>
                                    <th>{{__('names.l_name')}}</th>
                                    <th>{{__('names.ab-type')}}</th>
                                    <th>{{__('names.reason')}}</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($group->absences as $key => $a)
                                    <tr>
                                        <td class="text-center"> {{$key + 1}}</td>

                                        <td>{{$a->absenceable->first_name}}</td>
                                        <td>{{$a->absenceable->last_name}}</td>
                                        <td>{{$a->absenceable instanceof \App\Models\Student ? __('names.student') : __('names.teacher') }}</td>
                                        <td>{{$a->reason}}</td>

                                        <td class="td-actions text-right">

                                            <button type="button" onclick="window.location='{{route('absences.show',$a->id)}}'" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">info</i>
                                            </button>

                                            <button type="button" onclick="window.location='{{route('absences.edit',$a->id)}}'" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>
                                            </button>

                                            <button onclick="deleteAbsenceForm({{$a->id}})" type="button" rel="tooltip" class="btn btn-danger">
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

            @endif
        </div>

    </div>

@endsection

        @push('js')
            <script src="{{asset('assets/js/select2.min.js')}}"></script>
            <script>
                $(document).ready(function() {
                    $('.select-2').select2();
                });
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
                    f.setAttribute('action',`/groups/${id}`);

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

                const deleteStudentForm = (groupId,studentId) => {
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
                            createStudentForm(groupId,studentId).submit();
                        }
                    });
                }

                const deleteAbsenceForm = (id) => {
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
                            let f = document.createElement("form");
                            f.setAttribute('method',"post");
                            f.setAttribute('action',`/absences/${id}`);

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
                            f.submit();
                        }
                    });
                }
                const createStudentForm = (groupId,studentId) => {
                    let f = document.createElement("form");
                    f.setAttribute('method',"post");
                    f.setAttribute('action',`/groups/${groupId}/delete-student/${studentId}`);

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
