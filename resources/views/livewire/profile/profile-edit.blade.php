<div>
    <div>
        @section("title", "Profile Edit")
        @section('head-title', 'Profile')
        @include('admin.layouts.msg')
        <div class="container" style="max-width: 900px;">

            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                <h1 class="fw-bold display-6 mb-0 text-dark">Edit Profile Details</h1>
            </div>

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-lg-5">

                    <form wire:submit.prevent="save" method="POST">
                        @csrf
                        <div class="mb-5">
                            <p class="form-label fw-medium text-secondary pb-2">Profile Avater Picture</p>

                            <div class="d-flex align-items-center gap-4">

                                <div class="position-relative">
                                    @if($new_avatar && !is_string($new_avatar) && method_exists($new_avatar, 'temporaryUrl') && $new_avatar->isPreviewable() )
                                        <div class="rounded-circle bg-secondary bg-opacity-10"
                                             style="width: 96px; height: 96px; background-image: url('{{ $new_avatar->temporaryUrl() }}'); background-size: cover; background-position: center;">
                                        </div>
                                        <button type="button"
                                                class="btn btn-light bg-white border shadow-sm rounded-circle position-absolute bottom-0 end-0 p-0 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px;" title="Remove picture"
                                                wire:click="removeNewAvatar">
                                            <i class="ri-delete-bin-line text-secondary"></i>
                                        </button>
                                    @elseif($avatar_upload)

                                        <div class="rounded-circle bg-secondary bg-opacity-10"
                                             style="width: 96px; height: 96px; background-image: url('{{ $avatar_upload }}'); background-size: cover; background-position: center;">
                                        </div>

                                    @else
                                        <div class="rounded-circle bg-secondary bg-opacity-10"
                                             style="width: 96px; height: 96px; background-image: url('{{ asset("asset/imgs/avatar.png") }}'); background-size: cover; background-position: center;">
                                        </div>
                                    @endif


                                </div>

                                <div class="flex-grow-1">
                                    <div
                                        class="text-center rounded-3 bg-light py-4 px-3 border border-2 border-secondary border-opacity-25"
                                        style="border-style: dashed !important;">

                                        <i class="ri-file-upload-line fs-1 text-secondary opacity-50"></i>

                                        <p class="mt-2 mb-1 small text-secondary">
                                            <label class="fw-bold text-primary text-decoration-none cursor-pointer"
                                                   role="button">
                                                <span>Upload a file</span>
                                                <input name="file-upload" type="file"
                                                       accept="image/png, image/jpeg, image/jpg"
                                                       wire:model="new_avatar" class="d-none"/>
                                            </label>
                                            or drag and drop
                                        </p>

                                        <p class="small text-muted mb-0" style="font-size: 0.75rem;">PNG, JPG,up to
                                            2MB</p>
                                    </div>
                                    @error('new_avatar')
                                    <b class="text-danger small">*{{ $message }}</b>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="mb-5">
                            <p class="form-label fw-medium text-secondary pb-2">Profile Hero Picture</p>

                            <div class="d-flex align-items-center gap-4">
                                <div class="position-relative">

                                    @if($new_hero && !is_string($new_hero) && method_exists($new_hero, 'temporaryUrl') && $new_hero->isPreviewable())
                                        <div class="rounded bg-secondary bg-opacity-10"
                                             style="width: 300px; height: 150px; background-image: url('{{ $new_hero->temporaryUrl() }}'); background-size: cover; background-position: center;">
                                        </div>

                                        <button type="button"
                                                class="btn btn-light bg-white border shadow-sm rounded-circle position-absolute bottom-0 end-0 p-0 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px;" title="Remove picture"
                                                wire:click="removeNewHero">
                                            <i class="ri-delete-bin-line text-secondary"></i>
                                        </button>
                                    @elseif(is_null($hero_upload) && is_null($hero_upload))
                                        <div class="rounded bg-secondary bg-opacity-10"
                                             style="width: 300px; height: 150px; background-image: url('{{ asset('asset/imgs/hero_img.png') }}'); background-size: cover; background-position: center;">
                                        </div>
                                    @else

                                        <div class="rounded bg-secondary bg-opacity-10"
                                             style="width: 300px; height: 150px; background-image: url('{{ $hero_upload }}'); background-size: cover; background-position: center;">
                                        </div>

                                    @endif


                                </div>

                                <div class="flex-grow-1">
                                    <div
                                        class="text-center rounded-3 bg-light py-4 px-3 border border-2 border-secondary border-opacity-25"
                                        style="border-style: dashed !important;">

                                        <i class="ri-file-upload-line fs-1 text-secondary opacity-50"></i>

                                        <p class="mt-2 mb-1 small text-secondary">
                                            <label class="fw-bold text-primary text-decoration-none cursor-pointer"
                                                   role="button">
                                                <span>Upload a file</span>
                                                <input name="file-upload" wire:model="new_hero" type="file"
                                                       class="d-none" accept="image/png, image/jpeg, image/jpg"/>
                                            </label>
                                            or drag and drop
                                        </p>

                                        <p class="small text-muted mb-0" style="font-size: 0.75rem;">PNG, JPG, up to
                                            10MB</p>
                                    </div>
                                    @error('new_hero') <b class="text-danger small">*{{ $message }}</b> @enderror
                                </div>

                            </div>
                        </div>

                        <div class="mb-5">
                            <h5 class="fw-bold border-bottom pb-3 mb-4 text-dark">Resume / CV</h5>


                            <div class="position-relative">
                                <label
                                    class="d-flex flex-column align-items-center justify-content-center w-100 p-5 border-2 rounded-4 bg-light cursor-pointer transition-all hover-bg-gray-200"
                                    style="border-style: dashed; border-color: #dee2e6; min-height: 200px;">
                                    <p class="small text-muted mb-0" style="font-size: 0.75rem;"> CV PDF up to
                                        2MB</p>

                                    <input type="file"
                                           wire:model="new_cv"
                                           accept=".pdf"
                                           class="d-none">

                                    @if ($new_cv)
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="ri-checkbox-circle-fill text-success fs-3 mb-1"></i>
                                            <b class="text-success small">New File Selected:</b>
                                            <span class="text-dark small">{{ $new_cv->getClientOriginalName() }}</span>
                                        </div>

                                    @elseif ($cv)
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="ri-file-pdf-2-fill text-danger fs-3 mb-1"></i>
                                            <b class="text-primary small">Current CV:</b>
                                            {{-- استخدام file_name عادة أدق مع Spatie Media --}}
                                            <span class="text-dark small">{{ $cv->file_name ?? $cv->name }}</span>
                                        </div>

                                    @else
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="ri-upload-cloud-2-line text-secondary fs-3 mb-1"></i>
                                            <b class="text-warning small">Please Upload CV</b>
                                        </div>
                                    @endif
                                </label>

                                @error('new_cv')

                                <b class="text-danger small">* {{ $message }}</b>
                                @enderror
                            </div>

                        </div>

                        <div class="mb-5">
                            <h5 class="fw-bold border-bottom pb-3 mb-4 text-dark">Personal Information</h5>

                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label fw-medium text-secondary">Name</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="Your Name" wire:model.live.debounce="name"
                                           value="{{ old($name) }}">
                                    @error('name')
                                    <b class="text-danger small">* {{ $message }}</b>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label class="form-label fw-medium text-secondary">Email</label>
                                    <input type="email" class="form-control form-control-lg fs-6"
                                           placeholder="Your Email" wire:model.live.debounce="email"
                                           value="{{ old('email') }}">
                                    @error('email')
                                    <b class="text-danger small">* {{ $message }}</b>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label class="form-label fw-medium text-secondary">Phone</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="Your Phone" wire:model.live.debounce="phone"
                                           value="{{ old("phone") }}">
                                    @error('phone')
                                    <b class="text-danger small">* {{ $message }}</b>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-medium text-secondary">Job Name</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="Your Job Title" wire:model.live.debounce="job_name"
                                           value="{{ old('job_name') }}">
                                    @error('job_name')
                                    <b class="text-danger small">* {{ $message }}</b>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-medium text-secondary">Hero Description</label>
                                    <textarea class="form-control" rows="4" wire:model.live.debounce="hero_description"
                                              placeholder="A short, impactful statement for your portfolio's main banner...">{{ old('hero_description') }}</textarea>
                                    @error('hero_description')
                                    <b class="text-danger small">* {{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h5 class="fw-bold border-bottom pb-3 mb-4 text-dark">Skills</h5>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Soft Skills</label>
                                    <div
                                        class="form-control d-flex flex-wrap align-items-center gap-2 tags-input-container">

                                        @if(count($soft_skills) > 0)
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($soft_skills as $index => $soft_skill)
                                                    <span
                                                        class="badge bg-primary-subtle text-primary rounded-pill d-flex align-items-center px-3 py-2">
                                                        {{ $soft_skill }}

                                                        <button type="button"
                                                                wire:click="removeSoftSkill({{ $index }})"
                                                                class="btn p-0 ms-2 border-0 bg-transparent text-primary opacity-75 hover-opacity-100"
                                                                style="line-height: 1;"
                                                                title="Remove skill">

                                                            <i class="ri-close-line fs-6"
                                                               onmouseover="this.parentElement.classList.add('text-danger')"
                                                               onmouseout="this.parentElement.classList.remove('text-danger')"></i>
                                                        </button>
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <input type="text" value="{{ old("soft_skill") }}"
                                               class="border-0 bg-transparent flex-grow-1"
                                               placeholder="Add a soft skill..." style="min-width: 100px;"
                                               wire:model="soft_skill" wire:keydown.enter.prevent="addSoftSkill">

                                    </div>
                                    @error('soft_skill')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Technical Skills</label>
                                    <div
                                        class="form-control d-flex flex-wrap align-items-center gap-2 tags-input-container">

                                        @if(count($tech_skills) > 0)
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($tech_skills as $index => $tech_skill)
                                                    <span
                                                        class="badge bg-primary-subtle text-primary rounded-pill d-flex align-items-center px-3 py-2">
                                                        {{ $tech_skill }}

                                                        <button type="button"
                                                                wire:click="removeTechSkill({{ $index }})"
                                                                class="btn p-0 ms-2 border-0 bg-transparent text-primary opacity-75 hover-opacity-100"
                                                                style="line-height: 1;"
                                                                title="Remove skill">

                                                            <i class="ri-close-line fs-6"
                                                               onmouseover="this.parentElement.classList.add('text-danger')"
                                                               onmouseout="this.parentElement.classList.remove('text-danger')"></i>
                                                        </button>
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <input type="text" value="{{ old("soft_skill") }}"
                                               class="border-0 bg-transparent flex-grow-1"
                                               placeholder="Add a soft skill..." style="min-width: 100px;"
                                               wire:model="tech_skill" wire:keydown.enter.prevent="addTechSkill">

                                    </div>
                                    @error('tech_skill')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h5 class="fw-bold border-bottom pb-3 mb-4 text-dark">Social & Contact Links</h5>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Facebook Profile URL</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="https://facebook.com/username" value="{{ old("facebook") }}"
                                           wire:model.live.debounce="facebook">
                                    @error('facebook')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">LinkedIn Profile URL</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="https://linkedin.com/in/username" value="{{ old('linked_in') }}"
                                           wire:model.live.debounce="linked_in">
                                    @error('linked_in')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">GitHub Profile URL</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="https://github.com/username" value="{{ old('github') }}"
                                           wire:model.live.debounce="github">
                                    @error('github')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">WhatsApp Number</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           placeholder="+1234567890" value="{{ old('whatsapp') }}"
                                           wire:model.live.debounce="whatsapp">
                                    @error('whatsapp')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold border-bottom pb-3 mb-4 text-dark">Professional Summary</h5>

                            <div class="row g-4">
                                <div class="col-md-12">
                                    <label class="form-label fw-medium text-secondary">About Caption</label>
                                    <input type="text" class="form-control form-control-lg fs-6"
                                           value="{{ old('about_caption') }}"
                                           wire:model.live.debounce="about_caption" placeholder="A professional bio...">
                                    @error('about_caption')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-medium text-secondary">About Description</label>
                                    <textarea class="form-control" rows="5"
                                              placeholder="A more detailed professional bio..."
                                              wire:model.live.debounce="description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Number of Apps Developed</label>
                                    <input type="number" min="1" class="form-control form-control-lg fs-6"
                                           value="{{ old('apps') }}" wire:model.live.debounce="apps">
                                    @error('apps')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Years of Experience</label>
                                    <input type="number" min="1" class="form-control form-control-lg fs-6"
                                           value="{{ old('experience') }}" wire:model.live.debounce="experience">
                                    @error('experience')
                                    <b class="small text-danger">* {{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 pt-4 border-top mt-5">
                            <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary px-4 fw-semibold">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">Save
                                Changes
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
