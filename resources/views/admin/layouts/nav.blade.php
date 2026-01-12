<header class="sticky-top border-bottom py-3 px-4"
        style="background-color: rgba(255, 255, 255, 0.85); backdrop-filter: blur(8px); z-index: 1000;">

    <div class="d-flex align-items-center justify-content-between">

        <h2 class="h5 fw-bold mb-0 text-dark"> @yield('head-title')</h2>

        <div class="d-flex align-items-center gap-3">

            @yield('add-section')

            <div class="d-flex align-items-center gap-3 ms-2 ps-3 border-start">

                <div class="rounded-circle border" data-alt="Admin user avatar"
                     style="width: 50px; height: 50px; background-image: url('{{ optional(Auth::user()->profile)->getFirstMediaUrl('avatar-image') ?: asset('asset/imgs/avatar.png') }}'); background-size: cover; background-position: center;">
                </div>

                <div class="d-flex flex-column" style="line-height: 1.2;">
                    <span class="fw-bold small text-dark">{{ Auth::user()->name }}</span>
                    <span class="text-muted small" style="font-size: 0.8rem;">{{ Auth::user()->email }}</span>
                </div>

            </div>

        </div>
    </div>
</header>
