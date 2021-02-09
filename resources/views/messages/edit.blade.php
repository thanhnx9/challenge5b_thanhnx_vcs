@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="container" style="margin-left: 20px; margin-bottom: 15px">
                    <h1>Update message</h1>
                    {{--       {!! Form::open(['route' => ['messages.store']]) !!}--}}
                    <form action="{{route('updateMessage', $messages->id)}}" name="updateMessages" method="post">
                        @csrf
                            <div class="w3-container">
                                <textarea class="w3-input w3-border" required="true" name="message" style="width:50%" rows="5" cols="50" placeholder="{{$messages->message}}"></textarea>
                            </div><br>
                            <div>
                                <button type="submit" class="btn btn-primary" name="send">Send</button>
                                <a href="{{ redirect()->back() }}" class="btn btn-default">Back</a>
                            </div>
                        @if(Session::has('success'))
                            <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
                        @elseif(Session::has('error'))
                            <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="text-center">
        </div>
    </div>
@endsection

