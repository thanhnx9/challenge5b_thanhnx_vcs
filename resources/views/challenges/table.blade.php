<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Challenge Name</th>
            <th>Suggest</th>
            <th>Create Time</th>
            <th colspan="3">Unlock</th>
        </tr>
        </thead>
        <tbody>
        @foreach($challenges as $challenges)
            <tr>
                <td>{{ $challenges->name }}</td>
                <td>{{ $challenges->suggest }}</td>
                <td>{{ $challenges->created_at}}</td>
                <td>
                        <div class='btn-group'>
                            <a  data-toggle="modal" data-target="#role-and-modal" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px"><i class="fa fa-lock"></i></a>
{{--                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                            <form action="{{route('checkAnswer', $challenges->filename)}}" name="checkAnswer" method="post">
                                @csrf
                                @include('challenges.unlock_fields')
                            </form>
                        </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
