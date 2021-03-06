<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Lesson Scheduler')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>

    <link href='/css/foobooks.css' type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    @if(Session::get('flash_message') != null)
        <div class='flash_message'>{{ Session::get('flash_message') }}</div>
    @endif

    <header>
        <a href='/'>
            @if(Auth::check())
            {{Auth::user()->first_name}}'s dashboard
            @else
            Hello Guest
            @endif 
        </a>
    </header>

    <nav>
        <ul>
            @if(Auth::check())
                <li><a href='/'>My lessons</a></li>
                <li><a href='/lessons/create'>Add a lesson</a></li>
                <li><a href='/teachers'>View teachers</a></li>
                <li><a href='/students'>View students</a></li>
                <li><a href='/logout'>Log out</a></li>
            @else
                <li><a href='/'>Home</a></li>
                <li><a href='/login'>Log in</a></li>
                <li><a href='/register'>Register</a></li>
            @endif
        </ul>
    </nav>


    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <footer>
        &copy; {{ date('Y') }} &nbsp;&nbsp;
        <a href='https://github.com/luseleafpaper/dwa15-project' target='_blank'><i class='fa fa-github'></i> View on Github</a> &nbsp;&nbsp;
        <a href='http://p4.luseleafpaper.com' target='_blank'><i class='fa fa-link'></i> View Live</a>
        <a href='https://www.youtube.com/watch?v=9-3-i6U5PYc' target='_blank'><i class='fa fa-link'></i> View Demo</a>
    </footer>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
