@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-primary">
                    <div class="card-body p-2 text-light">
                        <h6 class="mb-3">Étudiants inscrits</h6>
                        <h2 class="text-end"><i class="bi bi-mortarboard-fill me-2"></i><span>{{ \App\Models\Student::all()->count() }}</span></h2>
{{--                        <p class="mb-0">Active Students<span class="float-end">351</span></p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-success">
                    <div class="card-body p-2 text-light">
                        <h6 class="mb-3">Teachers</h6>
                        <h2 class="text-end"><i class="bi bi-person-fill me-2"></i><span>{{ \App\Models\Teacher::all()->count() }}</span></h2>
{{--                        <p class="mb-0">Certified Teachers<span class="float-end">28</span></p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-warning">
                    <div class="card-body p-2 text-light">
                        <h6 class="mb-3">Classes</h6>
                        <h2 class="text-end"><i class=" me-2"></i><span>{{ \App\Models\Classes::all()->count() }}</span></h2>
{{--                        <p class="mb-0">Available Courses<span class="float-end">18</span></p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-danger">
                    <div class="card-body p-2 text-light">
                        <h6 class="mb-3">Matière</h6>
                        <h2 class="text-end"><i class="bi bi-book-fill me-2"></i><span>{{ \App\Models\Subjects::all()->count() }}</span></h2>
{{--                        <p class="mb-0">Total Fees Collected<span class="float-end">$98,500</span></p>--}}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
