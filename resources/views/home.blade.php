<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">
        <div>
            <button><a href="{{url('/login')}}">Log me in</a></button>
        </div>
    </body>
</html>
