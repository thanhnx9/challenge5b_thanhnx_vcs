<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Sender</th>
            <th>Messege</th>
            <th>Time Received</th>
        </tr>
        </thead>
        <tbody>
        @foreach($receivedmessages as $receivedmessages)
            <tr>
                <td>{{ $receivedmessages->sender }}</td>
                <td>{{ $receivedmessages->message }}</td>
                <td>{{ $receivedmessages->created_at}}</td>
       
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
