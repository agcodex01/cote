@extends("layouts.app")
@section("content")
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-end">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                        {{ $course->code }}</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        {{ $course->description }}
                    </div>
                </div>
                <div class="col-auto">
                    SY: 2021-2023
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5 shadow h-100 py-2">
        <div class="card-body">
            <div class="h5 font-weight-bold text-primary mb-5">
                Year & Semester
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="year_level_id" class="col-sm-2 col-form-label">Year Level:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="year_level_id">
                                @foreach ($yearLevels as $yearLevel)
                                    <option value="{{ $yearLevel->id }}">{{ $yearLevel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="semester_id" class="col-sm-2 col-form-label">Semester:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="semester_id">
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5 shadow h-100 py-2">
        <div class="card-body">
            <div class="h5 font-weight-bold text-primary mb-5">
                Student List </div>
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center">

                    <input type="search" class="form-control" />

                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="font-weight-bold px-3 py-2">
                        Filters:
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Not Enrolled</label>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
