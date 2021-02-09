<div class="form-group col-sm-6">
    <label for="image">Avatar</label>
    <input type="file" class="form-control-file" name="image" accept="image/*" data-fouc>
</div>

<div class="form-group col-sm-6">
    <label for="userName">User Name</label>
    <input type="text" class="form-control" name="userName"  value="{{$users->userName}}" disabled>
</div>

<div class="form-group col-sm-6">
    <label for="name">Full Name</label>
    <input type="text" class="form-control" name="name"  value="{{$users->name}}" disabled>
</div>
<div class="form-group col-sm-6">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" name="phone"  value="{{$users->phone}}">
</div>
<div class="form-group col-sm-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email"  value="{{$users->email}}">
</div>
<div class="form-group col-sm-6">
    <label for="password">Password</label>
    <input type="text" class="form-control" name="password" >
</div>
<div class="form-group col-sm-6">
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('profile.index') }}" class="btn btn-default">Cancel</a>
</div>
