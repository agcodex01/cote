@extends("layouts.app")
@section("content")
    <div class="container-fluid pt-5 pb-3 mb-5 bg-white">
        @if (session()->has("success"))
            <toast-notif message="{{ session()->get("success") }}"></toast-notif>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <x-search-input placeholder="Search course..." index-route="courses.index" :hasFilter="false" />

            <div>
                <button data-toggle="modal" data-target="#add" class="btn btn-primary">Add Course </button>
            </div>

        </div>
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @if (!$courses->isEmpty())
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->code }} </td>
                            <td>{{ $course->description }} </td>
                            <td>
                                <a href="{{ route("courses.show", $course) }}" class="btn btn-text"
                                    >
                                    <i class="fa fa-eye text-info"></i>
                                </a>
                                <button class="btn btn-text btn-edit" data-toggle="modal" data-target="#edit"
                                    data-code="{{ $course->code }}" data-description="{{ $course->description }}"
                                    data-id="{{ $course->id }}">
                                    <i class="fa fa-edit text-primary"></i>
                                </button>
                                <button class="btn btn-text btn-delete" data-toggle="modal" data-target="#deleteModal"
                                    data-id="{{ $course->id }}">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            @if (count(Request::query()) > 0)
                                <x-empty-list index-route="courses.index" />
                            @else
                                <div class="text-center py-5">
                                    <h6 class="font-weight-bold"> Courses is Empty!</h6>
                                    <img width="200px" class="my-4 mx-auto d-block" src="{{ asset("img/products.svg") }}"
                                        alt="">
                                    <p>Currently no Course Added.</p>
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
        <x-pagination-footer :collection="$courses" />
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
                    <p>Are you sure to delete this course? This proccess cannot be undo.</p>
                </div>
                <div class="modal-footer border-0">
                    <form id="delete-form" class="w-100 d-flex justify-content-between"
                        action="{{ route("courses.destroy", "") }}" method="POST">
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
                <form action="{{ route("courses.store") }}" method="POST">
                    @csrf
                    <div class="modal-header border-0">
                        <h5 class="modal-title font-weight-bold text-black" id="exampleModalLabel">Create</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                placeholder="Enter course code">

                            @error("code")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter course code">

                            @error("description")
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
                <form id="editform" action="{{ route("courses.update", "") }}" method="POST">
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
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code_edit" name="code"
                                placeholder="Enter course code">

                            @error("code")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description_edit" name="description"
                                placeholder="Enter course code">

                            @error("description")
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
            $('#code_edit').val($(this).data('code'))
            $('#description_edit').val($(this).data('description'))

        })
    </script>
@endpush
