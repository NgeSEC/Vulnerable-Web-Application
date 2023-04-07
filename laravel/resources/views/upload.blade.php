<form method="post" action="/upload" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Choose file</label>
        <input type="file" class="form-control" id="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
@endif

