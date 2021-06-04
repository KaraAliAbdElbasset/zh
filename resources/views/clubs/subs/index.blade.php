<div class="col-md-12">
    <div class="card" id="subs">
        <div class="card-header">
            <h4 class="card-title">{{__('names.list',['name' => __('names.subs')])}}</h4>
            <a class="btn btn-info btn-sm" href="{{route('clubs.subs.create',$club->id)}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
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
                        <th>{{__('names.note')}}</th>
                        <th>{{__('names.created_at')}}</th>
                        <th class="text-right">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($club->subscriptions as $key => $s)
                        <tr>
                            <td class="text-center">{{$key + 1}}</td>
                            <td>{{$s->name}}</td>
                            <td>{{$s->amount}}</td>
                            <td>{{$s->note}}</td>
                            <td>{{$s->created_at->format('d/m/Y')}}</td>
                            <td class="td-actions text-right">
                                <button onclick="window.location='{{route('clubs.subs.edit',[$club->id,$s->id])}}'" type="button" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button onclick="deleteForm('/clubs/'+{{$club->id}}+'/subs/'+{{$s->id}})" type="button" rel="tooltip" class="btn btn-danger">
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
