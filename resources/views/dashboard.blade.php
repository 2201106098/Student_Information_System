@extends('layouts.dashboardTemp')

@section('title', 'Dashboard')
@section('Pages', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Students</p>
                                <h5 class="font-weight-bolder mb-0">{{ $totalStudents }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Students</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $activeStudents }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="fas fa-user-check text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Recent Students</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-whte text-xxs font-weight-bolder opacity-7">Student ID</th>
                                    <th class="text-uppercase text-whte text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-uppercase text-whte text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-uppercase text-whte text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentStudents as $student)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $student->student_id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $student->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $student->email }}</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-sm bg-gradient-{{ $student->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ $student->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Color Variables */
:root {
    --primary-orange: #ea580c;
    --primary-yellow: #facc15;
    --dark-orange: #c2410c;
    --dark-yellow: #eab308;
    --dark: #1a1a1a;
    --light: #ffffff;
}

/* Card Styling */
.card {
    background: var(--light);
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(234, 88, 12, 0.15);
}

.card-header {
    background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
    color: var(--light);
    border: none;
}

/* Table Styling */
.table thead th {
    background: var(--dark);
    color: var(--light);
    border-bottom: none;
}

.table tbody tr:hover {
    background: rgba(234, 88, 12, 0.05);
}

/* Badge Styling */
.bg-gradient-success {
    background: linear-gradient(310deg, #059669, #10b981);
}

.bg-gradient-secondary {
    background: linear-gradient(310deg, #4b5563, #6b7280);
}

/* Text Styling */
.text-xs {
    color: var(--dark);
}

.text-sm {
    font-weight: 500;
}

/* Stats Card */
.stats-card {
    background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
    color: var(--light);
    border-radius: 1rem;
    padding: 1.5rem;
}

.stats-card h5 {
    color: rgba(255, 255, 255, 0.8);
}

.stats-card h3 {
    font-size: 1.8rem;
    font-weight: 700;
}
</style>
@endsection