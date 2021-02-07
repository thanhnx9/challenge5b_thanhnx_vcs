<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Students</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('teachers.index') }}"><i class="fa fa-user-circle"></i><span>Teachers</span></a>
</li>


@if(Auth::user()->role_id<3)
<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i>
        <span>Setting</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
            </li>
        </ul>
    </i>
</li>
@endif
