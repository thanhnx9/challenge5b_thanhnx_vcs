<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Students</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('teachers.index') }}"><i class="fa fa-user-circle"></i><span>Teachers</span></a>
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{route('outbox')}}"><i class="fa fa-envelope"></i><span>Messages</span></a>
</li>
<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{route('tasks')}}"><i class="fa fa-file"></i><span>Exams</span></a>
</li>
@if(Auth::user()->role_id<3)
<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{route('solutions')}}"><i class="fa fa-file-o"></i><span>Solution</span></a>
</li>
@endif
<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-gamepad"></i><span>Challenges</span></a>
</li>
@if(Auth::user()->role_id<2)
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
