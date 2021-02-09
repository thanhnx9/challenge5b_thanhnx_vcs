@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="container" style="margin-left: 20px; margin-bottom: 15px">
                    <h1>Congratulation!!! This is key....</h1>
                    {{--       {!! Form::open(['route' => ['messages.store']]) !!}--}}
                    <form  name="content">
                        @csrf
                       {{$content}}
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="{{route('challenges')}}" type="button" class="btn btn-warning" data-dismiss="modal" >Cancel</a>
                </div>
            </div>
        </div>
        <div class="text-center">
        </div>
    </div>
@endsection

