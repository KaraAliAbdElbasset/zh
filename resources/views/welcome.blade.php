@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">face</i>
                    </div>
                    <p class="card-category">{{__('names.students')}}</p>
                    <h3 class="card-title">
                        {{$students_count}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">face</i>
                        <a href="{{route('students.index')}}">{{__('names.list',['name' => __('names.students')])}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">book</i>
                    </div>
                    <p class="card-category">{{__('names.teachers')}}</p>
                    <h3 class="card-title">{{$teachers_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">book</i>
                        <a href="{{route('teachers.index')}}">{{__('names.list',['name' => __('names.teachers')])}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">work</i>
                    </div>
                    <p class="card-category">{{__('names.sewing-workers')}}</p>
                    <h3 class="card-title">{{$sw_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">work</i>
                        <a href="{{route('sewing-workers.index')}}">{{__('names.list',['name' => __('names.sewing-workers')])}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <p class="card-category">{{__('names.sewing-clients')}}</p>
                    <h3 class="card-title">{{$sc_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">shopping_cart</i>
                        <a href="{{route('sewing-clients.index')}}">{{__('names.list',['name' => __('names.sewing-clients')])}}</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <p class="card-category">{{__('names.clubs')}}</p>
                    <h3 class="card-title">
                        {{$clubs_count}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">supervisor_account</i>
                        <a href="{{route('clubs.index')}}">{{__('names.list',['name' => __('names.clubs')])}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">fact_check</i>
                    </div>
                    <p class="card-category">{{__('names.general-statistics')}}</p>
                    <h3 class="card-title">{{$gs_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">fact_check</i>
                        <a href="{{route('general-statistics.index')}}">{{__('names.list',['name' => __('names.general-statistics')])}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">contact_page</i>
                    </div>
                    <p class="card-category">{{__('names.funerals')}}</p>
                    <h3 class="card-title">{{$f_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">contact_page</i>
                        <a href="{{route('funerals.index')}}">{{__('names.list',['name' => __('names.funerals')])}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

@endsection


@push('js')


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let ctx = document.getElementById('myChart').getContext('2d');
        let data = {!! json_encode($chart_data, JSON_THROW_ON_ERROR) !!};
        console.log(data)
        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1', '2', '3', '4', '5', '6','7','8','9','10','11','12'],
                datasets: [
                    {
                    label: '{{__('names.students')}}',
                    data: data.students,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                },
                    {
                    label: '{{__('names.teachers')}}',
                    data: data.teachers,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        // 'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                },
                    {
                    label: '{{__('names.clubs')}}',
                    data: data.clubs,
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                },
                    {
                    label: '{{__('names.funerals')}}',
                    data: data.funerals,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                },
                    {
                    label: '{{__('names.sewing-clients')}}',
                    data: data.sewing_clients,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                },
                    {
                    label: '{{__('names.sewing-workers')}}',
                    data: data.sewing_workers,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endpush
