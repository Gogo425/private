<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/tailwind.config.js"></script>

</head>
<body>
   @include("header")
    <div class="container">
        @yield('content')
    </div>  
 @include("footer")
</body>

</html>