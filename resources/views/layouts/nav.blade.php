<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <div class="rounded-circle overflow-hidden border border-secondary border-opacity-25"
                 style="width:60px;height:60px;">
                <img src="{{ optional($user->profile)->getFirstMediaUrl("avatar-image") ?: asset("favicon.ico") }}"
                     alt="Avatar" style="width:100%; height:100%; object-fit:cover;">
            </div>
            <div class="ms-1 lh-1">
                <div class="fw-bold" style="font-size:1.1rem;">{{ $user->name }}</div>
                <small
                    style="font-size:0.85rem; color:var(--accent); font-weight: bold;">{{ optional($user->profile)->job_name ?: "Job Title" }}</small>
            </div>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span style="color: var(--text-main)"><i class="fa-solid fa-bars fa-lg"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto align-items-lg-center mt-3 mt-lg-0 gap-3">
                <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item ms-lg-2 d-flex align-items-center gap-2 mt-3 mt-lg-0 justify-content-center">
                    <button id="darkToggle" class="btn btn-sm btn-outline-light rounded-circle"
                            style="width:40px; height:40px;" title="Toggle Theme">
                        <i class="fa-regular fa-sun"></i>
                    </button>
                    <a class="btn btn-sm btn-cta rounded-pill px-4" href="#contact">Hire Me</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
