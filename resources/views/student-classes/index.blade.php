@extends("layouts.app")
@section("content")
    <div class="container-fluid pt-5 pb-3 mb-5 bg-white">
        @if (session()->has("success"))
            <toast-notif message="{{ session()->get("success") }}"></toast-notif>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <x-search-input placeholder="Search studentClass..." index-route="student-classes.index" :hasFilter="false" />

            <div>
                <button data-toggle="modal" data-target="#add" class="btn btn-primary">Add Student Class </button>
            </div>

        </div>
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Section</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!$studentClasses->isEmpty())
                    @foreach ($studentClasses as $studentClass)
                        <tr>
                            <td>{{ $studentClass->student->user->getFullname() }} </td>
                            <td>{{ $studentClass->course->code }} - {{ $studentClass->yearLevel->name }}</td>
                            <td>{{ $studentClass->section->name }} - {{ $studentClass->section->room->name }} </td>
                            <td>
                                <button class="btn btn-text btn-edit" data-toggle="modal" data-target="#edit"
                                    data-name="{{ $studentClass->name }}" data-id="{{ $studentClass->id }}">
                                    <i class="fa fa-edit text-primary"></i>
                                </button>
                                <button class="btn btn-text btn-delete" data-toggle="modal" data-target="#deleteModal"
                                    data-id="{{ $studentClass->id }}">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            @if (count(Request::query()) > 0)
                                <x-empty-list index-route="studentClasses.index" />
                            @else
                                <div class="text-center py-5">
                                    <h6 class="font-weight-bold"> studentClasss is Empty!</h6>
                                    <img width="200px" class="my-4 mx-auto d-block" src="{{ asset("img/products.svg") }}"
                                        alt="">
                                    <p>Currently no studentClass Added.</p>
                                    <button data-toggle="modal" data-target="#add"
                                        class="btn btn-sm btn-outline-primary">Add
                                        ONE</button>
                                </div>
                            @endif
                        </td>

                    </tr>
                @endif
            </tbody>

        </table>
        <x-pagination-footer :collection="$studentClasses" />
    </div>
@endsection
@push("modal")
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title font-weight-bold text-black" id="exampleModalLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4 text-center">
                    <div class="rounded-circle pt-3 mx-auto mb-2 h3">
                        <i class="fa fa-trash text-danger"></i>
                    </div>
                    <p>Are you sure to delete this studentClass? This proccess cannot be undo.</p>
                </div>
                <div class="modal-footer border-0">
                    <form id="delete-form" class="w-100 d-flex justify-content-between"
                        action="{{ route("student-classes.destroy", "") }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="button" class="btn" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route("student-classes.store") }}" method="POST">
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
                            <label for="course_id">Course</label>
                            <select class="form-control dropdown" id="course_id" name="course_id"
                                placeholder="Select course">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"> {{ $course->code }}</option>
                                @endforeach
                            </select>
                            @error("course_id")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control dropdown" id="section_id" name="section_id"
                                placeholder="Select course">
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
                        <div class="form-group">
                            <label for="student_id">Student</label>
                            <select class="form-control dropdown" id="student_id" name="student_id"
                                placeholder="Select course">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"> {{ $student->user->getFullname() }}</option>
                                @endforeach
                            </select>
                            @error("student_id")
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

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editform" action="{{ route("student-classes.update", "") }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-header border-0">
                        <h5 class="modal-title font-weight-bold text-black" id="exampleModalLabel">Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name_edit" name="name"
                                placeholder="Enter studentClass name">

                            @error("name")
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
@push("scripts")
    <script>
        $('.btn-delete').on('click', function() {
            $('#delete-form').attr('action', $('#delete-form').attr('action') + '/' + $(this).data('id'))
        })
        $('.btn-edit').on('click', function() {
            $('#editform').attr('action', $('#editform').attr('action') + '/' + $(this).data('id'))
            $('#name_edit').val($(this).data('name'))

        })
    </script>
@endpush
