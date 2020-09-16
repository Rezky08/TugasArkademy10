<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.arkademy.com/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.arkademy.com/img/icons/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/">
            <img src="https://www.arkademy.com/img/Arkademy%20Putih.4e0c6a87.svg" height="50" alt="Logo Arkademy">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item text-white">
                <h5>Rezky Setiawan</h5>
            </li>
        </ul>
        </div>
    </nav>
    <div class="row">
        @hasSection('arrow_back')
        <div class="col">
            <div class="text-primary">
                <a href="/">
                    <i class="material-icons" style="font-size: 48px">chevron_left</i>
                </a>
            </div>
        </div>
        @endif
        @if (Session::has("success") || Session::has("error"))
        <div class="col">
            @if(Session::has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {{Session::get('success')}}
                </strong>
            </div>

            <script>
                $(".alert").alert();
                </script>
            @endif
            @if(Session::has("error"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {{Session::get('error')}}
                </strong>
            </div>

            <script>
                $(".alert").alert();
                </script>
            @endif
        </div>
        @endif
    </div>

    @section('main')

    @show
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
