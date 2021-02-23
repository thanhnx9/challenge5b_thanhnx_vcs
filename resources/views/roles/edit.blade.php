@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <i class="fa fa-registered"> Roles </i>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roles, ['route' => ['roles.update', $roles->role_id], 'method' => 'patch']) !!}

                      <div class="form-group col-sm-6">
                            {!! Form::label('role_name', 'Role Name:') !!}
                            {!! Form::text('role_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        <br>        
                        <a href="{{ route('roles.index') }}" class="btn btn-warning">Cancel</a>
                        {!! Form::submit('Update role', ['class' => 'btn btn-info']) !!}
                      </div>

                

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection