<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Task Name</th>
        <th>Teacher</th>
        <th>Create Time</th>
        <th>Upload Answer</th>
        </thead>
        <tbody>
        @foreach($tasks as $tasks)
            <tr>
                <td><a href="{{ route('downloadTask', $tasks->name)}}">{{ $tasks->name }}</a></td>
            <td>{{ $tasks->teacher_name }}</td>
            <td>{{ $tasks->created_at }}</td>
                    <td>
{{--                        {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}--}}
                    {!! Form::open() !!}
                    <div class='btn-group'>
                        <a href="{{route('submitSolution',$tasks->id)}}" class='btn btn-default btn-xs'><i class="fa fa-upload"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
