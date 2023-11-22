@extends('layouts.auth')
@section('contents')

    <div class="container pt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action='{{ route('register.save') }}' class="user" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="first_name" class="form-control form-control-user @error('first_name') is-invalid @enderror"
                                            id="FirstName" placeholder="First Name">
                                        @error('first_name')
                                            <span class="text-danger invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                            id="LastName" placeholder="Last Name">
                                        @error('last_name')
                                            <span class="text-danger invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror "
                                        id="InputEmail" placeholder="Email Address">
                                    @error('email')
                                        <span class="text-danger invalid-feedback"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="InputPassword" placeholder="Password">
                                        @error('password')
                                            <span class='text-danger invalid-feedback'> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                            class="form-control form-control-user" id=""
                                            placeholder="Repeat Password">
                                        @error('password_confirmation')
                                            <span class="text-danger invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-info btn-user btn-block">Register Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-info" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   @endsection