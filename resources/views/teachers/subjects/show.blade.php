@extends("layouts.app")
@section("content")
    <div class="card mt-5">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route("teachers.subjects.index", $teacher) }}" class="btn border-right mr-2"><i class="fa fa-chevron-left"></i>
                    Back</a>
                <span class="text-primary font-weight-bold">{{ $courseSubject->section->room->name }} -
                    {{ $courseSubject->section->name }}</span>
            </div>

            <div>
                <span class="font-weight-bold mr-3"> Course & Year: </span> {{ $courseSubject->course->code }} -
                {{ $courseSubject->yearLevel->name }}
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route("grades.batch.update") }}" method="post">
                @csrf
                @method("PUT")
                <table class="table">
                    <thead>
                        <th scope="col">Student</th>
                        <th scope="col">Mid</th>
                        <th scope="col">Final</th>
                        <th scope="col">Ave</th>
                        <th scope="col">Remarks</th>
                    </thead>
                    <tbody>
                        @foreach ($grades as $index => $grade)
                            <tr>
                                <input type="hidden" name="grades[{{ $index }}][id]" value="{{ $grade->id }}">
                                <td>{{ $grade->student->user->getFullname() }} </td>
                                <td>
                                    <div class="form-group mb-0">
                                        <input type="number" name="grades[{{ $index }}][mid]" class="form-control"
                                            value="{{ $grade->mid }}" step="0.01" max="5" min="1">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mb-0">
                                        <input type="number" name="grades[{{ $index }}][final]"
                                            class="form-control" value="{{ $grade->final }}" step="0.01" max="5"
                                            min="1">
                                    </div>
                                </td>
                                <td>{{ $grade->average ?? "-" }}</td>
                                <td
                                    class="font-weight-bold @if ($grade->remarks == "Passed") text-success @elseif($grade->remarks == "Failed") text-danger @endif">
                                    {{ $grade->remarks ?? "-" }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
@endsection
