@extends('admin.layouts.app')
@section("title", "Dashboard")

@section('head-title', 'Dashboard')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2">
        <div class="d-flex flex-column">
            <h1 class="fw-bold text-dark mb-1">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-secondary mb-0">Here's a summary of your portfolio performance.</p>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white">
                <div class="d-flex flex-column gap-2">
                    <span class="text-secondary fw-medium">Total Projects</span>
                    <h2 class="fw-bold display-6 mb-0 text-dark">{{ Auth::user()->projects->count() }}</h2>

                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white">
                <div class="d-flex flex-column gap-2">
                    <span class="text-secondary fw-medium">Total Skills</span>
                    <h2 class="fw-bold display-6 mb-0 text-dark">{{ count(Auth::user()->profile?->tech_skills ?? []) }}</h2>

                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white">
                <div class="d-flex flex-column gap-2">
                    <span class="text-secondary fw-medium">Portfolio Views</span>
                    <h2 class="fw-bold display-6 mb-0 text-dark">{{ Auth::user()->profile?->views ?? 0}}</h2>

                </div>
            </div>
        </div>


    </div>
@endsection
