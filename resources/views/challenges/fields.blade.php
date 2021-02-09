<div class="form-group">
    <label for="name">Challenge Name</label>
    <input type="text" class="form-control" name="name" style="width: 300px">
</div>
<div class="form-group">
    <label for="file">File attach</label>
    <input type="file" class="form-control-file" name="fileUpload" data-fouc>
</div>
<div class="form-group ">
    <label for="suggest">Decriptions</label>
    <br>
    <textarea class="w3-input w3-border" required="true" name="suggest" style="width:50%" rows="5" cols="50" placeholder="You can type the suggest here"></textarea>
</div>
<div class="form-group col-sm-6">
    <button type="submit" class="btn btn-primary">Create Challenge</button>
    <a href="{{redirect()->back()}}" class="btn btn-default">Cancel</a>
</div>
