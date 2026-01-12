<header class="hero py-5 mt-5">
    <div class="container">
        <div class="hero-card p-4 p-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                    <h1 class="responsive-heading fw-bold mb-3">Hi, I'm <span style="color:var(--accent)">
                            {{ $user->name }}</span><br>{{ optional($user->profile)->job_name ?: "Job Title" }}</h1>
                    <p class="lead mb-4 opacity-75" style="font-size: 1.1rem;">
                        {{ optional($user->profile)->hero_description ?: "Hero Description" }}
                    </p>
                    <div class="my-5 d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">

                        @if(optional($user->profile)->github)
                            <a href="{{ $user->profile->github ?? '#' }}" target="_blank"
                               class="btn btn-light border btn-cta text-dark rounded-circle d-flex align-items-center justify-content-center shadow-sm transition-all"
                               style="width: 45px; height: 45px;"
                               title="GitHub">
                                <i class="ri-github-fill fs-4"></i>
                            </a>
                        @endif

                        @if(optional($user->profile)->linked_in)
                            <a href="{{ $user->profile->linked_in ?? '#' }}" target="_blank"
                               class="btn btn-light border btn-cta text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm transition-all"
                               style="width: 45px; height: 45px;"
                               title="LinkedIn">
                                <i class="ri-linkedin-fill fs-4"></i>
                            </a>
                        @endif

                        @if(optional($user->profile)->facebook)
                            <a href="{{ $user->profile->facebook ?? '#' }}" target="_blank"
                               class="btn btn-light border btn-cta text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm transition-all"
                               style="width: 45px; height: 45px;"
                               title="Facebook">
                                <i class="ri-facebook-circle-fill fs-4"></i>
                            </a>
                        @endif

                    </div>
                    <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">
                        <a class="btn btn-cta btn-lg" href="#projects">My Work</a>
                        <a class="btn btn-outline-light btn-lg" href="#contact">Contact Me</a>

                        @if(optional($user->profile)->getFirstMediaUrl("dev-cv"))
                            <a class="btn btn-danger btn-lg" target="_blank"
                               href="{{ $user->profile->getFirstMediaUrl("dev-cv") }}">My CV
                                <i class="ri-file-pdf-2-line"></i>
                            </a>
                        @endif

                    </div>

                    <div class="row mt-5 text-center">
                        <div class="col-4">
                            <div class="fw-bold h4 mb-0">{{ optional($user->profile)->apps ?: 0 }}+</div>
                            <small class="opacity-75">Apps</small>
                        </div>
                        <div class="col-4">
                            <div class="fw-bold h4 mb-0">{{ optional($user->profile)->experience ?: 0 }}+</div>
                            <small class="opacity-75">Years</small>
                        </div>
                        <div class="col-4">
                            <div class="fw-bold h4 mb-0">100%</div>
                            <small class="opacity-75">Success</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2 text-center mb-4 mb-lg-0" data-aos="fade-left">
                    <img loading="lazy"
                         src="{{ optional($user->profile)->getFirstMediaUrl("hero-image") ?: asset('favicon.ico') }}"
                         alt="{{ $user->name }}-img" class="img-fluid rounded-4 shadow-lg"
                         style="transform: rotate(2deg);">
                </div>
            </div>
        </div>
    </div>
</header>
