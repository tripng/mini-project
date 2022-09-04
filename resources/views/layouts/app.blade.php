<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('style')
    @livewireStyles
    
</head>

<body>
    <div id="app">
        @if(Route::currentRouteName() != 'college.show' && Route::currentRouteName() != 'login' && Route::currentRouteName() != 'course.show')
            <livewire:components.sidebar-component />
        @endif
        {{$slot}}
    </div>

    @livewireScripts
    @stack('script')
</body>

</html>