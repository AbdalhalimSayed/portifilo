<div>
    @section("title", "projects")

    @section('head-title', 'Products')

    @section('add-section')
        <a href="{{ route('admin.project.create') }}"
           class="btn btn-primary d-flex align-items-center gap-2 px-3 shadow-sm border-0" style="height: 40px;">
            <i class="ri-add-circle-line fs-5"></i>
            <span class="fw-bold small text-nowrap">Add New Project</span>
        </a>
    @endsection
    @include('admin.layouts.msg')
    <div class="table-responsive">
        <table class="table table-hover align-middle w-100">
            <thead class="table-light">
            <tr>
                <th scope="col" class="py-3 ps-4 text-secondary fw-medium">Project Name</th>
                <th scope="col" class="py-3 ps-4 text-secondary fw-medium">Project Description</th>
                <th scope="col" class="py-3 text-secondary fw-medium">Status</th>
                <th scope="col" class="py-3 text-secondary fw-medium">Date</th>
                <th scope="col" class="py-3 pe-4 text-end text-secondary fw-medium">Actions</th>
            </tr>
            </thead>
            <tbody class="border-top-0">


            @if ($projects->count() > 0)
                @foreach ($projects as $project)
                    <tr>
                        <td class="ps-4 fw-semibold text-dark py-3">{{ $project->name }}</td>
                        <td>{{ Str::limit($project->short_description, 30) }}</td>

                        <td>
                                <span @class([
                                    'badge rounded-pill  border border-success-subtle px-3',
                                    'bg-success-subtle text-success' => $project->status == 'published',
                                    'bg-secondary-subtle text-secondary' => $project->status == 'draft',
                                ])>
                                    {{ ucfirst($project->status) }}
                                </span>
                        </td>
                        <td class="text-secondary">{{ $project->created_at->format('Y-m-d') }}</td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('admin.project.edit', $project->id) }}"
                               class="btn btn-sm btn-light text-primary me-1" title="Edit">
                                <i class="ri-pencil-line fs-6"></i>
                            </a>
                            <a href="{{ route('admin.project.show', $project->id) }}"
                               class="btn btn-sm btn-light text-info" title="Show">
                                <i class="ri-eye-line fs-6"></i>
                            </a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-light text-danger" title="Delete"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $project->id }}">
                                <i class="ri-delete-bin-line fs-6"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Project:
                                                {{ $project->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-danger text-start">
                                            Are You Sure Do Want Delete Project <b>{{ $project->name }}</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="button" wire:click='delete({{ $project->id }})'
                                                    class="btn btn-sm btn-danger" data-bs-dismiss="modal">Delete
                                                Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="bg-info rounded text-center py-2">Not Have Any Projects.</div>
            @endif


            </tbody>
        </table>
    </div>
</div>
