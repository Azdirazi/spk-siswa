@extends('layouts.app2')
@section('title', 'Login')
@section('content')
    <div class="container-fluid  d-flex justify-content-center align-items-center">
        <div class="mx-lg-3 mx-1 my-2 py-lg-3  col-lg-6 card rounded login  ">
            <div class="card-body py-0 px-1">
                <h4 class="text-center">Login</h4>

                <form class="" method="POST" action="">
                    <div class="d-flex  justify-content-center ">
                        <div class=" row">
                            <div class=" col-lg-12 mb-3 px-0 ">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control">

                            </div>
                            <div class="col-lg-12 mb-3 px-0">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password">
                            </div>
                            <button name="login" class="btn btn-primary col-lg-12 mb-2" type="submit">Login</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
