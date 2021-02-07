<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Username</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
{{--        <th>Image</th>--}}
        <th>User Type</th>
                @if(Auth::user()->role_id<2)
                    <th colspan="3">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teachers)
            <tr>
                <td>{{ $teachers->userName }}</td>
            <td>{{ $teachers->name }}</td>
            <td>{{ $teachers->phone }}</td>
            <td>{{ $teachers->email }}</td>
{{--            <td>{{ $users->image }}</td>--}}
            <td>Teacher</td>
                @if(Auth::user()->role_id<2)
                    <td>
                        {!! Form::open(['route' => ['teachers.destroy', $teachers->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('teachers.show', [$teachers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('teachers.edit', [$teachers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
