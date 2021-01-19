<div class="form-group text-danger">
    @if(count($errors) > 0)
        <div class="form-group text-danger">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    @if(\Session::has('success'))
        <div class="form-group alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
</div>


<div class="container">
    <div class="row">
        <div class="col">

            <form method="post" enctype='multipart/form-data' action="{{ $action }}">
                @csrf
                @method($method)
                <div class="form-group">
                    <label>Názov</label>
                    <input name="title" type="text" class="form-control" required pattern="^[A-Z].*$" value="{{ old('title', @$model->title) }}">
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea name="text" class="form-control" required>{{ old('text', @$model->text) }}</textarea>
                </div>



                <div id="content">

                    <form method="POST" enctype="multipart/form-data">
                        <input class="button" type="file" name="filename" required>
                        <div class="uploadButton">
                            <input type="submit" name="upload" class="btn btn-primary" value="UPLOAD">

                        </div>
                    </form>
                </div>

            </form>









        </div>
    </div>
</div>
