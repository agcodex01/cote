<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("dashboard") }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config("app.name") }}</div>
    </a>

    <hr class="sidebar-divider my-0">
    @role("admin")
        <li class="nav-item @if (Route::currentRouteName() === "dashboard") active @endif">
            <a class="nav-link" href="{{ route("dashboard") }}">
                <i class="fa fa-fw fa-list"></i>
                <span>Dashboard</span></a>
        </li>


        <li class="nav-item @if (Route::is("school-years.*")) active @endif">
            <a class="nav-link" href="{{ route("school-years.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>School Years</span></a>
        </li>
        <li class="nav-item @if (Route::is("year-levels.*")) active @endif">
            <a class="nav-link" href="{{ route("year-levels.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Year Levels</span></a>
        </li>
        <li class="nav-item @if (Route::is("semesters.*")) active @endif">
            <a class="nav-link" href="{{ route("semesters.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Semesters</span></a>
        </li>
        <li class="nav-item @if (Route::is("rooms.*")) active @endif">
            <a class="nav-link" href="{{ route("rooms.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Rooms</span></a>
        </li>
        <li class="nav-item @if (Route::is("sections.*")) active @endif">
            <a class="nav-link" href="{{ route("sections.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Sections</span></a>
        </li>
        <li class="nav-item @if (Route::is("subjects.*")) active @endif">
            <a class="nav-link" href="{{ route("subjects.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Subjects</span></a>
        </li>
        <li class="nav-item @if (Route::is("courses.*")) active @endif">
            <a class="nav-link" href="{{ route("courses.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Courses</span></a>
        </li>
        <li class="nav-item @if (Route::is("students.*")) active @endif">
            <a class="nav-link" href="{{ route("students.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Students</span></a>
        </li>
        <li class="nav-item @if (Route::is("student-classes.*")) active @endif">
            <a class="nav-link" href="{{ route("student-classes.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Student Classes</span></a>
        </li>

        <li class="nav-item @if (Route::is("teachers.*")) active @endif">
            <a class="nav-link" href="{{ route("teachers.index") }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Teachers</span></a>
        </li>
    @endrole
    @role("student")
        <li class="nav-item @if (Route::is("students.grades.index")) active @endif">
            <a class="nav-link" href="{{ route("students.grades.index", Auth::user()->student->id) }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>View Grade</span></a>
        </li>
    @endrole
    @role("teacher")
        <li class="nav-item @if (Route::is("teachers.subjects.*")) active @endif">
            <a class="nav-link" href="{{ route("teachers.subjects.index", Auth::user()->teacher->id) }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Manage Grades</span></a>
        </li>
    @endrole
</ul>
