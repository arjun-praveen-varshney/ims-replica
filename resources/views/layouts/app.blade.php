<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body>
@auth
    <div class="sidebar">
    <div class="sidebar-header">Student Dashboard</div>
        <div class="nav-items">
            <a class="nav-item achievements" href="{{ route('achievements.index') }}"><i class="fas fa-trophy"></i>Student Achievements</a>
            <a class="nav-item internships" href="{{ route('internships.index') }}"><i class="fas fa-briefcase"></i>Student Internships</a>
            <a class="nav-item programs" href="{{ route('programs.index') }}"><i class="fas fa-graduation-cap"></i>Student Courses and Workshops</a>
            <a class="nav-item papers" href="{{ route('papers.index') }}"><i class="fas fa-book"></i>Student Paper Publications</a>
        </div>
    </div>
    @php
    switch (url()->current()) {
        case url('/programs'):
            $formRoute = route('programs.index');
            break;
        case url('/papers'):
            $formRoute = route('papers.index');
            break;
        case url('/internships'):
            $formRoute = route('internships.index');
            break;
        default:
            $formRoute = route('achievements.index');
            break;
    }
@endphp
    <div class="main-content">
    <div class="header">
        <form method="GET" action="{{ $formRoute }}">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
            </div>
        </form>
            <div class="user-info">
                <span>Welcome, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="post">
            @csrf
                <button class="logout-btn" type="submit">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
            </div>
        
        </div>
        @yield('content')
    </div>
    <script>
            if(window.location.pathname === "/achievements"){
            document.querySelector('.achievements').classList.add('active');
        }else if(window.location.pathname === "/internships"){
            document.querySelector('.internships').classList.add('active');
        }else if(window.location.pathname === "/programs"){
            document.querySelector('.programs').classList.add('active');
        }else if(window.location.pathname === "/papers"){
            document.querySelector('.papers').classList.add('active');
        }
    </script>
    @else
        <script>window.location = "{{ route('login') }}";</script>
            @endauth
</body>
</html>
