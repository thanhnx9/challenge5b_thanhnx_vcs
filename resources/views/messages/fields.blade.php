{{--<div class="container" style="margin-left: 20px; margin-bottom: 15px">--}}
{{--    <h1>Send message</h1>--}}
{{--       {!! Form::open(['route' => ['messages.store']]) !!}--}}
{{--    <form action="{{route('send_messages', $receiver_id)}}" name="send_messages" method="post">--}}
{{--        @csrf--}}
        <div class="w3-container">
            <textarea class="w3-input w3-border" required="true" name="message" style="width:50%" rows="5" cols="50" placeholder="Text here"></textarea>
        </div><br>
        <div>
            <button type="submit" class="btn btn-primary" name="send">Send</button>
            <a href="{{ redirect()->back() }}" class="btn btn-default">Back</a>
        </div>
{{--          {!! Form::close() !!}--}}
{{--    </form>--}}
{{--    @if(Session::has('success'))--}}
{{--        <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>--}}
{{--    @elseif(Session::has('error'))--}}
{{--        <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>--}}
{{--    @endif--}}
{{--</div>--}}
