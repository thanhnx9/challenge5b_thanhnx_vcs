<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Username</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
{{--        <th>Image</th>--}}
        <th>Role Id</th>
                @if(Auth::user()->role_id<3)
                    <th colspan="3">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($users as $users)
            <tr>
                <td>{{ $users->userName }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->phone }}</td>
            <td>{{ $users->email }}</td>
{{--            <td>{{ $users->image }}</td>--}}
            <td>{{ $users->role_id }}</td>
                @if(Auth::user()->role_id<3)
                    <td>
                        {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('users.show', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('users.edit', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
