<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('names.list',['name' => __('names.invoices')])}}</h4>
            <a class="btn btn-info btn-sm" href="{{route('clubs.invoices.create',$club->id)}}"  rel="tooltip"  title="{{__('actions.create')}}" data-original-title="{{__('actions.create')}}">
                <i class="material-icons">add</i>
            </a>
        </div>

        <div class="card-body" >
            <div class="table-responsive">
                <table class="table" id="invoices">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>{{__('names.f_name')}}</th>
                        <th>{{__('names.amount')}}</th>
                        <th>{{__('names.date')}}</th>
                        <th>{{__('names.created_at')}}</th>
                        <th class="text-right">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($club->invoices as $key => $i)
                        <tr>
                            <td class="text-center">{{$key + 1}}</td>
                            <td>{{$i->name}}</td>
                            <td>{{$i->amount}}</td>
                            <td>{{$i->date ? $i->date->format('d/m/Y') : ''}}</td>
                            <td>{{$i->created_at->format('d/m/Y')}}</td>
                            <td class="td-actions text-right">
                                <button onclick="window.location='{{route('clubs.invoices.edit',[$club->id,$i->id])}}'" type="button" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button onclick="deleteForm('/clubs/'+{{$club->id}}+'/invoices/'+{{$i->id}})" type="button" rel="tooltip" class="btn btn-danger">
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
