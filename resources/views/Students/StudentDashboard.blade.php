@extends('layouts.dashboardTemp')

@section('title', 'Student Dashboard')
@section('Pages', 'Student Dashboard')

@push('styles')
<style>
    /* Navbar styling */
    .navbar-main {
        background-color: #1a237e !important;
        border-bottom: 3px solid #ff6b00 !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        position: fixed !important;
        width: 100% !important;
        z-index: 1 !important;
        top: 0 !important;
        height: 70px !important;
    }

    /* Main content wrapper */
    .main-content-wrapper {
        margin-top: 70px !important;
        padding: 20px !important;
        margin-left: 250px !important;
        width: calc(100% - 250px) !important;
        position: relative !important;
        z-index: 2 !important;
        min-height: calc(100vh - 70px) !important;
    }

    /* Stats card specific styling */
    .stats-card {
        background: white !important;
        border-radius: 8px !important;
        box-shadow: 0 0 10px rgba(0,0,0,0.1) !important;
        position: relative !important;
        z-index: 1040 !important;
        margin-bottom: 1rem !important;
        margin-top: 20px !important;
    }

    /* Numbers container */
    .numbers {
        position: relative !important;
        z-index: 1040 !important;
        padding: 10px !important;
    }

    /* Force new stacking context */
    .col-xl-3 {
        transform: translateZ(0) !important;
        position: relative !important;
        z-index: 3 !important;
    }

    /* Container adjustments */
    .container-fluid {
        padding: 0 20px !important;
    }

    /* Row adjustments */
    .row {
        margin: 0 !important;
    }

    /* Card body adjustments */
    .card-body {
        padding: 1rem !important;
    }

    /* Professional Table Styling */
    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        overflow: hidden;
        width: 90%;
    }

    .card-header {
        background: linear-gradient(45deg, #1a237e, #283593);
        padding: 15px 20px;
        border-bottom: none;
    }

    .card-header h6 {
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .table thead th {
        background: #f5f6fa;
        color: #1a237e;
        padding: 12px 20px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e0e0e0;
    }

    .table thead th:first-child {
        border-top-left-radius: 8px !important;
    }

    .table thead th:last-child {
        border-top-right-radius: 8px !important;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9ff;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .table tbody td {
        padding: 16px 24px;
        vertical-align: middle;
        border-bottom: 1px solid #edf2f7;
        color: #2d3748;
        font-size: 0.95rem;
    }

    /* Status Badge Styling */
    .status-badge {
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        box-shadow: 0 2px 4px rgba(76, 175, 80, 0.2);
        display: inline-block;
    }

    /* Table Responsive Styling */
    .table-responsive {
        padding: 0;
        border-radius: 12px;
    }

    /* Pagination Styling */
    .pagination-container {
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 5px;
    }

    .page-item {
        margin: 0 2px;
    }

    .page-link {
        padding: 8px 16px;
        border-radius: 6px;
        color: #1a237e;
        background: #fff;
        border: 1px solid #e0e0e0;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .page-link:hover {
        background: #f8f9ff;
        color: #1a237e;
        border-color: #1a237e;
    }

    .page-item.active .page-link {
        background: linear-gradient(45deg, #1a237e, #283593);
        color: white;
        border-color: #1a237e;
    }

    .page-item.disabled .page-link {
        background: #f5f6fa;
        color: #a0aec0;
        cursor: not-allowed;
    }

    /* Search Bar Styling */
    .search-container {
        width: 90%;
        margin: 20px auto 0;
    }

    .search-wrapper {
        position: relative;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #1a237e;
        opacity: 0.7;
    }

    .search-input {
        width: 100%;
        padding: 12px 40px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input:focus {
        border-color: #1a237e;
        outline: none;
        box-shadow: 0 0 0 3px rgba(26, 35, 126, 0.1);
    }

    /* Add after line 127 (after the table tbody tr styles) */
    .table tbody tr.enrolled {
        background-color: rgba(76, 175, 80, 0.1);
    }

    .table tbody tr.enrolled:hover {
        background-color: rgba(76, 175, 80, 0.2);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(76, 175, 80, 0.15);
    }

    /* Search functionality specific styles */
    .clear-search {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #666;
        cursor: pointer;
        padding: 5px;
        display: none;
    }

    .clear-search:hover {
        color: #1a237e;
    }

    /* No results styling */
    #noResultsRow td {
        background-color: #f8f9fa;
    }

    #noResultsRow i {
        color: #1a237e;
        opacity: 0.5;
    }

    #noResultsRow p {
        font-size: 0.9rem;
        color: #666;
    }
</style>
@endpush

@section('content')

<!-- Add a wrapper div -->
<div class="main-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Search Bar -->
            <div class="col-12">
                <div class="search-container">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" class="search-input" placeholder="Search subjects by code, name, or schedule...">
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="col-12">
                <div class="table-container">
                    <div class="card mb-4">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Schedule</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="subjectsTableBody">
                                    @foreach($enrolledSubjects as $subject)
                                    <tr class="enrolled">
                                        <td>{{ $subject->subject_code }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->schedule ?? 'TBA' }}</td>
                                        <td>
                                            <span class="status-badge">Enrolled</span>
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
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#subjectsTableBody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();

        tableRows.forEach(row => {
            const subjectCode = row.cells[0].textContent.toLowerCase();
            const subjectName = row.cells[1].textContent.toLowerCase();
            const schedule = row.cells[2].textContent.toLowerCase();

            // Check if any of the cell contents match the search term
            const matches = 
                subjectCode.includes(searchTerm) || 
                subjectName.includes(searchTerm) || 
                schedule.includes(searchTerm);

            // Show/hide the row based on the search
            row.style.display = matches ? '' : 'none';
        });

        // Show "No results found" message if no matches
        const visibleRows = document.querySelectorAll('#subjectsTableBody tr[style=""]').length;
        const noResultsRow = document.getElementById('noResultsRow');
        
        if (visibleRows === 0) {
            if (!noResultsRow) {
                const tbody = document.getElementById('subjectsTableBody');
                const newRow = document.createElement('tr');
                newRow.id = 'noResultsRow';
                newRow.innerHTML = `
                    <td colspan="4" class="text-center py-3">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-search fa-2x text-muted mb-2"></i>
                            <p class="text-muted mb-0">No subjects found matching "${searchTerm}"</p>
                        </div>
                    </td>
                `;
                tbody.appendChild(newRow);
            }
        } else if (noResultsRow) {
            noResultsRow.remove();
        }
    });
});
</script>
@endpush
