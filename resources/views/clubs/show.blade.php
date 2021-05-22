@extends('layouts.app')

@push('css')

    <style>

        html {
            scroll-behavior: smooth;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('names.details')}}</h4>
                    <button class="btn btn-danger btn-sm" onclick="deleteForm('/clubs/'+{{$club->id}})"  rel="tooltip"  title="{{__('actions.delete')}}" data-original-title="{{__('actions.delete')}}">
                        <i class="material-icons">close</i>
                    </button>
                    <a class="btn btn-warning btn-sm" href="{{route('clubs.edit',$club->id)}}"  rel="tooltip"  title="{{__('actions.edit')}}" data-original-title="{{__('actions.edit')}}">
                        <i class="material-icons">edit</i>
                    </a>
                </div>
                <div class="card-body ">
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.f_name')}}</div>
                        <div class="col-md-6 border">{{$club->name}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.managing_office')}}</div>
                        <div class="col-md-6 border">{{$club->managing_office}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.establishing_date')}}</div>
                        <div class="col-md-6 border">{{$club->establishing_date->format('d-m-Y')}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.year')}}</div>
                        <div class="col-md-6 border">{{$club->year}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.address')}}</div>
                        <div class="col-md-6 border">{{$club->address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.goals')}}</div>
                        <div class="col-md-6 border">{{$club->address}}</div>
                    </div>
                    <div class="row " >
                        <div class="col-md-6 border">{{__('names.funding_sources')}}</div>
                        <div class="col-md-6 border">{{$club->address}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 border">{{__('names.created_at')}}</div>
                        <div class="col-md-6 border">{{$club->created_at->format('d/m/Y')}}</div>
                    </div>

                </div>
            </div>
        </div>
        @if(!request()->routeIs('clubs.show'))
            @yield('form-content')
        @else
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">
                                        dashboard
                                    </i>
                                </div>
                                <p class="card-category">{{__('names.projects')}}</p>
                                <h3 class="card-title">
                                    {{$club->projects->count()}}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                    <i class="material-icons text-danger">dashboard</i>
                                    <a href="#projects" >{{__('names.list',['name' => __('names.projects')])}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">
                                        article
                                    </i>
                                </div>
                                <p class="card-category">{{__('names.invoices')}}</p>
                                <h3 class="card-title">
                                    {{$club->invoices->count()}}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">
                                        article
                                    </i>
                                    <a href="#invoices" >{{__('names.list',['name' => __('names.invoices')])}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">
                                        rss_feed
                                    </i>
                                </div>
                                <p class="card-category">{{__('names.subs')}}</p>
                                <h3 class="card-title">
                                    {{$club->subscriptions->count()}}
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">
                                        rss_feed
                                    </i>
                                    <a href="#subs" >{{__('names.list',['name' => __('names.subs')])}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('clubs.invoices.index')
            @include('clubs.projects.index')
            @include('clubs.subs.index')
        @endif

    </div>
@endsection

@push('js')

    <script>
        // const scrollToAnchor = anchor => {
        //     setTimeout(() => {
        //         let el =  document.querySelector('#'+anchor);
        //         let pos = el.style.position;
        //         let top = el.style.top;
        //         el.style.position = 'relative';
        //         el.style.top = '-20px';
        //         el.scrollIntoView({behavior: 'smooth', block: 'start'});
        //         el.style.top = top;
        //         el.style.position = pos;
        //
        //     },1000)
        // }
        const deleteForm = route => {
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
                    createForm(route).submit();
                }
            });
        }
        const createForm = route => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',route);

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
