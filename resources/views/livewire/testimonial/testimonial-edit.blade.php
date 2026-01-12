<div>
    <div class="container-fluid" style="max-width: 1000px;">
        @section("title", "Testimonials Edit")

        @section('head-title', 'Edit Testimonial')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold display-6 mb-1 text-dark">Edit Testimonial</h1>
                <p class="text-secondary mb-0">Update client review details</p>
            </div>
            <a href="{{ route('admin.testimonial.index') }}"
               class="btn btn-light border shadow-sm fw-bold text-secondary">
                <i class="ri-arrow-left-line me-1"></i> Back to List
            </a>
        </div>

        <form wire:submit="update">
            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 rounded-4 h-100">
                        <div class="card-body p-4 p-lg-5">
                            <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">Client Information</h5>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary small text-uppercase">Client
                                        Name</label>
                                    <input type="text" wire:model="name" class="form-control form-control-lg fs-6"
                                           placeholder="e.g. John Doe">
                                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary small text-uppercase">Position /
                                        Company</label>
                                    <input type="email" wire:model="email" class="form-control form-control-lg fs-6"
                                           placeholder="e.g. CEO at Google">
                                    @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold text-secondary small text-uppercase">Review /
                                        Feedback</label>
                                    <textarea wire:model="message" rows="6" class="form-control"
                                              placeholder="What did the client say?"></textarea>
                                    @error('message') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="status" class="form-label fw-bold text-secondary small text-uppercase">Status</label>

                                <select id="status" wire:model.live.debounce="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="accept">Accept</option>
                                    <option value="pending">Pending</option>
                                    <option value="spam">Spam</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-light px-4 fw-bold text-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm">
                    <span wire:loading.remove wire:target="update">Update Changes</span>
                    <span wire:loading wire:target="update">Saving...</span>
                </button>
            </div>
        </form>
    </div>
</div>
