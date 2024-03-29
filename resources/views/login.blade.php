@extends('layouts.auth')

@section('content')
    <div class="card o-hidden border-0 shadow-lg" style="width: 500px; margin 0 auto;">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="p-5">
                        <div class="">
                            <h1 class="h1 text-gray-900 mb-4 font-weight-bold">Sign In.</h1>
                        </div>
                        <form class="user font-weight-bold" method="POST" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email"
                                    class="font-weight-bold form-control  @error('email') is-invalid @enderror form-control-user"
                                    id="email" value="{{ old('email') }}" aria-describedby="email" name="email"
                                    placeholder="Enter Email Address..." required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="font-weight-bold form-control  @error('password') is-invalid @enderror form-control-user"
                                    id="password" placeholder="Password" name="password" required
                                    autocomplete="current-password">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox small font-weight-bold">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck">Remember
                                        Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold mt-3">
                                Login <span class="fas fa-arrow-right ml-2"></span>
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
