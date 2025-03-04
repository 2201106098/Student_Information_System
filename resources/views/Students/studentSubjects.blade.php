@extends('layouts.dashboardTemp')

@section('title', 'Student Subjects')
@section('Pages', 'Student Subjects')

@section('content')
<div class="search-container">
    <div class="search-wrapper">
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="searchInput" class="search-input" placeholder="Search subjects...">
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4" style="margin-top: 30px;">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Units</th>
                                    <th>Schedule</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student->subjects as $subject)
                                <tr>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->units }}</td>
                                    <td>{{ $subject->schedule ?? 'TBA' }}</td>
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
.search-wrapper {
    position: relative;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
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

.search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #1a237e;
    opacity: 0.7;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach(row => {
            const subjectCode = row.cells[0].textContent.toLowerCase();
            const subjectName = row.cells[1].textContent.toLowerCase();
            const units = row.cells[2].textContent.toLowerCase();
            const schedule = row.cells[3].textContent.toLowerCase();

            const matches = 
                subjectCode.includes(searchTerm) || 
                subjectName.includes(searchTerm) || 
                units.includes(searchTerm) || 
                schedule.includes(searchTerm);

            row.style.display = matches ? '' : 'none';
        });
    });
});
</script>

@endsection