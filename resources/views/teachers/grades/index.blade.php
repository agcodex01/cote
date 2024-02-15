@extends("layouts.app")
@section("content")
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-end">
                <div class="col mr-2">
                    <div class="text-md text-gray-800  text-uppercase mb-3 font-weight-bold">
                        {{ $teacher->user->getFullname() }}
                    </div>
                    <div class="h6 mb-0 text-gray-800">
                        <span class="font-weight-bold">Advisory:</span>
                        {{ $teacher->advisory?->room->name }} - {{ $teacher->advisory?->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header bg-white text-primary text-lg font-weight-bold">
            Courses & Subjects
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th scope="col">Course</th>
                    <th scope="col">Section</th>
                    <th scope="col">Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Units</th>
                    <th scope="col">Time</th>
                    <th scope="col">Day</th>
                </thead>
                <tbody>

                    @foreach ($teacher->subjects as $subject)
                        <tr>
                            <td>{{ $subject->course->code }} - {{ $subject->yearLevel->name }}</td>
                            <td>{{ $subject->section->room->name }} - {{ $subject->section->name }}</td>
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
@endsection
