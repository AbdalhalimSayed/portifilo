@extends('layouts.guest')

@section('content')
    <div class="d-flex align-items-center justify-content-center min-vh-100 px-3">
        <div class="card login-card shadow-lg border-0 p-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 60px; height: 60px;">
                        <i class="ri-user-smile-line fs-2"></i>
                    </div>
                    <h4 class="fw-bold text-dark"> Welcome Back</h4>
                    <p class="text-muted small">Please Enter Your Authentication Data</p>
                </div>

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="rounded bg-danger text-center py-2 text-white small mb-2">The Credinatial Is Not Match
                            Records</div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium text-secondary small"> Email</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white"><i class="ri-mail-line"></i></span>
                            <input type="email" class="form-control bg-white small" id="email"
                                placeholder="name@example.com" name="email" value="{{ old('email') }}" required>

                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label fw-medium text-secondary small mb-0"> Password</label>
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white"><i class="ri-lock-2-line"></i></span>
                            <input type="password" name="password" class="form-control bg-white" id="password"
                                placeholder="********" required>
                            <button class="btn btn-outline-secondary border-start-0 border-end" type="button"
                                id="togglePassword" style="border-color: #dee2e6;">
                                <i class="ri-eye-off-line" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>



                    <div class="d-grid mb-4">
                        <button type="submit"
                            class="btn btn-primary btn-lg fw-bold d-flex align-items-center justify-content-center gap-2">
                            Login <i class="ri-login-circle-line"></i>
                        </button>
                    </div>





                </form>
            </div>
        </div>
    </div>
@endsection
