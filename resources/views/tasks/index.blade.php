@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1 class="pull-left">Exam List</h1>
    <h1 class="pull-right">
    <form action="{{route('storeTask')}}" method="post" enctype="multipart/form-data">
    @csrf
        <br><input type="file" name="fileUpload" value="" style=" width: 200px">
        <br>
            <button type="submit" class="btn btn-primary pull-right" name="upload" style="margin-top: -10px;margin-bottom: 5px">Upload Task</button>

    </form>
    </h1>
</section>
<br>
<br>
<div class="content">
    <div class="clearfix"></div>

     @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            @include('tasks.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection

