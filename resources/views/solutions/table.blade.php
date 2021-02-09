<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Task Name</th>
            <th>Solution Name</th>
            <th>Student Name</th>
            <th>Create Time</th>
        </thead>
        <tbody>
        @foreach($solutions as $solutions)
            <tr>
                <td>{{$solutions->task_name}}</td>
                <td><a href="{{ route('downloadSolution', $solutions->name)}}">{{ $solutions->name }}</a></td>
                <td>{{ $solutions->student_name }}</td>
                <td>{{ $solutions->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
