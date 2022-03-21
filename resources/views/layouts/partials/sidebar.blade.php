<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <div class="logo">
        <a href="{{route('welcome')}}" class="simple-text logo-normal">
        المجمع الثقافي لزاوية الهمائسة
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{request()->routeIs('welcome') ? 'active' : ''}}">
                <a class="nav-link " href="{{route('welcome')}}">
                    <i class="material-icons">dashboard</i>
                    <p>{{__('names.home')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('users.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="material-icons">person</i>
                    <p>{{__('names.users')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('teachers.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('teachers.index')}}">
                    <i class="material-icons">book</i>
                    <p>{{__('names.teachers')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('students.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('students.index')}}">
                    <i class="material-icons">face</i>
                    <p>{{__('names.students')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('groups.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('groups.index')}}">
                    <i class="material-icons">face</i>
                    <p>{{__('names.groups')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('sewing-clients.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('sewing-clients.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <p>{{__('names.sewing-clients')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('sewing-workers.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('sewing-workers.index')}}">
                    <i class="material-icons">work</i>
                    <p>{{__('names.sewing-workers')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('orders.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('orders.index')}}">
                    <i class="material-icons">add_shopping_cart</i>
                    <p>{{__('names.orders')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('clubs.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('clubs.index')}}">
                    <i class="material-icons">supervisor_account</i>
                    <p>{{__('names.clubs')}}</p>
                </a>
            </li>

            <li class="nav-item  {{request()->routeIs('general-statistics.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('general-statistics.index')}}">
                    <i class="material-icons">fact_check</i>
                    <p>{{__('names.general-statistics')}}</p>
                </a>
            </li>


            <li class="nav-item  {{request()->routeIs('funerals.*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('funerals.index')}}">
                    <i class="material-icons">contact_page</i>
                    <p>{{__('names.funerals')}}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
