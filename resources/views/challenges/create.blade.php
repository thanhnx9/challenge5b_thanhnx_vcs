@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="container" style="margin-left: 20px; margin-bottom: 15px">
                    <h1>Create Challenge</h1>
                    <form action="{{route('storeChallenge')}}" name="createChallenge" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('challenges.fields')
                        @if(Session::has('success'))
                            <br><p style="color: #5cb85c"><strong>{{Session::get('success')}}</strong></p>
                        @elseif(Session::has('error'))
                            <br><p style="color: #ff0000"><strong>{{Session::get('error')}}</strong></p>
                        @endif
                        <form>
                </div>
            </div>
        </div>
        <div class="text-center">
        </div>
    </div>
@endsection
