<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" type="x-icon" href="/img/logo.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "Laravel") }}</title>
    <link href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css"
        crossorigin="anonymous">
    <link href="{{ asset("css/app.css") }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset("css/sb-admin-2.css") }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset("css/bootstrap-select.min.css") }}" rel="stylesheet" crossorigin="anonymous">
    <style>
        html,
        body,
        button {
            font-size: 15px;
            font-weight: 500 !important;
        }

        label {
            font-weight: 700 !important;
        }

        td {
            max-width: 200px !important;
            vertical-align: middle !important;
        }

        .card .card-header[data-toggle="collapse"]::after {
            top: initial !important
        }

        .list {
            padding-left: 0;
            padding-right: 0;
        }

        .block {
            background: #fff;
            border-width: 0;
            border-radius: 0.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            margin-bottom: 1.5rem;
        }

        .list-row .list-item {
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.75rem 0.625rem;
        }

        .list-item {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
        }

        .w-48 {
            width: 48px !important;
            height: 48px !important;
        }

        .avatar {
            position: relative;
            line-height: 1;
            border-radius: 500px;
            white-space: nowrap;
            font-weight: 700;
            border-radius: 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            border-radius: 500px;
            box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15);
        }

        .h-1x {
            height: 1.25rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .text-sm {
            font-size: .825rem;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <header>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-4">
                        <a class="navbar-brand font-weight-bold" href="#">
                            <img src="/img/logo.png" width="40" height="40" class="d-inline-block align-center"
                                alt="">
                            <div class="d-inline-block align-center text-xl">
                                Cebu Technological University
                            </div>

                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">

                            </ul>
                            <a href="{{ route("auth.login") }}"
                                class="btn btn-outline-light my-2 my-sm-0 px-5">Login</a>
                        </div>
                    </nav>
                    <div class="card bg-dark" style="border-radius: 0">
                        <img class="card-img" src="/img/cote2.jpg" alt="Card image">
                        <div class="card-img-overlay mt-5 pt-5">
                            <div class="mt-5">
                                <div class="row">
                                    <div class="col-lg-6 bg-white px-5 py-3 rounded">
                                        <h1 class=" text-black">Online Grade Inquiry</h1>
                                        <p>An online grade inquiry system is a digital platform that enables secure
                                            retrieval of academic grades and information in educational institutions. It
                                            provides a centralized interface for students, and teachers, ensuring
                                            transparency and timely communication of progress.</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </header>


                <div class="container-fluid">
                    <main id="app">

                    </main>
                </div>

            </div>
            <footer class="sticky-footer bg-primary text-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;2023 All rights reserved | made by CTU STUDENTS</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="{{ asset("js/app.js") }}" crossorigin="anonymous"></script>
    <script src="{{ asset("vendor/jquery/jquery.min.js") }}" crossorigin="anonymous"></script>
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}" crossorigin="anonymous"></script>

    <script src="{{ asset("vendor/jquery-easing/jquery.easing.min.js") }}"></script>
    <script src="{{ asset("js/sb-admin-2.min.js") }}" crossorigin="anonymous"></script>
    <script src="{{ asset("js/bs.min.js") }}" crossorigin="anonymous"></script>

    @stack("scripts")

    <script src="{{ asset("vendor/chart.js/Chart.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-toggle=tooltip]'
            });
            $('.toast').toast()
            $("html").on('click', function() {
                $('#accordionSidebar > .nav-item > .collapse.show').collapse('hide')
            });
        });
    </script>
</body>

</html>
