<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('names.list',['name' => __('names.projects')])}}</h4>
            <a class="btn btn-info btn-sm" href="{{route('clubs.projects.create',$club->id)}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
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
                        <th>{{__('names.amount')}}</th>
                        <th>{{__('names.start_date')}}</th>
                        <th>{{__('names.end_date')}}</th>
                        <th>{{__('names.created_at')}}</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($club->projects as $key => $p)
                        <tr>
                            <td class="text-center">{{$key + 1}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->amount}}</td>
                            <td>{{$p->start_date ? $p->start_date->format('d/m/Y') : ''}}</td>
                            <td>{{$p->end_date ? $p->end_date->format('d/m/Y') : ''}}</td>
                            <td>{{$p->created_at->format('d/m/Y')}}</td>
                            <td class="td-actions text-right">
                                <button onclick="window.location='{{route('clubs.projects.edit',[$club->id,$p->id])}}'" type="button" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button onclick="deleteForm('/clubs/'+{{$club->id}}+'/projects/'+{{$p->id}})" type="button" rel="tooltip" class="btn btn-danger">
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
