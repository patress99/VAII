<div class="form-group text alert-danger">
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>


<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Full name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value=" {{ old('name', @$model->name) }}">
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ @$model->email }}">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="">
    </div>
    <div class="form-group">
        <label for="password">Password again</label>
        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm password" value="">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>


</form>
