@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="card border-0 bg-transparent">
            <form action="{{ route("teachers.update", $teacher) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-header bg-white rounded border d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route("teachers.index") }}" class="btn border-right mr-2"><i
                                class="fa fa-chevron-left"></i>
                            Back</a>
                        Update Teacher
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="card-body px-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white d-flex align-items-center py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="lname">Lastname</label>
                                                <input type="text"
                                                    class="form-control @error("lname")
                                                is-invalid
                                            @enderror"
                                                    id="lname" aria-describedby="lnameHelp" name="lname"
                                                    value="{{ old("lname") ?? $teacher->user->lname }}" required>
                                                @error("lname")
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="fname">Firstname</label>
                                                <input type="text"
                                                    class="form-control @error("fname")
                                                is-invalid
                                            @enderror"
                                                    id="fname" aria-describedby="fnameHelp" name="fname"
                                                    value="{{ old("fname") ?? $teacher->user->fname }}" required>
                                                @error("fname")
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="mname">Middlename</label>
                                                <input type="text"
                                                    class="form-control @error("mname")
                                                is-invalid
                                            @enderror"
                                                    id="mname" aria-describedby="mnameHelp" name="mname"
                                                    value="{{ old("mname") ?? $teacher->user->mname }}" required>
                                                @error("mname")
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="tel"
                                            class="form-control @error("contact")
                                    is-invalid
                                    @enderror"
                                            id="contact" aria-describedby="contactHelp" name="contact"
                                            value="{{ old("contact") ?? $teacher->user->contact }}" required>
                                        @error("contact")
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text"
                                            class="form-control @error("address")
                                    is-invalid
                                    @enderror"
                                            id="address" aria-describedby="addressHelp" name="address"
                                            value="{{ old("address") ?? $teacher->user->address }}" min="1"
                                            required>
                                        @error("address")
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white d-flex align-items-center py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Credential Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text"
                                            class="form-control @error("email")
                                    is-invalid
                                    @enderror"
                                            id="email" aria-describedby="emailHelp" name="email"
                                            value="{{ old("email") ?? $teacher->user->email }}" min="1" required>
                                        @error("email")
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <form action="{{ route("teachers.update", $teacher) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-header bg-white d-flex align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reset Teacher Password</h6>
                </div>
                <div class="card-body">
                    <button class="btn btn-info">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
