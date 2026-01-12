<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ $user->name }} — {{ optional($user->profile)->job_name }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <style>
        body {
            font-family: "El Messiri", sans-serif;
            font-optical-sizing: auto;
        }
    </style>
</head>

<body>

<div class="floating-actions">
    <a href="tel:{{ $user->phone }}" class="float-btn btn-phone" title="Call Me">
        <i class="fa-solid fa-phone"></i>
    </a>
    <a href="https://wa.me/{{ optional($user->profile)->whatsapp ?: "#" }}" target="_blank"
       class="float-btn btn-whatsapp" title="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
</div>

<div class="blob one"></div>
<div class="blob two"></div>

@include('layouts.nav')

@yield('content')


@include('layouts.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

</body>

</html>
