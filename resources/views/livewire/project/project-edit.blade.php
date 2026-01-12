<div>
    @section("title", "Edit Projects")

    @section('head-title', 'Projects')
    @include('admin.layouts.msg')
    <form wire:submit.prevent='update' method="post">
        @csrf
        <div class="container-fluid p-4">

            <!-- 1. Breadcrumbs & Header -->
            <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-5">

                <!-- Title & Breadcrumb -->
                <div class="d-flex flex-column gap-2">

                    <div>
                        <h1 class="fw-bold display-6 mb-1 text-dark">Edit Project</h1>
                        <p class="text-muted">Edit and manage your project information, media, and links.</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex align-items-center gap-2">

                    <button class="btn btn-primary d-flex align-items-center gap-2 px-3 fw-semibold">
                        <i class="ri-save-line"></i>
                        Save Changes
                    </button>
                </div>
            </div>

            <!-- 2. Main Grid Layout -->
            <div class="row g-4">

                <!-- LEFT COLUMN (Main Content) -->
                <div class="col-12 col-lg-8 d-flex flex-column gap-4">

                    <!-- Project Title Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <label for="projectTitle" class="form-label fw-bold">Project Title</label>
                            <input type="text" class="form-control form-control-lg bg-light" id="projectTitle"
                                   name="name" wire:model.blur='name' value="{{ old('name') }}">
                            @error('name')
                            <b class="small text-danger">* {{ $message }}</b>
                            @enderror
                        </div>
                    </div>

                    <!-- Project Feature Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <label for="projectTitle" class="form-label fw-bold">Project Features</label>
                            <div class="d-flex flex-wrap gap-2 mb-3">

                                @if (count($features) > 0)
                                    @foreach ($features as $index => $feature)
                                        <span
                                            class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 d-flex align-items-center gap-2">
                                            {{ $feature }}

                                            <button type="button" wire:click='removeFeature({{ $index }})'
                                                    class="btn p-0 d-flex align-items-center justify-content-center"
                                                    style="width: 18px; height: 18px; border: none; background: transparent; color: inherit; opacity: 0.6; transition: all 0.2s ease;"
                                                    onmouseover="this.style.opacity='1'; this.style.color='#dc3545';"
                                                    onmouseout="this.style.opacity='0.6'; this.style.color='inherit';">
                                                <i class="ri-close-line" style="font-size: 14px; line-height: 1;"></i>
                                            </button>

                                        </span>
                                    @endforeach
                                @endif

                            </div>
                            <input type="text" class="form-control form-control-lg bg-light" id="projectTitle"
                                   value="{{ old('feature') }}" wire:model='feature'
                                   wire:keydown.enter.prevent='addFeature'>
                            @error('feature')
                            <b class="small text-danger">* {{ $message }}</b>
                            @enderror
                        </div>
                    </div>

                    <!-- Short Description Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <label for="projectDesc" class="form-label fw-bold mb-3">Short Description</label>
                            <textarea class="form-control bg-light" id="projectDesc" wire:model.blur='short_description'
                                      rows="3"
                                      placeholder="Enter a Short description...">{{ old('short_description') }} </textarea>
                            <div class="form-text text-end mt-2">100 characters</div>
                            @error('short_description')
                            <b class="small text-danger">* {{ $message }}</b>
                            @enderror
                        </div>
                    </div>

                    <!-- Description Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <label for="projectDesc" class="form-label fw-bold mb-3">Description</label>
                            <textarea class="form-control bg-light" wire:model.blur='description' id="projectDesc"
                                      rows="6"
                                      placeholder="Enter a detailed description...">{{ old('description') }}</textarea>
                            <div class="form-text text-end mt-2">250 characters</div>
                            @error('description')
                            <b class="small text-danger">* {{ $message }}</b>
                            @enderror
                        </div>
                    </div>

                    <!-- Media Gallery Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0">Project Media</h5>
                                <button
                                    class="btn btn-light text-primary fw-semibold d-flex align-items-center gap-2 btn-sm">
                                    <i class="ri-image-add-line fs-5"></i>
                                    Upload Media
                                </button>
                            </div>

                            <div class="row g-3">
                                <!-- Image 1 -->
                                @if ($newImage && !is_string($newImage) && method_exists($newImage, 'temporaryUrl') && $newImage->isPreviewable())
                                    <div class="col-6 col-md-6">
                                        <div class="position-relative group rounded-3 overflow-hidden shadow-sm"
                                             style="aspect-ratio: 16/9;">


                                            <img src="{{ $newImage->temporaryUrl() }}"
                                                 class="w-100 h-100 object-fit-cover" alt="Project">


                                            <!-- Hover Overlay -->
                                            <div
                                                class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center opacity-0 hover-opacity-100 transition-opacity"
                                                style="transition: opacity 0.3s;">
                                                <button type="button" wire:click='removeImage'
                                                        class="btn btn-danger btn-sm rounded-circle p-2">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-6 col-md-6">
                                        <div class="position-relative group rounded-3 overflow-hidden shadow-sm"
                                             style="aspect-ratio: 16/9;">


                                            <img src="{{ $image }}" class="w-100 h-100 object-fit-cover"
                                                 alt="Project">


                                        </div>
                                    </div>
                                @endif




                                <!-- Upload Placeholder -->
                                <div class="col-6 col-md-6">
                                    <label
                                        class="d-flex flex-column align-items-center justify-content-center w-100 h-100 border-2 border-dashed rounded-3 cursor-pointer text-secondary hover-bg-light transition-all"
                                        style="aspect-ratio: 16/9; border-style: dashed; background-color: #f8f9fa;">
                                        <i class="ri-add-line fs-3"></i>
                                        <span class="small fw-semibold mt-1">Add Media</span>
                                        <input type="file" wire:model.live='newImage' class="d-none">
                                    </label>
                                    @error('newImage')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN (Sidebar Details) -->
                <div class="col-12 col-lg-4 d-flex flex-column gap-4">

                    <!-- Details & Meta -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 d-flex flex-column gap-4">

                            <!-- Technologies -->
                            <div>
                                <h6 class="fw-bold mb-3">Technologies Used</h6>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    @if (count($technology) > 0)
                                        @foreach ($technology as $index => $tech)
                                            <span
                                                class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 d-flex align-items-center gap-2">
                                                {{ ucfirst($tech) }}

                                                <button type="button" wire:click='removeTech({{ $index }})'
                                                        class="btn p-0 d-flex align-items-center justify-content-center"
                                                        style="width: 18px; height: 18px; border: none; background: transparent; color: inherit; opacity: 0.6; transition: all 0.2s ease;"
                                                        onmouseover="this.style.opacity='1'; this.style.color='#dc3545';"
                                                        onmouseout="this.style.opacity='0.6'; this.style.color='inherit';">
                                                    <i class="ri-close-line"
                                                       style="font-size: 14px; line-height: 1;"></i>
                                                </button>

                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Add technology..." value="{{ old('tech') }}"
                                           wire:model='tech' wire:keydown.enter.prevent='addTech'>

                                </div>
                                @error('tech')
                                <b class="small text-danger">* {{ $message }}</b>
                                @enderror
                            </div>

                            <hr class="text-secondary opacity-25 my-0">

                            <!-- Links -->
                            <div>
                                <h6 class="fw-bold mb-3">Project Links</h6>
                                <div class="d-flex flex-column gap-3">
                                    <div>
                                        <label class="form-label small text-muted fw-bold mb-1">Live Android
                                            Store</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="ri-google-play-fill"></i>
                                            </span>
                                            <input type="url" class="form-control border-start-0 ps-0"
                                                   placeholder="https://starlight.example.com"
                                                   value="{{ old('android') }}" wire:model.blur='android'>
                                        </div>
                                        @error('android')
                                        <b class="small text-danger">* {{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="form-label small text-muted fw-bold mb-1">Live IOS Store</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="ri-app-store-line"></i>
                                            </span>
                                            <input type="url" class="form-control border-start-0 ps-0"
                                                   placeholder="https://starlight.example.com"
                                                   value="{{ old('ios') }}" wire:model.blur='ios'>
                                        </div>
                                        @error('ios')
                                        <b class="small text-danger">* {{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="form-label small text-muted fw-bold mb-1">Repository URL</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="ri-github-line"></i></span>
                                            <input type="url" class="form-control border-start-0 ps-0  small fs-6"
                                                   placeholder="https://github.com/user/starlight"
                                                   value="{{ old('repo') }}" wire:model.blur='repo'>
                                        </div>
                                        @error('repo')
                                        <b class="small text-danger">* {{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="text-secondary opacity-25 my-0">

                            <!-- Status -->
                            <div>
                                <h6 class="fw-bold mb-3">Status</h6>
                                <select class="form-select" wire:model.live='status' aria-label="Project status">
                                    <option value="" selected>Select Project Status</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                                @error('status')
                                <b class="small text-danger">* {{ $message }}</b>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- Custom CSS for Hover Effects (لإظهار زر الحذف عند الوقوف على الصورة) -->
    <style>
        .hover-opacity-100:hover {
            opacity: 1 !important;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .hover-text-dark:hover {
            color: #000 !important;
        }
    </style>

</div>
