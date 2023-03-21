<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@hasSection('title') @yield('title') || @endif{{ config('site.siteTitle') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>
<body>


{{--Place Modal--}}
@include('layouts.partial.user.placeModal')
{{--Place Modal--}}

<div class="container mt-5 border pb-5 mb-5">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <h1 class="food-title p-4">{{ config('site.siteTitle') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">

            @yield('content')

            <hr>
            <div class="btns mt-5">
                {{--user buttons--}}
                @include('layouts.partial.user.buttons')
                {{--user buttons--}}
            </div>
        </div>
        <div class="col-md-2">
            {{--Coupon--}}
            @include('layouts.partial.user.coupon')
            {{--Coupon--}}
        </div>
    </div>
</div>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
</body>
</html>
