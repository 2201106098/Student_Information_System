@extends('layouts.dashboardTemp')
@section('title', 'Grades')
@section('Pages', 'Grades')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4" style="margin-top: 80px;">
                    <div class="card-header pb-0" style="background: linear-gradient(to right, #1a237e, #3949ab); border-radius: 10px 10px 0 0;">
                        <h6 class="mb-0 text-white">Student Grades</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead style="background-color: #f8f9fa;">
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-3" style="padding: 12px;">Student ID</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Name</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Subject</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Midterm</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Finals</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Average</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Remarks</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        @foreach($student->subjects as $subject)
                                            @php
                                                $grade = $student->grades->where('subject_id', $subject->id)->first();
                                            @endphp
                                            <tr class="border-bottom">
                                                <td class="ps-3">{{ $student->student_id }}</td>
                                                <td class="ps-2">{{ $student->name }}</td>
                                                <td class="ps-2">{{ $subject->name }}</td>
                                                <td class="ps-2">{{ $grade ? $grade->midterm : '-' }}</td>
                                                <td class="ps-2">{{ $grade ? $grade->finals : '-' }}</td>
                                                <td class="ps-2">{{ $grade ? number_format($grade->average, 2) : '-' }}</td>
                                                <td class="ps-2">
                                                    @if($grade)
                                                        <span class="badge bg-{{ $grade->remarks === 'Passed' ? 'success' : 'danger' }}">
                                                            {{ $grade->remarks }}
                                                        </span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="ps-2">
                                                    <button class="btn btn-grade-action btn-sm" 
                                                            onclick="manageGrades({{ $student->id }}, {{ $subject->id }}, '{{ $grade ? $grade->midterm : '' }}', '{{ $grade ? $grade->finals : '' }}')">
                                                        {{ $grade ? 'Edit' : 'Add' }} Grades
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
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

<!-- Grade Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Grades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="gradeForm" action="{{ route('grades.store') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" id="grade_student_id">
                <input type="hidden" name="subject_id" id="grade_subject_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="midterm" class="form-label">Midterm Grade</label>
                        <input type="text" class="form-control grade-input" id="midterm" name="midterm" 
                               required pattern="^(?:INC|[0-4](?:\.(?:00?|25|50?|75)|\.0)|5\.0?)$">
                        <div class="invalid-feedback">
                            Please enter a valid grade (1.0, 1.25, 1.5, 1.75, etc.) or INC
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="finals" class="form-label">Finals Grade</label>
                        <input type="text" class="form-control grade-input" id="finals" name="finals" 
                               required pattern="^(?:INC|[0-4](?:\.(?:00?|25|50?|75)|\.0)|5\.0?)$">
                        <div class="invalid-feedback">
                            Please enter a valid grade (1.0, 1.25, 1.5, 1.75, etc.) or INC
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-warning">Save Grades</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function manageGrades(studentId, subjectId, midterm, finals) {
    document.getElementById('grade_student_id').value = studentId;
    document.getElementById('grade_subject_id').value = subjectId;
    document.getElementById('midterm').value = midterm;
    document.getElementById('finals').value = finals;
    
    const gradeModal = new bootstrap.Modal(document.getElementById('gradeModal'));
    gradeModal.show();
}

document.addEventListener('DOMContentLoaded', function() {
    const gradeInputs = document.querySelectorAll('.grade-input');
    
    const validGrades = [
        '1.0', '1.25', '1.5', '1.75',
        '2.0', '2.25', '2.5', '2.75',
        '3.0', 
        '5.0'
    ];
    
    gradeInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            let value = this.value.trim().toUpperCase();
            
            // Handle 'INC' input
            if (value === 'INC') {
                this.value = 'INC';
                this.classList.remove('is-invalid');
                return;
            }
            
            // Handle numeric input
            if (value !== '') {
                const numValue = parseFloat(value);
                
                // Check if it's a valid grade
                if (isNaN(numValue) || numValue < 1.0 || numValue > 5.0) {
                    this.classList.add('is-invalid');
                } else {
                    // Format to valid grade step
                    let nearestGrade = validGrades.find(grade => 
                        parseFloat(grade) >= numValue
                    ) || '5.0';
                    
                    this.value = nearestGrade;
                    this.classList.remove('is-invalid');
                }
            }
        });
        
        // Prevent invalid characters
        input.addEventListener('keypress', function(e) {
            const char = String.fromCharCode(e.keyCode);
            
            // Allow 'I', 'N', 'C' for "INC"
            if (this.value.toUpperCase() === 'IN' && char.toUpperCase() === 'C') return;
            if (this.value === '' && char.toUpperCase() === 'I') return;
            if (this.value.toUpperCase() === 'I' && char.toUpperCase() === 'N') return;
            
            // Allow numbers and decimal point
            if (!/[\d.]/.test(char)) {
                e.preventDefault();
            }
            
            // Prevent multiple decimal points
            if (char === '.' && this.value.includes('.')) {
                e.preventDefault();
            }
        });
    });
    
    // Update form submission validation
    document.getElementById('gradeForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const midterm = document.getElementById('midterm').value.trim();
        const finals = document.getElementById('finals').value.trim();
        
        // Validate both inputs
        const isValidGrade = (grade) => {
            if (grade === 'INC') return true;
            return validGrades.includes(grade);
        };
        
        if (!isValidGrade(midterm) || !isValidGrade(finals)) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Grade',
                text: 'Please enter valid grades (1.0, 1.25, 1.5, etc.) or INC'
            });
            return;
        }
        
        // Continue with form submission if validation passes
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        
        fetch(this.action, {
            method: 'POST',
            body: new FormData(this),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error saving grades'
            });
        })
        .finally(() => {
            submitButton.disabled = false;
        });
    });
});
</script>
@endpush

<style>
    .bg-gradient-warning {
        background: linear-gradient(310deg, #1a237e, #3949ab);
        color: white;
        border: none;
    }
    
    .bg-gradient-warning:hover {
        background: linear-gradient(310deg, #151a50, #2a3a80);
        transform: translateY(-1px);
    }

    .btn-grade-action {
        background: linear-gradient(310deg, #ff6b00, #ff8533);
        color: white;
        font-weight: 600;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-grade-action:hover {
        background: linear-gradient(310deg, #ff5500, #ff6b00);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(255, 107, 0, 0.25);
    }

    .btn-grade-action:active {
        transform: translateY(0);
    }

    .modal-footer .btn.bg-gradient-warning {
        background: linear-gradient(310deg, #ff6b00, #ff8533);
        color: white;
        font-weight: 600;
        border: none;
    }

    .modal-footer .btn.bg-gradient-warning:hover {
        background: linear-gradient(310deg, #ff5500, #ff6b00);
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(255, 107, 0, 0.25);
    }

    .grade-input.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .invalid-feedback {
        display: none;
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }

    .is-invalid ~ .invalid-feedback {
        display: block;
    }
</style>

@endsection