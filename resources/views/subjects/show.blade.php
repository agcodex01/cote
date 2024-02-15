@extends("layouts.app")
@section("content")
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-end">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                        {{ $subject->code }}</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        {{ $subject->description }}
                    </div>
                </div>
                <div class="col-auto">
                    <button data-toggle="modal" data-target="#add" class="btn btn-primary">Add Subject</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("modal")
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
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
                                placeholder="Enter subject year_level_id">
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
                                placeholder="Enter subject semester_id">
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
