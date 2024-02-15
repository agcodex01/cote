@extends("layouts.app")
@section("content")
    <x-page>
        <div class="h4 mb-3 font-weight-bold">SY: {{ $schoolYear?->from->format("Y") }} - {{ $schoolYear?->to->format("Y") }}
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $data["students"] }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Faculties</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data["teachers"] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Courses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $data["courses"] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book-open fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Subjects</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data["subjects"] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-address-book fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-page>
@endsection
