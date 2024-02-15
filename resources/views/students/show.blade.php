@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="card border-0 bg-transparent">

            <div class="card-header bg-white rounded border d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route("students.index") }}" class="btn border-right mr-2"><i class="fa fa-chevron-left"></i>
                        Back</a>
                    {{ $student->user->getFullname() }} Details
                </div>
                <div>
                    <a href="{{ route("students.edit", $student) }}" class="btn btn-outline-info px-4">View Grade</a>
                    <a href="{{ route("students.edit", $student) }}" class="btn btn-outline-success px-4">View Schedule</a>
                    <a href="{{ route("students.edit", $student) }}" class="btn btn-primary px-4">Edit</a>
                </div>

            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white d-flex align-items-center py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_number">ID Number</label>
                                    <input type="text" class="form-control-plaintext" id="id_number"
                                        aria-describedby="id_numberHelp" name="id_number" value="{{ $student->id_number }}"
                                        min="1" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="lname">Lastname</label>
                                            <input type="text" class="form-control-plaintext" id="lname"
                                                aria-describedby="lnameHelp" name="lname"
                                                value="{{ $student->user->lname }}" readonly>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="fname">Firstname</label>
                                            <input type="text" class="form-control-plaintext" id="fname"
                                                aria-describedby="fnameHelp" name="fname"
                                                value="{{ $student->user->fname }}" readonly>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="mname">Middlename</label>
                                            <input type="text" class="form-control-plaintext" id="mname"
                                                aria-describedby="mnameHelp" name="mname"
                                                value="{{ old("mname") ?? $student->user->mname }}" readonly>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="tel" class="form-control-plaintext" id="contact"
                                        aria-describedby="contactHelp" name="contact" value="{{ $student->user->contact }}"
                                        @readonly(true)>

                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control-plaintext" id="address"
                                        aria-describedby="addressHelp" name="address" value="{{ $student->user->address }}"
                                        min="1" @readonly(true)>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"
                                        class="form-control-plaintext"
                                        id="email" aria-describedby="emailHelp" name="email"
                                        value="{{ $student->user->email }}" min="1" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
