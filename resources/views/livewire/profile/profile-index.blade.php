<div>
    @section("title", "Profile")

    @section('head-title', 'My Profile')

    @section('add-section')
        <a href="{{ route('admin.profile.edit') }}"
           class="btn btn-light border shadow-sm d-flex align-items-center gap-2 px-3 fw-semibold text-secondary hover-primary"
           style="height: 40px;">
            <i class="ri-settings-4-line fs-5"></i>
            <span class="small">Settings</span>
        </a>
    @endsection

    <div class="container" style="max-width: 900px;">

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
            <div class="bg-secondary position-relative"
                 style="height: 200px; background-image: url('{{ optional(Auth::user()->profile)->getFirstMediaUrl('hero-image') ?: asset('asset/imgs/hero_img.png') }}'  ); background-size: cover; background-position: center;">
                <a href="{{ route('admin.profile.edit') }}"
                   class="btn btn-light btn-sm position-absolute top-0 end-0 m-3 shadow-sm rounded-pill fw-bold px-3">
                    <i class="ri-edit-box-line me-1"></i> Edit Profile
                </a>
            </div>

            <div class="card-body px-4 px-lg-5 pb-4 position-relative">
                <div class="d-flex justify-content-between align-items-end"
                     style="margin-top: -80px; margin-bottom: 20px;">
                    <div class="position-relative">
                        <img
                            src="{{ optional(Auth::user()->profile)->getFirstMediaUrl('avatar-image') ?: asset('asset/imgs/avatar.png') }}"
                            alt="Profile" class="rounded-circle border border-4 border-white shadow-sm bg-white"
                            style="width: 128px; height: 128px; object-fit: cover;">
                    </div>

                    <div class="d-none d-md-flex gap-2 mb-2">
                        @if(Auth::user()->profile?->github)
                            <a href="{{ optional(Auth::user()->profile)->github ?: '#' }}"
                               class="btn btn-light border rounded-circle p-2 text-secondary hover-primary transition-all"
                               title="GitHub">
                                <i class="ri-github-fill fs-5"></i>
                            </a>
                        @endif

                        @if(optional(Auth::user()->profile)->linked_in)
                            <a href="{{ optional(Auth::user()->profile)->linked_in ?: '#' }}"
                               class="btn btn-light border rounded-circle p-2 text-primary hover-primary transition-all"
                               title="LinkedIn">
                                <i class="ri-linkedin-fill fs-5"></i>
                            </a>
                        @endif

                        @if(optional(Auth::user()->profile)->whatsapp)
                            <a href="https://wa.me/{{ optional(Auth::user()->profile)->whatsapp ?: '#' }}"
                               class="btn btn-light border rounded-circle p-2 text-success hover-primary transition-all"
                               title="WhatsApp">
                                <i class="ri-whatsapp-line fs-5"></i>
                            </a>
                        @endif

                        @if(optional(Auth::user()->profile)->facebook)
                            <a href="{{ optional(Auth::user()->profile)->facebook ?: '#' }}"
                               class="btn btn-light border rounded-circle p-2 text-primary hover-primary transition-all"
                               title="Facebook">
                                <i class="ri-facebook-line fs-5"></i>
                            </a>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h1 class="fw-bold text-dark mb-1">{{ Auth::user()->name }}</h1>
                        <p class="fs-5 text-secondary mb-3">
                            {{ optional(Auth::user()->profile)->job_name ?: 'Your Job' }}</p>

                        <div class="d-flex flex-wrap gap-3 text-secondary small">
                            <div class="d-flex align-items-center gap-1">
                                <i class="ri-map-pin-line"></i>
                                <span>Cairo, Egypt</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="ri-briefcase-line"></i>
                                <span>{{ optional(Auth::user()->profile)->experience ?: 0 }} Years Exp.</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="ri-rocket-line"></i>
                                <span>{{ optional(Auth::user()->profile)->apps ?: 0 }} Apps Launched</span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-4 d-md-none mt-4">
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-light border flex-grow-1"><i
                                    class="ri-github-fill"></i></a>
                            <a href="#" class="btn btn-light border flex-grow-1"><i
                                    class="ri-linkedin-fill text-primary"></i></a>
                            <a href="#" class="btn btn-light border flex-grow-1"><i
                                    class="ri-whatsapp-line text-success"></i></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body p-4 p-lg-5">
                        <h5 class="fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                            <i class="ri-user-smile-line text-primary"></i>
                            {{ optional(Auth::user()->profile)->about_caption ?: 'About Me Caption' }}
                        </h5>
                        <div class="text-secondary" style="line-height: 1.8;">
                            <p class="mb-4 lead fs-6">
                                {{ optional(Auth::user()->profile)->description ?: 'About Me Description' }}
                            </p>

                        </div>

                        <hr class="my-5 border-secondary border-opacity-10">

                        {{-- <h5 class="fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                            <i class="ri-code-box-line text-primary"></i> Technical Experience
                        </h5>

                        <div class="d-flex gap-3 mb-4">
                            <div class="mt-1">
                                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="ri-macbook-line fs-4"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Senior Frontend Developer</h6>
                                <p class="text-muted small mb-2">Tech Solutions Inc. • 2020 - Present</p>
                                <p class="text-secondary small mb-0">Leading the frontend team, architecting React
                                    applications, and mentoring junior developers.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Skills & Expertise</h6>

                        <div class="mb-4">
                            <small class="text-uppercase text-muted fw-bold"
                                   style="font-size: 0.7rem;">Technical</small>
                            <div class="d-flex flex-wrap gap-2 mt-2">

                                @if (count(optional(Auth::user()->profile)->tech_skills ?: []) > 0)
                                    @foreach (Auth::user()->profile->tech_skills as $tech_skill)
                                        <span class="badge bg-light text-dark border fw-normal px-3 py-2 rounded-pill">
                                            {{ $tech_skill }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="badge bg-light text-dark border fw-normal px-3 py-2 rounded-pill">
                                        Your Tech Skills
                                    </span>
                                @endif


                            </div>
                        </div>

                        <div>
                            <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem;">Soft
                                Skills</small>
                            <div class="d-flex flex-wrap gap-2 mt-2">

                                @if (count(optional(Auth::user()->profile)->soft_skills ?: []) > 0)
                                    @foreach (Auth::user()->profile->soft_skills as $soft_skill)
                                        <span
                                            class="badge bg-primary-subtle text-primary fw-medium px-3 py-2 rounded-pill">
                                            {{ $soft_skill }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="badge bg-primary-subtle text-primary fw-medium px-3 py-2 rounded-pill">
                                        Your Soft Skills
                                    </span>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Contact Information</h6>

                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                            <li class="d-flex align-items-center gap-3 text-secondary">
                                <div
                                    class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-dark"
                                    style="width: 36px; height: 36px;">
                                    <i class="ri-mail-line"></i>
                                </div>
                                <span class="small text-truncate">{{ Auth::user()->email }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-3 text-secondary">
                                <div
                                    class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-dark"
                                    style="width: 36px; height: 36px;">
                                    <i class="ri-phone-line"></i>
                                </div>
                                <span class="small">{{ Auth::user()->phone }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-3 text-secondary">
                                <div
                                    class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-dark"
                                    style="width: 36px; height: 36px;">
                                    <i class="ri-global-line"></i>
                                </div>
                                <span class="small text-truncate">{{ env('APP_URL') }}</span>
                            </li>
                        </ul>

                        <div class="d-grid mt-4">
                            <a href="mailto:{{ Auth::user()->email }}"
                               class="btn btn-primary fw-semibold rounded-3 py-2">
                                Contact Me
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
