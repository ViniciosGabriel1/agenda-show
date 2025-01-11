@extends('layouts.auth')

@section('body-class','register-page')

@section('content')

<div class="register-box">
    <div class="register-logo">
        <a href="../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.register-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Register a new membership</p>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full Name"     class="@error('name') is-invalid @enderror"
                    />
                    <div class="input-group-text"><span class="bi bi-person"></span></div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" />
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password-confirmation" />
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>
                <!--begin::Row-->
                <div class="row">
                  
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
          
            <!-- /.social-auth-links -->
            <p class="mb-0">
                <a href="login.html" class="text-center"> I already have a membership </a>
            </p>
        </div>
    </div>
</div>
@endsection