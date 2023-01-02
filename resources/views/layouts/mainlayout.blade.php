<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
    .main {
        height: 100vh;
    }

    /* .body-content {
        background: black;
        color: white;
    } */

     .row.no-gutter {
    margin-left: 0;
    margin-right: 0;
    }

    .row.no-gutter [class*='col-']:not(:first-child),
    .row.no-gutter [class*='col-']:not(:last-child) {
    padding-right: 0;
    padding-left: 0;
    }

    .sidebar{
        background: rgb(157, 152, 152);
        color: white;
    } 

    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding:20px 10px;
    }

    .sidebar a:hover{
        background: rgb(130, 130, 203);
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="#">Rental Buku</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="body-content h-100">
            <div class="row no-gutter h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                        @if (Auth::user()-> role_id == 1)
                            <a href="dashboard">Dasboard</a>
                            <a href="books">Books</a>
                            <a href="#">Categories</a>
                            <a href="#">Users</a>
                            <a href="#">Rent</a>
                            <a href="logout">Logout</a>

                        @else
                            <a href="profile">Profile</a>
                            <a href="logout">Logout</a>
                        @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>