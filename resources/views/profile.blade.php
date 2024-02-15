@extends("layouts.app")

@section("content")
    <div class="container">
        @if (session()->has("success"))
            <toast-notif message="{{ session()->get("success") }}"></toast-notif>
        @endif
        <div class="card mb-5">
            <div class="card-header bg-white text-primary font-weight-bold">
                Information
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="name"
                            value="{{ $user->getFullname() }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" readonly class="form-control-plaintext" id="email"
                            value="{{ $user->email }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="email" readonly class="form-control-plaintext" id="phone"
                            value="{{ $user->contact }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header bg-white text-primary font-weight-bold">
                Changed Password
            </div>
            <div class="card-body">
                <form action="{{ route("user.password.update", $user) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password"
                            class="form-control @error("current_password")
                            is-invalid
                        @enderror"
                            name="current_password" required>
                        @error("current_password")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password"
                            class="form-control @error("password")
                        is-invalid
                    @enderror"
                            name="password" required>
                        @error("password")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="current_password">Confirm New Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-outline-danger">Update Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
