@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Solution List</h1>
    </section>
    <br>
    <br>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('solutions.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

