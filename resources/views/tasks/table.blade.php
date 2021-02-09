<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Task Name</th>
        <th>Teacher</th>
        <th>Create Time</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($tasks as $tasks)
            <tr>
                <td>{{ $tasks->name }}</td>
            <td>{{ $tasks->teacher_name }}</td>
            <td>{{ $tasks->created_at }}</td>
                    <td>
{{--                        {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}--}}
                        <div class='btn-group'>
{{--                            <a href="{{ route('users.show', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
{{--                            @if(Auth::user()->role_id<3)--}}
{{--                            <a href="{{ route('users.edit', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
{{--                            @endif--}}
                        </div>
{{--                        {!! Form::close() !!}--}}
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
