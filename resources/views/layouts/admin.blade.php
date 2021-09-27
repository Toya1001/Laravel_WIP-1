<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{mix("css/app.css")}}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    
    
    <title>@yield("page_title")</title>
</head>
<body>

<div class="container w-screen h-screen flex">

    <div class=" bg-white p-4 h-full w-2/12">
        <h1 class="text-3xl font-extrabold text-center text-blue-600 mb-6">Admin</h1>
        <ul>
            <a href="{{route('Admin')}}">
            <li @if (!request()->routeIs('Admin'))
                class="py-2 px-2 hover:bg-blue-600 duration-300 mt-3  hover:text-white cursor-pointer"
            @else
                class="py-2 px-2 bg-blue-600 text-white cursor-pointer"
            @endif>
                Students</li></a> 
            <a href="{{route('course')}}">
            <li @if (!request()->routeIs('course'))
                class="py-2 px-2 hover:bg-blue-600 duration-300  hover:text-white cursor-pointer"
            @else
                class="py-2 px-2 bg-blue-600 text-white cursor-pointer"
            @endif>
                Courses</li></a>
            <a href="{{route('courseType')}}">
            <li @if (!request()->routeIs('course_type'))
                class="py-2 px-2 hover:bg-blue-600 duration-300  hover:text-white cursor-pointer"
            @else
                class="py-2 px-2 bg-blue-600 text-white cursor-pointer"
            @endif>
                Course Type</li></a>
            <a href="{{route('courseSelection')}}">
            <li @if (!request()->routeIs('course_selection'))
                class="py-2 px-2 hover:bg-blue-600 duration-300  hover:text-white cursor-pointer"
            @else
                class="py-2 px-2 bg-blue-600 text-white cursor-pointer"
            @endif>
                Course Selection</li></a>
            <form>@csrf
            <li class="py-2 px-2 hover:bg-blue-600 duration-300 hover:text-white cursor-pointer"> 
                <button
                    class="pr-10 w-full text-left focus:outline-none"
                    formaction="{{route('Logout')}}"
                    formmethod="post"
                    type="submit"
                >Logout</button> 
            </li>
            </form> 
        </ul>
    </div>
    <div class="w-10/12 h-full flex justify-center items-center bg-gray-300">

        <div class="h-full w-full">
            @yield("content")
        </div>

    </div>

</div>

</body>
</html>
