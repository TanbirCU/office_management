
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/') }}front/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">LOGO</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('front.home') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('front.employ') }}" class="nav-link">Employees</a></li>
                <li><a href="{{ route('front.project') }}" class="nav-link">Projects</a></li>
                <li><a href="{{ route('front.notice') }}" class="nav-link">Announcement</a></li>

            </ul>
        </div>

    </nav>

    @yield('body')


<link rel="stylesheet" href="{{ asset('/') }}front/js/jquery-3.6.0.min.js">
<link rel="stylesheet" href="{{ asset('/') }}front/js/bootstrap.min.js">
</body>
</html>
