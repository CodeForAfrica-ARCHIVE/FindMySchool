<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    <div class="header">
        <ul>
        @section('navigation')
            <li><a href="/">Home</a></li>
            <li><a href="#">Blog</a></li>
        @yield_section
        </ul>
        
        <form method="get" action="/school/search/">
        	<input type="text" name="s" value="" />
        	<input type="submit" name="" value="Submit" />
        </form>
    </div>
    @yield('content')
</body>
</html>