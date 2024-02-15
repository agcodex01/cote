@extends("layouts.app")
@section("content")
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-end">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-3">
                        Course
                    </div>
                    <div class="text-md text-gray-800  text-uppercase mb-1">
                        <span class="font-weight-bold">Code:</span> {{ $studentClass?->course->code }}
                    </div>
                    <div class="h6 mb-0 text-gray-800">
                        <span class="font-weight-bold">Description:</span>
                        {{ $studentClass?->course->description }}
                    </div>
                </div>
                <div class="col-auto">

                </div>
            </div>
        </div>
    </div>
    @forelse ($student->classes as $class)
        <div class="card @if ($loop->first) mt-5 @else mt-3 @endif">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $class->yearLevel->name }} Year -
                    {{ $class->semester->name }} Semester</h6>
                <a href="{{ route("students.grades.print", ["student" => $student->id, "year_level_id" => $class->year_level_id, "semester_id" => $class->semester_id]) }}"
                    class="btn btn-primary">Print</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th scope="col">Code</th>
                        <th scope="col">Description</th>
                        <th scope="col">Mid</th>
                        <th scope="col">Final</th>
                        <th scope="col">Ave</th>
                        <th scope="col">Remarks</th>
                    </thead>
                    <tbody>
                        @foreach ($student->grades->where("year_level_id", $class->year_level_id)->where("semester_id", $class->semester_id) as $grade)
                            <tr>
                                <td>{{ $grade->subject->code }} </td>
                                <td>{{ $grade->subject->description }}</td>
                                <td>{{ $grade->mid ?? "-" }}</td>
                                <td>{{ $grade->final ?? "-" }}</td>
                                <td>{{ $grade->average ?? "-" }}</td>
                                <td>{{ $grade->remarks ?? "-" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="text-info text-center">You are not currently enrolled!</h1>
            </div>
        </div>
    @endforelse

@endsection
