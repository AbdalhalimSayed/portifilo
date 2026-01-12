<section id="about" class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h6 style="color:var(--accent); font-weight:bold;">ABOUT ME</h6>
                <h3 class="fw-bold mb-3">{{ optional($user->profile)->about_caption ?: "About Caption" }}</h3>
                <p class="opacity-75" style="line-height:1.7;">
                    {{ optional($user->profile)->description ?: "About Description" }}
                </p>
                <div class="row mt-4 g-3">


                    @if(optional($user->profile)->soft_skills && count($user->profile->soft_skills)>0)
                        @foreach($user->profile->soft_skills as  $soft_skill)
                            <div class="col-sm-6"><i class="fa-solid fa-check-circle me-2"
                                                     style="color:var(--accent)"></i>
                                {{ $soft_skill }}
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-card p-4">
                    <h5 class="fw-bold mb-3">Tech Stack</h5>
                    <div class="d-flex flex-wrap gap-2">

                        @if(optional($user->profile)->tech_skills && count(optional($user->profile)->tech_skills)>0)
                            @foreach($user->profile->tech_skills as  $tech_skill)
                                <span class="badge  border border-secondary py-2 px-3"
                                      style="background: #0d6efd">{{ $tech_skill }}</span>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
