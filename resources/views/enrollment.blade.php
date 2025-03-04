@extends('layouts.dashboardTemp')
@section('title', 'Enrollment')
@section('Pages', 'Enrollment')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4" style="margin-top: 70px;">
                    <div class="card-header pb-0" style="background: linear-gradient(to right, #1a237e, #3949ab); border-radius: 10px 10px 0 0;">
                        <h6 class="mb-0 text-white">Available Students</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead style="background-color: #f8f9fa;">
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-3" style="padding: 12px;">Student ID</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Name</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Email</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr class="border-bottom">
                                        <td class="ps-3">{{ $student->student_id }}</td>
                                        <td class="ps-2">{{ $student->name }}</td>
                                        <td class="ps-2">{{ $student->email }}</td>
                                        <td class="ps-2">
                                            <button class="btn bg-gradient-warning btn-sm" onclick="enrollStudent({{ $student->id }})">
                                                Enroll
                                            </button>
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

        <!-- Enrolled Students Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0" style="background: linear-gradient(to right, #1a237e, #3949ab); border-radius: 10px 10px 0 0;">
                        <h6 class="mb-0 text-white">Enrolled Students</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead style="background-color: #f8f9fa;">
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-3" style="padding: 12px;">Student ID</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Name</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Enrolled Subjects</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enrolledStudents as $student)
                                    <tr class="border-bottom">
                                        <td class="ps-3">{{ $student->student_id }}</td>
                                        <td class="ps-2">{{ $student->name }}</td>
                                        <td class="ps-2">
                                            @foreach($student->subjects as $subject)
                                                <span class="badge bg-primary">{{ $subject->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="ps-2">
                                            <button class="btn bg-gradient-primary btn-sm" onclick="manageSubjects({{ $student->id }})">
                                                Manage Subjects
                                            </button>
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

<!-- Manage Subjects Modal -->
<div class="modal fade" id="manageSubjectsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Subjects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="subjectForm" action="{{ route('enrollment.subjects') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" id="modalStudentId">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select Subjects</label>
                        @foreach($subjects as $subject)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subjects[]" 
                                   value="{{ $subject->id }}" id="subject{{ $subject->id }}">
                            <label class="form-check-label" for="subject{{ $subject->id }}">
                                {{ $subject->name }} ({{ $subject->subject_code }})
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-warning">Update Subjects</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reminder Modal -->
<div class="modal fade" id="reminderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subject Unenrollment Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-exclamation-circle text-warning" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center">You are about to unenroll from <span id="subjectName" class="fw-bold"></span></p>
                <p class="text-center text-muted">Click OK to proceed with the changes.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn bg-gradient-warning" id="confirmUnenroll">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Enrollment Modal -->
<div class="modal fade" id="enrollmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enroll Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="enrollmentForm" action="{{ route('enrollment.enroll') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" id="enrollStudentId">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select Subjects</label>
                        @foreach($subjects as $subject)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subjects[]" 
                                   value="{{ $subject->id }}" id="enrollSubject{{ $subject->id }}">
                            <label class="form-check-label" for="enrollSubject{{ $subject->id }}">
                                {{ $subject->name }} ({{ $subject->subject_code }})
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-warning">Enroll</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .bg-gradient-warning {
        background: linear-gradient(310deg, #ea580c, #facc15);
        color: white;
        border: none;
    }
    
    .bg-gradient-warning:hover {
        background: linear-gradient(310deg, #c2410c, #eab308);
        transform: translateY(-1px);
    }

    .bg-gradient-primary {
        background: linear-gradient(310deg, #ea580c, #facc15);
        color: white;
        border: none;
    }

    .bg-gradient-primary:hover {
        background: linear-gradient(310deg, #c2410c, #eab308);
        transform: translateY(-1px);
    }

    .badge.bg-primary {
        background: linear-gradient(310deg, #ea580c, #facc15) !important;
    }

    .modal-content {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .text-warning {
        color: #ff6b00 !important;
    }

    .bg-gradient-warning {
        background: linear-gradient(310deg, #ff6b00, #ff8533);
        color: white;
        font-weight: 600;
    }

    .bg-gradient-warning:hover {
        background: linear-gradient(310deg, #ff5500, #ff6b00);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(255, 107, 0, 0.25);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        font-weight: 600;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        color: white;
    }
</style>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function enrollStudent(studentId) {
    document.getElementById('enrollStudentId').value = studentId;
    const enrollmentModal = new bootstrap.Modal(document.getElementById('enrollmentModal'));
    enrollmentModal.show();
}

document.getElementById('enrollmentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Disable submit button to prevent double submission
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
            text: 'Error enrolling student'
        });
    })
    .finally(() => {
        submitButton.disabled = false;
    });
});

function manageSubjects(studentId) {
    document.getElementById('modalStudentId').value = studentId;
    
    // Fetch current subjects for this student
    fetch(`/api/student/${studentId}/subjects`)
        .then(response => response.json())
        .then(data => {
            // Reset all checkboxes first
            document.querySelectorAll('#subjectForm input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
                
                // Add change event listener to each checkbox
                checkbox.addEventListener('change', function(e) {
                    if (this.checked) return; // Only show modal when unchecking
                    
                    e.preventDefault(); // Prevent immediate unchecking
                    this.checked = true; // Keep checked temporarily
                    
                    // Store reference to current checkbox
                    window.currentCheckbox = this;
                    
                    // Get subject name
                    const subjectName = this.nextElementSibling.textContent;
                    document.getElementById('subjectName').textContent = subjectName;
                    
                    // Show reminder modal
                    const reminderModal = new bootstrap.Modal(document.getElementById('reminderModal'));
                    reminderModal.show();
                });
            });
            
            // Check boxes for enrolled subjects
            data.forEach(subjectId => {
                const checkbox = document.getElementById(`subject${subjectId}`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
            
            // Show the manage subjects modal
            const manageModal = new bootstrap.Modal(document.getElementById('manageSubjectsModal'));
            manageModal.show();
        });
}

// Handle OK button click in reminder modal
document.getElementById('confirmUnenroll').addEventListener('click', function() {
    if (window.currentCheckbox) {
        window.currentCheckbox.checked = false;
    }
    
    // Close the reminder modal
    const reminderModal = bootstrap.Modal.getInstance(document.getElementById('reminderModal'));
    reminderModal.hide();
    
    // Show the manage subjects modal again
    const manageModal = new bootstrap.Modal(document.getElementById('manageSubjectsModal'));
    manageModal.show();
});

// When reminder modal is closed with Cancel, keep checkbox checked
document.getElementById('reminderModal').addEventListener('hidden.bs.modal', function (event) {
    if (event.target.querySelector('#confirmUnenroll').clicked) return;
    
    // Show the manage subjects modal again
    const manageModal = new bootstrap.Modal(document.getElementById('manageSubjectsModal'));
    manageModal.show();
});

document.getElementById('subjectForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Disable submit button to prevent double submission
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
            text: 'Error managing subjects'
        });
    })
    .finally(() => {
        submitButton.disabled = false;
    });
});
</script>
@endpush