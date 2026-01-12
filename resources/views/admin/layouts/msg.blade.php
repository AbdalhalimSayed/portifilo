@session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success: </strong> {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession


@session('warning')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning: </strong> {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession

@session('danger')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Danger: </strong> {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession
