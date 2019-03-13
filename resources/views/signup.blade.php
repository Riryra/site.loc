@extends ('Layout.main')

@section ('content')

	 <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <form method="post" action="">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="username">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword2">Repeat password</label>
                        <input name="password2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@stop