<section id="projects" class="py-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
            <div>
                <h6 style="color:var(--accent); font-weight:bold; letter-spacing:1px;">PORTFOLIO</h6>
                <h2 class="fw-bold">Selected Projects</h2>
            </div>
        </div>

        <div class="swiper-container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                @if(count($user->projects) > 0)
                    @foreach($user->projects as $project)
                        <div class="swiper-slide">
                            <div class="project-card">
                                <div class="position-relative">
                                    <img loading="lazy" src="{{ $project->getFirstMediaUrl("app-image") }}"
                                         class="img-fluid w-100"
                                         style="height:200px; object-fit:cover;">
                                    <div class="project-badge">
                                        {{ ucwords(implode(" • ", array_slice($project->technology, 0, 3))) }}
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h5 class="fw-bold">{{ $project->name }}</h5>
                                    <p class="small mb-3 opacity-75">{{ $project->short_description }}</p>

                                    <a href="#" class="text-decoration-none fw-bold" style="color:var(--accent)"
                                       data-bs-toggle="modal"
                                       data-bs-target="#projectModal{{ $project->id }}">
                                        View Details <i class="fa-solid fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center text-white">Not Have Any Project</div>
                @endif

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

@if(count($user->projects) > 0)
    @foreach($user->projects as $project)
        <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1"
             aria-labelledby="projectModalLabel{{ $project->id }}" aria-hidden="true" style="z-index: 1055;">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content"
                     style="background-color: #111111 !important; color: #ffffff !important; border: 1px solid #333; direction: ltr; text-align: left;">

                    <div class="modal-header border-0"
                         style="border-bottom: 1px solid #333 !important; padding: 1rem 1.5rem;">
                        <h5 class="modal-title fw-bold text-white"
                            id="projectModalLabel{{ $project->id }}">{{ $project->name }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close" style="filter: invert(1); opacity: 1;"></button>
                    </div>

                    <div class="modal-body custom-scroll" style="padding: 1.5rem;">
                        <div class="row">
                            <div class="col-lg-5 mb-4 mb-lg-0 text-center">
                                <div class="p-2"
                                     style="background: rgba(255,255,255,0.02); border-radius: 10px; border: 1px solid #333; display: inline-block;">
                                    <img src="{{ $project->getFirstMediaUrl('app-image') }}"
                                         class="img-fluid rounded"
                                         alt="{{ $project->name }}"
                                         style="max-height: 200px; width: auto; object-fit: contain;">
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <h6 class="fw-bold mb-2" style="color: #6c5ce7 !important;">Description:</h6>
                                <p style="color: #cccccc !important; font-size: 0.95rem; line-height: 1.7;">
                                    {{ $project->description ?? $project->short_description }}
                                </p>
                                <hr style="border-color: #444; margin: 1.5rem 0;">


                                @if(!empty($project->features))
                                    <h6 class="fw-bold mb-3" style="color: #6c5ce7 !important;">Key Features:</h6>

                                    <ul class="list-unstyled mb-0">
                                        @foreach($project->features as $feature)
                                            <li class="d-flex align-items-start mb-2">
                                                <i class="fa-solid fa-circle-check mt-1 me-2"
                                                   style="color: #6c5ce7; font-size: 1rem;"></i>
                                                <span style="color: #cccccc; font-size: 0.95rem; line-height: 1.6;">
                                                        {{ $feature }}
                                                        </span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <hr style="border-color: #444; margin: 1.5rem 0;">
                                @endif


                                <h6 class="fw-bold mb-3" style="color: #6c5ce7 !important;">Technologies:</h6>

                                <h6 class="fw-bold mb-3" style="color: #6c5ce7 !important;">Technologies:</h6>

                                <div class="d-flex flex-wrap gap-2 justify-content-start">
                                    @if(is_array($project->technology))
                                        @foreach($project->technology as $tech)
                                            <span class="badge"
                                                  style="background-color: #333 !important; color: #fff !important; border: 1px solid #555; padding: 8px 12px; font-weight: normal;">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="badge"
                                              style="background-color: #333 !important; color: #fff !important; border: 1px solid #555; padding: 8px 12px;">
                                            {{ $project->technology }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0"
                         style="border-top: 1px solid #333 !important; padding: 1rem 1.5rem;">

                        <div class="d-flex flex-wrap gap-2 w-100 justify-content-end">

                            @if(!empty($project->android))
                                <a href="{{ $project->android }}" target="_blank"
                                   class="btn btn-success d-flex align-items-center gap-2">
                                    <i class="fa-brands fa-google-play"></i>
                                    <span>Google Play</span>
                                </a>
                            @endif

                            @if(!empty($project->ios))
                                <a href="{{ $project->ios }}" target="_blank"
                                   class="btn btn-primary d-flex align-items-center gap-2">
                                    <i class="fa-brands fa-app-store-ios"></i>
                                    <span>App Store</span>
                                </a>
                            @endif

                            @if(!empty($project->repo))
                                <a href="{{ $project->repo }}" target="_blank"
                                   class="btn btn-outline-light d-flex align-items-center gap-2">
                                    <i class="fa-brands fa-github"></i>
                                    <span>Source Code</span>
                                </a>
                            @endif

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

<style>
    /* Ensure modal stays on top */
    .modal-backdrop {
        z-index: 1050;
    }

    .modal {
        z-index: 1055;
    }

    /* Custom Scrollbar for Dark Theme */
    .modal-body::-webkit-scrollbar {
        width: 8px;
    }

    .modal-body::-webkit-scrollbar-track {
        background: #111;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: #444;
        border-radius: 4px;
    }

    .modal-body::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
