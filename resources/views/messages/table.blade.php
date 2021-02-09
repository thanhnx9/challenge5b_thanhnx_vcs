<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Messege</th>
            <th>Time Sent</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $messages)
            <tr>
                <td>{{ $messages->sender }}</td>
                <td>{{ $messages->receiver }}</td>
                <td>{{ $messages->message }}</td>
                <td>{{ $messages->created_at}}</td>
                {{--            <td>{{ $users->image }}</td>--}}
                <td>
{{--                    {!! Form::open(['route' => ['deleteMessage', $messages->id], 'method' => 'get']) !!}--}}
                    <form action="{{route('deleteMessage', $messages->id)}}" name="send_messages" method="get">
                        <div class='btn-group'>
                            <a href="{{ route('editMessage', [$messages->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
{{--                    {!! Form::close() !!}--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
