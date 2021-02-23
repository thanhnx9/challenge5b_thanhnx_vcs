<!-- Students -->
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Students</span></a>
</li>

<!-- Teachers -->
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('teachers.index') }}"><i class="fa fa-user-circle"></i><span>Teachers</span></a>
</li>

<!-- Messages -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-envelope"></i>
        <span>Messages</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                 <a href="{{route('outbox')}}"><i class="fa fa-paper-plane"></i><span>Sent Messages</span></a>
            </li>
            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                 <a href="{{route('inbox')}}"><i class="fa fa-envelope-o"></i><span>Received Messages</span></a>
            </li>
        </ul>
</li>

<!-- Exams -->
<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{route('tasks')}}"><i class="fa fa-file"></i><span>Exams</span></a>
</li>

<!-- Solution -->
@if(Auth::user()->role_id<3)
<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{route('solutions')}}"><i class="fa fa-file-o"></i><span>Solution</span></a>
</li>
@endif

<!-- Challenges -->
<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{route('challenges')}}"><i class="fa fa-gamepad"></i><span>Challenges</span></a>
</li>


<!-- Roles -->
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
</li>
@endif
