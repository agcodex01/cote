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
                    <a href="{{ route("courses.subjects.create", $course) }}" class="btn btn-primary">Add Subject</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 bg-transparent mt-5">
        <div class="card-header bg-white text-lg font-weight-bold text-primary shadow py-3 rounded">
            Subjects
        </div>
        <div class="card-body px-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($course->yearLevels->sortBy("name") as $yearLevel)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if ($loop->first) active @endif"
                            id="{{ $yearLevel->id }}-tab" data-bs-toggle="tab"
                            data-bs-target="#tabcontent{{ $yearLevel->id }}" type="button" role="tab"
                            aria-selected="true">
                            {{ $yearLevel->name }} Year
                        </button>
                    </li>
                @endforeach


            </ul>

            <div class="tab-content border border-top-0 bg-white" id="myTabContent">
                @foreach ($course->yearLevels->sortBy("name") as $yearLevel)
                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                        id="tabcontent{{ $yearLevel->id }}" role="tabpanel">
                        <div class="accordion p-3" id="accordionExample">
                            @foreach ($course->semesters->where("pivot.year_level_id", $yearLevel->id) as $semester)
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingOne">
                                        <button class="btn btn-link text-left" type="button" data-toggle="collapse"
                                            data-target="#semester{{ $semester->id }}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            {{ $semester->name }} Semester
                                        </button>
                                    </div>

                                    <div id="semester{{ $semester->id }}" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <th scope="col">Subject Teacher</th>
                                                    <th scope="col">Section</th>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Units</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Day</th>
                                                    <th scope="col">Room</th>
                                                    <th scope="col">Actions</th>
                                                </thead>
                                                <tbody>

                                                    @foreach ($course->subjects->where("pivot.year_level_id", $yearLevel->id)->where("pivot.semester_id", $semester->id) as $subject)
                                                        <tr>
                                                            <td> {{ $subject->pivot->teacher->user->getFullname() }}
                                                            </td>
                                                            <td> {{ $subject->pivot->section->name }}
                                                            </td>
                                                            <td>{{ $subject->code }} </td>
                                                            <td>{{ $subject->description }} </td>
                                                            <td>{{ $subject->units }} </td>
                                                            <td>{{ $subject->pivot->time_from->format("h:i a") . " - " . $subject->pivot->time_to->format("h:i a") }}
                                                            </td>
                                                            <td>{{ $subject->pivot->daysFormat }} </td>
                                                            <td>{{ $subject->pivot->section->room->name }} </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route("courses.subjects.destroy", [$course, $subject]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button class="btn btn-text">
                                                                        <i class="fa fa-trash text-danger"></i>
                                                                    </button>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push("modal")
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route("courses.subjects.store", $course) }}" method="POST">
                    @csrf
                    <div class="modal-header border-0">
                        <h5 class="modal-title font-weight-bold text-black" id="exampleModalLabel">Add Subject</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
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
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-between">
                        <button type="button" class="btn" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
