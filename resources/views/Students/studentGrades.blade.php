@extends('layouts.dashboardTemp')

@section('title', 'Student Grades')
@section('Pages', 'Student Grades')

@section('content')
<div class="container-fluid py-4">
      <div class="search-container">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" class="search-input" placeholder="Search subjects...">
                    </div>
                </div>
    <div class="row"> 
        <div class="col-12">
            
            <div class="card mb-4">
                
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Midterm</th>
                                    <th>Finals</th>
                                    <th>Average</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student->subjects as $subject)
                                    @php
                                        $grade = $student->grades->where('subject_id', $subject->id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $subject->subject_code }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $grade->midterm ?? 'N/A' }}</td>
                                        <td>{{ $grade->finals ?? 'N/A' }}</td>
                                        <td>{{ $grade->average ?? 'N/A' }}</td>
                                        <td>
                                            @if($grade)
                                                <span class="badge badge-sm bg-gradient-{{ $grade->remarks === 'Passed' ? 'success' : 'danger' }}">
                                                    {{ $grade->remarks }}
                                                </span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                                            @endif
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
                const cellText = cell.textContent.trim().toLowerCase();
                if (cellText.includes(searchTerm)) {
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