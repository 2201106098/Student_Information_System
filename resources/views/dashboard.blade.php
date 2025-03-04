@extends('layouts.dashboardTemp')

@section('title', 'Dashboard')
@section('Pages', 'Dashboard')

@section('content')
<div class="container-fluid py-4" style="margin-top: 20px; padding-top: 30px;">
    <!-- Dashboard Header Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card overflow-hidden" style="background: linear-gradient(to right, #1a237e, #3949ab); border-left: 5px solid #ff6b00; margin-top: 50px;">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-7">
                            <h2 class="text-white font-weight-bold mb-0">Welcome to Student Information System</h2>
                            <p class="text-white opacity-8 mb-0">Manage your students and educational data efficiently</p>
                            <div class="mt-4">
                                <a href="#recent-students" class="btn bg-white text-dark font-weight-bold mb-0">
                                    <i class="fas fa-users me-2"></i> View Students
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 text-end d-none d-lg-block">
                            <img src="{{ asset('assets/img/Shield_logo_of_Bukidnon_State_University.png') }}" 
                                 class="img-fluid" 
                                 alt="BukSU Shield Logo"
                                 style="max-height: 160px; opacity: 1;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Total Students</p>
                                <h5 class="font-weight-bolder mb-0">{{ count($recentStudents) }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Active Students</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $recentStudents->where('status', 'active')->count() }}
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
        
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Inactive Students</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $recentStudents->where('status', '!=', 'active')->count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class="fas fa-user-clock text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Current Date</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ date('M d, Y') }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="fas fa-calendar text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-wrapper" style="width: 600px; margin: 20px auto; display: flex; justify-content: center;">
        <div class="input-group">
            <span class="input-group-text bg-white border-0" style="border-radius: 8px 0 0 8px;">
                <i class="fas fa-search text-primary"></i>
            </span>
            <input type="text" id="searchInput" class="form-control border-0" 
                placeholder="Search students..." style="border-radius: 0 8px 8px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        </div>
    </div>

    <!-- Recent Students Section -->
    <div class="row mt-4" id="recent-students">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0" style="background: linear-gradient(to right, #1a237e, #3949ab); border-radius: 10px 10px 0 0;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-white">Recent Students</h6>
                    </div>
                </div>
              
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-3" 
                                        style="background-color: #fffff; color: white; padding: 16px 12px;">Student ID</th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" 
                                        style="background-color: #1a237e; color: white; padding: 16px 12px;">Name</th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" 
                                        style="background-color: #1a237e; color: white; padding: 16px 12px;">Email</th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" 
                                        style="background-color: #1a237e; color: white; padding: 16px 12px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentStudents as $student)
                                <tr class="border-bottom">
                                    <td>
                                        <div class="d-flex px-3 py-2">
                                            <div class="icon-box me-3 bg-light rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-id-card text-primary"></i>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $student->student_id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $student->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ $student->email }}</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-sm {{ $student->status === 'active' ? 'bg-gradient-success' : 'bg-gradient-secondary' }}" 
                                              style="padding: 8px 12px; font-size: 0.75rem; font-weight: 600; border-radius: 6px;">
                                            {{ ucfirst($student->status) }}
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
    
    <!-- Footer info -->
    <footer class="footer pt-3">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © {{ date('Y') }} Student Information System
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('.table tbody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach(row => {
            let found = false;
            const cells = row.getElementsByTagName('td');
            
            for (let cell of cells) {
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    found = true;
                    break;
                }
            }
            
            row.style.display = found ? '' : 'none';
        });
    });
});
</script>
@endsection