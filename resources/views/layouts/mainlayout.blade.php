<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
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
                    @if (Auth::user())  

                        @if (Auth::user()-> role_id == 1)
                            <a href="dashboard" 
                            @if (request()->route()->uri == 'dashboard')
                                class ='active'
                            @endif>Dasboard</a>
                            
                            <a href="/books"
                            @if (request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-delete/{slug}' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'category-deleted')
                                class ='active'
                            @endif>Books</a>
                           
                            <a href="/categories"
                            @if (request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-delete/{slug}' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted')
                                class ='active'
                            @endif>Categories</a>
                            
                            <a href="/users"
                            @if (request()->route()->uri == 'users' || request()->route()->uri == 'registered-users'|| request()->route()->uri == 'users-detail/{slug}' || request()->route()->uri == 'users-approve/{slug}')
                                class ='active'
                            @endif>Users</a>
                            
                            <a href="/rent-logs"
                            @if (request()->route()->uri == 'rent-logs')
                                class ='active'
                            @endif>Rent Log</a>

                            <a href="/"
                            @if (request()->route()->uri == '/')
                                class ='active'
                            @endif>Book-list</a>
                            
                            <a href="/logout">Logout</a>

                        @else
                            <a href="/profile"
                            @if (request()->route()->uri == 'profile')
                                class ='active'
                            @endif>Profile</a>

                            <a href="/"
                            @if (request()->route()->uri == '/')
                                class ='active'
                            @endif>Book-list</a>

                            <a href="/logout">Logout</a>
                        @endif
                    @else
                    <a href="login">Login</a>

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