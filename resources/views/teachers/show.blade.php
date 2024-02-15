@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="card border-0 bg-transparent">

            <div class="card-header bg-white rounded border d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route("teachers.index") }}" class="btn border-right mr-2"><i class="fa fa-chevron-left"></i>
                        Back</a>
                    {{ $teacher->user->getFullname() }} Details
                </div>
                <div>
                    <a href="{{ route("teachers.edit", $teacher) }}" class="btn btn-outline-info px-4">View Grade</a>
                    <a href="{{ route("teachers.edit", $teacher) }}" class="btn btn-outline-success px-4">View Schedule</a>
                    <a href="{{ route("teachers.edit", $teacher) }}" class="btn btn-primary px-4">Edit</a>
                </div>

            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white d-flex align-items-center py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="lname">Lastname</label>
                                            <input type="text" class="form-control-plaintext" id="lname"
                                                aria-describedby="lnameHelp" name="lname"
                                                value="{{ $teacher->user->lname }}" readonly>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="fname">Firstname</label>
                                            <input type="text" class="form-control-plaintext" id="fname"
                                                aria-describedby="fnameHelp" name="fname"
                                                value="{{ $teacher->user->fname }}" readonly>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="mname">Middlename</label>
                                            <input type="text" class="form-control-plaintext" id="mname"
                                                aria-describedby="mnameHelp" name="mname"
                                                value="{{ old("mname") ?? $teacher->user->mname }}" readonly>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="tel" class="form-control-plaintext" id="contact"
                                        aria-describedby="contactHelp" name="contact" value="{{ $teacher->user->contact }}"
                                        @readonly(true)>

                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control-plaintext" id="address"
                                        aria-describedby="addressHelp" name="address" value="{{ $teacher->user->address }}"
                                        min="1" @readonly(true)>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control-plaintext" id="email"
                                        aria-describedby="emailHelp" name="email" value="{{ $teacher->user->email }}"
                                        min="1" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card mt-5">
                            <div class="card-header bg-white d-flex align-items-center py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Subjects</h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th scope="col">Room</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Units</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Day</th>


                                    </thead>
                                    <tbody>

                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->section->room->name }} </td>
                                                <td> {{ $subject->section->name }}
                                                </td>
                                                <td>{{ $subject->subject->code }} </td>
                                                <td>{{ $subject->subject->description }} </td>
                                                <td>{{ $subject->subject->units }} </td>
                                                <td>{{ $subject->time_from->format("h:i a") . " - " . $subject->time_to->format("h:i a") }}
                                                </td>
                                                <td>{{ $subject->daysFormat }} </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
