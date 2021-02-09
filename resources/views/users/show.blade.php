@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-warning" onclick="window.location='{{ url("messages/"."{$users->id}") }}'"> Send Message</button>
{{--                    <a href="{{url('messages/create/'.'$users->id'}}" class="btn btn-default">Send message</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
