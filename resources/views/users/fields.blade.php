<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userName', 'Username:') !!}
    {!! Form::text('userName', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

{{--<!-- Image Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('image', 'Image:') !!}--}}
{{--    {!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<!-- Role Id Field -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('role_id', 'Role Id:') !!}--}}
{{--    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Set Password:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
