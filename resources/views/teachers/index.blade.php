@extends("layouts.app")
@section("content")
    <div class="container-fluid pt-5 pb-3 mb-5 bg-white">
        @if (session()->has("success"))
            <toast-notif message="{{ session()->get("success") }}"></toast-notif>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <x-search-input placeholder="Search teacher..." index-route="teachers.index" :hasFilter="false" />

            <div>
                <a href="{{ route("teachers.create") }}" class="btn btn-primary">Add
                    Teacher </a>
            </div>

        </div>
        <table class="table rounded border">
            <thead>
                <tr>
                    <th scope="col">Fullname</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Advisory</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @if (!$teachers->isEmpty())
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->user->getFullName() }} </td>
                            <td>{{ $teacher->user->contact }} </td>
                            <td>{{ $teacher->user->address }} </td>
                            <td>{{ $teacher->user->email }} </td>
                            <td>{{ $teacher->advisory->name ?? "No advisory" }} </td>
                            <td>
                                <a href="{{ route("teachers.show", $teacher) }}" class="btn btn-text btn-edit"> <i
                                        class="fa fa-eye text-info"></i>
                                </a>
                                <a href="{{ route("teachers.edit", $teacher) }}" class="btn btn-text btn-edit"> <i
                                        class="fa fa-edit text-primary"></i>
                                </a>
                                <button class="btn btn-text btn-delete" data-toggle="modal" data-target="#deleteModal"
                                    data-id="{{ $teacher->id }}">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            @if (count(Request::query()) > 0)
                                <x-empty-list index-route="teachers.index" />
                            @else
                                <div class="text-center py-5">
                                    <h6 class="font-weight-bold"> Teachers is Empty!</h6>
                                    <img width="200px" class="my-4 mx-auto d-block" src="{{ asset("img/products.svg") }}"
                                        alt="">
                                    <p>Currently no Teacher Added.</p>
                                    <a href="{{ route("teachers.create") }}" class="btn btn-sm btn-outline-primary">Add
                                        ONE</a>
                                </div>
                            @endif
                        </td>

                    </tr>
                @endif
            </tbody>

        </table>
        <x-pagination-footer :collection="$teachers" />
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
                    <p>Are you sure to delete this teacher? This proccess cannot be undo.</p>
                </div>
                <div class="modal-footer border-0">
                    <form id="delete-form" class="w-100 d-flex justify-content-between"
                        action="{{ route("teachers.destroy", "") }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="button" class="btn" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
@push("scripts")
    <script>
        $('.btn-delete').on('click', function() {
            $('#delete-form').attr('action', $('#delete-form').attr('action') + '/' + $(this).data('id'))
        })
    </script>
@endpush
