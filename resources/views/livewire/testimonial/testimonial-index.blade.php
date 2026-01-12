<div>
    <div class="container-fluid">
        @section("title", "Testimonials")

        @section('head-title', 'Testimonials')
        @include('admin.layouts.msg')

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="position-relative">
                            <i class="ri-search-line position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                            <input type="text" wire:model.live.debounce.300ms="search"
                                   class="form-control ps-5 rounded-pill bg-light border-0"
                                   placeholder="Search by name or position...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="py-3 text-secondary small fw-bold text-uppercase ps-4">Client</th>
                            <th scope="col" class="py-3 text-secondary small fw-bold text-uppercase ps-4">Email</th>
                            <th scope="col" class="py-3 text-secondary small fw-bold text-uppercase">Feedback</th>
                            <th scope="col" class="py-3 text-secondary small fw-bold text-uppercase">Rating</th>
                            <th scope="col" class="py-3 text-secondary small fw-bold text-uppercase">Status</th>
                            <th scope="col" class="py-3 text-secondary small fw-bold text-uppercase text-end pe-4">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="border-top-0">
                        @forelse ($testimonials as $testimonial)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">

                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark">{{ $testimonial->name }}</h6>
                                            {{--                                            <small class="text-secondary">{{ $testimonial->position }}</small>--}}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $testimonial->email }}</td>
                                <td style="max-width: 300px;">
                                    <p class="mb-0 text-secondary text-truncate" title="{{ $testimonial->message }}">
                                        {{ Str::limit($testimonial->message, 60) }}
                                    </p>
                                </td>

                                <td>
                                    <div class="d-flex text-warning">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $testimonial->evaulation)
                                                <i class="ri-star-fill"></i>
                                            @else
                                                <i class="ri-star-line text-secondary opacity-25"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </td>

                                <td>
                                    <b @class(['small px-3 py-1 rounded', 'bg-success' => $testimonial->status == 'accept', 'bg-warning' => $testimonial->status == 'pending', 'bg-danger' => $testimonial->status == 'spam'])>{{$testimonial->status}}</b>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                           class="btn btn-sm btn-light text-primary border rounded-circle p-2"
                                           title="Edit">
                                            <i class="ri-pencil-line fs-5"></i>
                                        </a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-light text-danger rounded-circle"
                                                title="Delete"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $testimonial->id }}">
                                            <i class="ri-delete-bin-line fs-6"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $testimonial->id }}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete
                                                            Testimonial:
                                                            {{ $testimonial->name }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-danger text-start">
                                                        Are You Sure Do Want Delete Project
                                                        <b>{{ $testimonial->name }}</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                        <button type="button"
                                                                wire:click='delete({{ $testimonial->id }})'
                                                                class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                                                            Delete
                                                            Project
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="bg-light rounded-circle p-3 mb-3">
                                            <i class="ri-chat-quote-line fs-1 text-secondary opacity-50"></i>
                                        </div>
                                        <h6 class="text-secondary fw-bold">No testimonials found</h6>
                                        <p class="text-muted small">Start by adding a new client review.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $testimonials->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
