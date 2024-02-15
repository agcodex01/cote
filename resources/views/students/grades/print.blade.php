@extends("layouts.print")
@section("content")
    <div class="card my-5">
        <div class="card-header h1 text-center bg-primary text-white font-weight-bold">
            STUDENT GRADE
        </div>
        <div class="card-body">
            <div class="row mt-3">
                <div class="col-4">
                    Course & Year: <strong>BSIT-II</strong>
                </div>
                <div class="col-4">
                    School Year: <strong>2021-2022</strong>
                </div>
                <div class="col-4">
                    Semester: <strong>1st</strong>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    Name: <strong>Gerald Afable</strong>
                </div>
                <div class="col-4">
                    Room & Section: <strong>RM 1 - Sec 1</strong>
                </div>
                <div class="col-4">
                    Adviser: <strong>Jocelyn</strong>
                </div>
            </div>
            <table class="table mt-5">
                <thead>
                    <th scope="col">Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Mid</th>
                    <th scope="col">Final</th>
                    <th scope="col">Ave</th>
                    <th scope="col">Remarks</th>
                </thead>
                <tbody>
                    @foreach ($student->grades->where("year_level_id", $yearLevelId)->where("semester_id", $semesterId) as $grade)
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
@endsection
@push("scripts")
    <script>
        $(document).ready(function() {
            // window.print()
        });
    </script>
@endpush
