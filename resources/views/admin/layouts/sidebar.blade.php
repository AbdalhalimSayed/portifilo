<aside class="d-flex flex-column h-100 p-3 bg-white border-end">


    <nav class="nav nav-pills flex-column gap-2">

        <a class="nav-link link-dark d-flex align-items-center gap-3 px-3 @if (request()->routeIs('admin.dashboard')) bg-primary-subtle text-primary @endif"
           href="{{ route('admin.dashboard') }}">
            <i class="ri-dashboard-line fs-5"></i>
            <span class="fw-medium">Dashboard</span>
        </a>

        <a class="nav-link link-dark d-flex align-items-center gap-3 px-3 @if (request()->routeIs('admin.project.*')) bg-primary-subtle text-primary @endif"
           href="{{ route('admin.project.index') }}">
            <i class="ri-folder-3-line fs-5"></i>
            <span class="fw-medium">Projects</span>
        </a>

        <a class="nav-link d-flex link-dark align-items-center gap-3 px-3 @if (request()->routeIs('admin.profile.*')) bg-primary-subtle text-primary @endif"
           href="{{ route('admin.profile.index') }}" aria-current="page">
            <i class="ri-user-fill fs-5"></i>
            <span class="fw-medium">Profile</span>
        </a>

        <a class="nav-link d-flex link-dark align-items-center gap-3 px-3 @if (request()->routeIs('admin.testimonial.*')) bg-primary-subtle text-primary @endif"
           href="{{ route('admin.testimonial.index') }}"
           aria-current="page">
            <i class="ri-chat-quote-line fs-5"></i>
            <span class="fw-medium">Testimonials</span>
        </a>
        <a href="{{ route('index') }}" target="_blank"
           class="d-flex align-items-center gap-2 text-decoration-none text-secondary fw-bold px-3 py-2 rounded-3 hover-bg-light transition-all mb-2"
           title="Open Front-end">

            <i class="ri-global-line fs-5"></i>

            <span>Visit Site</span>

            <i class="ri-arrow-right-up-line ms-auto small opacity-50"></i>
        </a>
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="d-flex align-items-center gap-2 text-decoration-none text-danger fw-bold px-3 py-2 rounded-3 hover-bg-light transition-all">

            <i class="ri-logout-box-r-line fs-5"></i>

            <span>Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</aside>
