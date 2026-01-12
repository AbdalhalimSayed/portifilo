<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield("title", "Portfolio Admin Dashboard")</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4169E1;
            /* Royal Blue - نفس لونك المفضل */
            --bs-body-font-family: 'Manrope', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            font-family: "El Messiri", sans-serif;
            font-optical-sizing: auto;
            /* bg-light */
        }

        /* تنسيق الـ Wrapper الرئيسي ليحتوي السايدبار والمحتوى */
        #wrapper {
            overflow-x: hidden;
            display: flex;
            height: 100vh;
            /* ملء الشاشة */
        }

        /* تنسيق السايدبار */
        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
        }

        /* تنسيق منطقة المحتوى الرئيسي */
        #page-content-wrapper {
            width: 100%;
            overflow-y: auto;
            /* سكرول للمحتوى فقط */
            display: flex;
            flex-direction: column;
        }

        /* تخصيص اللون الأساسي في البوتستراب */
        .text-primary {
            color: var(--primary-color) !important;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
    @livewireStyles()
</head>

<body>

<div id="wrapper">
    <div id="sidebar-wrapper">
        @include('admin.layouts.sidebar')
    </div>

    <main id="page-content-wrapper">
        @include('admin.layouts.nav')

        <div class="container-fluid py-4 px-4">
            {{ $slot ?? '' }}
            @yield('content')
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
</body>
@livewireScripts()

</html>
