@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="card border-0 bg-transparent">
            <form action="{{ route("courses.subjects.store", $course) }}" method="POST">
                @csrf
                <div class="card-header bg-white rounded border d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route("courses.show", $course) }}" class="btn border-right mr-2"><i
                                class="fa fa-chevron-left"></i>
                            Back</a>
                        Add New Subject to {{ $course->code }}
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="card-body px-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white d-flex align-items-center py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Basic Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="year_level_id">Year Level</label>
                                        <select class="form-control dropdown" id="year_level_id" name="year_level_id"
                                            placeholder="Enter course year_level_id">
                                            @foreach ($yearLevels as $level)
                                                <option value="{{ $level->id }}"> {{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("year_level_id")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="semester_id">Semester</label>
                                        <select class="form-control dropdown" id="semester_id" name="semester_id"
                                            placeholder="Enter course semester_id">
                                            @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}"> {{ $semester->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("semester_id")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_id">Subject</label>
                                        <select type="text" class="form-control" id="subject_id" name="subject_id"
                                            placeholder="Enter course code">
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"> {{ $subject->code }}</option>
                                            @endforeach
                                        </select>

                                        @error("subject_id")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="section_id">Section</label>
                                        <select type="text" class="form-control" id="section_id" name="section_id"
                                            placeholder="Enter course code">
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}"> {{ $section->name }}</option>
                                            @endforeach
                                        </select>

                                        @error("section_id")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white d-flex align-items-center py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="teacher_id">Teacher</label>
                                        <select type="text" class="form-control" id="teacher_id" name="teacher_id"
                                            placeholder="Enter course code">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}"> {{ $teacher->user->getFullname() }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error("teacher_id")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="teacher_id">Time Slot</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control" id="time_from" name="time_from"
                                                    placeholder="Enter course code" />
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control" id="time_to" name="time_to"
                                                    placeholder="Enter course code" />
                                            </div>
                                        </div>

                                        @error("teacher_id")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <label for="teacher_id">Day Slot</label>
                                    <br>
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="monday" value="Mon" name="days[]">
                                        <label class="form-check-label" for="monday">Monday</label>
                                    </div>
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="tuesday" value="Tue"  name="days[]">
                                        <label class="form-check-label" for="tuesday">Tuesday</label>
                                    </div>
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="wednesday" value="Wed"  name="days[]">
                                        <label class="form-check-label" for="wednesday">Wednesday</label>
                                    </div>
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="thursday" value="Thu"  name="days[]">
                                        <label class="form-check-label" for="thursday">Thursday</label>
                                    </div>
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="friday" value="Fri"  name="days[]">
                                        <label class="form-check-label" for="friday">Friday</label>
                                    </div>
                                    <div class="form-group form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="saturday" value="Sat"  name="days[]">
                                        <label class="form-check-label" for="saturday">Saturday</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
