<div>
    <style>
        :root {
            --primary-color: #4169E1;
            --bs-body-font-family: 'Manrope', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        /* تنسيق للصورة الرئيسية */
        .project-hero-img {
            height: 400px;
            object-fit: cover;
            width: 100%;
            border-radius: 1rem;
        }

        /* تنسيق أيقونة المميزات */
        .feature-icon-box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(65, 105, 225, 0.1);
            color: var(--primary-color);
        }
    </style>
    @section("title", "Show Project")

    @section('head-title', 'Projects')

    @section('add-section')
        <a href="{{ route('admin.project.edit', $project->id) }}"
           class="btn btn-primary d-flex align-items-center gap-2 px-3 shadow-sm border-0" style="height: 40px;">
            <i class="ri-edit-line fs-5"></i>
            <span class="fw-bold small text-nowrap">Edit Project</span>
        </a>
    @endsection
    <div class="container pb-5">

        <div class="row mb-4 align-items-end">
            <div class="col-lg-8">

                <h1 class="display-5 fw-bold text-dark mb-2">{{ $project->name }}</h1>
                <p class="text-secondary lead">{{ $project->short_description }}</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">

                <div class="mb-5 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ $project->getFirstMediaUrl('app-image') }}" alt="Project Cover"
                         class="project-hero-img">
                </div>

                <div class="mb-5">
                    <h3 class="fw-bold mb-3">About the Project</h3>
                    <p class="text-secondary lh-lg">
                        {{ $project->description }}
                    </p>

                </div>

                <div class="mb-5">
                    <h3 class="fw-bold mb-4">Key Features</h3>
                    <div class="row g-3">

                        @if (count($project->features) > 0)
                            @foreach ($project->features as $feature)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 border h-100">

                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $feature }}</h6>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>


            </div>

            <div class="col-lg-4">

                <div class="position-sticky" style="top: 2rem;">

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 d-flex flex-column gap-3">
                            @if($project->android)
                                <a href="{{ $project->android }}"
                                   class="btn btn-outline-dark btn-lg d-flex align-items-center justify-content-center gap-2 fw-bold">
                                    <i class="ri-google-play-fill " style="color: #ffdd04; font-size: 24px"></i> Visit
                                    Google Play
                                </a>
                            @endif

                            @if($project->ios)
                                <a href="{{ $project->android }}"
                                   class="btn btn-outline-dark btn-lg d-flex align-items-center justify-content-center gap-2 fw-bold">
                                    <i class="ri-app-store-fill " style="color: #0453ff; font-size: 24px"></i> Visit App
                                    Store
                                </a>
                            @endif
                            @if($project->repo)
                                <a href="{{ $project->repo }}" target="_blank"
                                   class="btn btn-outline-dark btn-lg d-flex align-items-center justify-content-center gap-2 fw-bold">
                                    <i class="ri-github-fill"></i> View Source Code
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Project Info</h5>

                            <div class="d-flex flex-column gap-3">


                                <div class="d-flex justify-content-between border-bottom pb-2">
                                    <span class="text-secondary"><i class="ri-calendar-event-line me-2"></i>Date</span>
                                    <span
                                        class="fw-medium text-dark">{{ $project->created_at->format('M d, Y') }}</span>
                                </div>

                                <div class="d-flex justify-content-between border-bottom pb-2">
                                    <span class="text-secondary"><i class="ri-timer-line me-2"></i>Duration</span>
                                    <span class="fw-medium text-dark">{{ $project->created_at->diffForHumans() }}</span>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Technologies Used</h5>
                            <div class="d-flex flex-wrap gap-2">

                                @if (count($project->technology) > 0)
                                    @foreach ($project->technology as $technology)
                                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-medium">
                                            {{ ucfirst($technology) }}
                                        </span>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
