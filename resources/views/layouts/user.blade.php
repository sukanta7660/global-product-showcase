<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@hasSection('title') @yield('title') || @endif{{ config('site.siteTitle') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    @stack('css')
</head>
<body>


{{--Place Modal--}}
@include('layouts.partial.user.placeModal')
{{--Place Modal--}}

<div class="container mt-5 border pb-5 mb-5">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <h1
                class="food-title p-4 cursor-pointer"
                onclick="location.href='{{ route('user.index') }}'">
                {{ config('site.siteTitle') }}
            </h1>
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
<script src="{{ asset('admin-assets/js/jquery/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
<script>
    $('.confirmBtn').click(function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let confirmText = $(this).data('text');
        Swal.fire({
            title: 'Are you sure?',
            text: confirmText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgba(11,17,57,0.9)',
            cancelButtonColor: '#9a1313',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#confirmForm"+id).submit();
            }
        })
    })
</script>
{{-- Alert --}}
@if(session()->has('status'))
    <script>
        let status = '{{ session()->get('status') }}'
        let alertType = '{{ session()->get('alert_type') }}'
        let message = '{{ session()->get('message') }}'

        Swal.fire({
            position: 'top-end',
            icon: alertType,
            title: message,
            showConfirmButton: false,
            toast: true,
            timer: 1500,
        })
    </script>
@endif
{{-- Alert --}}
@stack('js')
</body>
</html>
