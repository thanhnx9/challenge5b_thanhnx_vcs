<!-- Username Field -->
<div class="form-group">
    {!! Form::label('userName', 'Username:') !!}
    <p>{{ $teachers->userName }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $teachers->name }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $teachers->phone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $teachers->email }}</p>
</div>

{{--<!-- Image Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('image', 'Image:') !!}--}}
{{--    <p>{{ $users->image }}</p>--}}
{{--</div>--}}

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ $teachers->role_id }}</p>
</div>

