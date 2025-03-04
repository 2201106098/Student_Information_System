@extends('layouts.dashboardTemp')
@section('title', 'Students')
@section('Pages', 'Students')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container-fluid py-4">
        <!-- Updated search wrapper with additional margin-top -->
        <div class="search-wrapper" style="width: 600px; margin: 90px auto 20px auto; display: flex; justify-content: center;">
            <div class="input-group">
                <span class="input-group-text bg-white border-0" style="border-radius: 8px 0 0 8px;">
                    <i class="fas fa-search text-primary"></i>
                </span>
                <input type="text" id="searchInput" class="form-control border-0" 
                    placeholder="Search students..." style="border-radius: 0 8px 8px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4" style="margin-top: 20px;">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between" style="background: linear-gradient(to right, #1a237e, #3949ab); border-radius: 10px 10px 0 0;">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0 text-white">Student Lists</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn bg-white text-dark" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                <i class="fas fa-user-plus me-2"></i> Add Student
                            </button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-3" style="background-color: #1a237e; color: white; padding: 16px 12px;">Student ID</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="background-color: #1a237e; color: white; padding: 16px 12px;">Name</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="background-color: #1a237e; color: white; padding: 16px 12px;">Email</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="background-color: #1a237e; color: white; padding: 16px 12px;">Status</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="background-color: #1a237e; color: white; padding: 16px 12px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
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
                                            <span class="badge badge-sm {{ $student->status === 'active' ? 'bg-gradient-success' : 'bg-gradient-secondary' }}" style="padding: 8px 12px; font-size: 0.75rem; font-weight: 600; border-radius: 6px;">
                                                {{ ucfirst($student->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn bg-gradient-warning btn-sm" onclick="editStudent('{{ $student->id }}', '{{ $student->student_id }}', '{{ $student->name }}', '{{ $student->email }}', '{{ $student->status }}')">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form id="delete-form-{{ $student->id }}" action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn bg-gradient-danger btn-sm" onclick="confirmDelete('delete-form-{{ $student->id }}')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
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

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="modal-title text-gradient" id="addStudentModalLabel">Add New Student</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body px-md-4 py-md-4">
                <form id="addStudentForm" action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-dark">Student ID</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" 
                                   name="student_id" 
                                   class="form-control" 
                                   placeholder="Student ID" 
                                   value="{{ old('student_id') }}" 
                                   required>
                        </div>
                        <div class="error-message mt-2 text-danger"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-dark">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" 
                                   name="name" 
                                   class="form-control" 
                                   placeholder="Name" 
                                   value="{{ old('name') }}" 
                                   required>
                        </div>
                        <div class="error-message mt-2 text-danger"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-dark">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   placeholder="username@student.buksu.edu.ph" 
                                   value="{{ old('email') }}" 
                                   pattern="[a-zA-Z0-9._%+-]+@student\.buksu\.edu\.ph$"
                                   title="Please use your student.buksu.edu.ph email address"
                                   required>
                        </div>
                        <small class="form-text text-muted">Use your student.buksu.edu.ph email address</small>
                        <div class="error-message mt-2 text-danger"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-dark">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" 
                                   name="password" 
                                   class="form-control" 
                                   placeholder="Password" 
                                   required>
                        </div>
                        <div class="error-message mt-2 text-danger"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-dark">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" 
                                   name="password_confirmation" 
                                   class="form-control" 
                                   placeholder="Confirm Password" 
                                   required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-dark">Status</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="error-message mt-2 text-danger"></div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editStudentForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_student_id" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="edit_student_id" name="student_id" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" id="edit_status" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add this new success modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
                </div>
                <h5 class="modal-title mb-2">Success!</h5>
                <p class="mb-0">Student information has been updated successfully.</p>
            </div>
            <div class="modal-footer justify-content-center border-0 pt-0">
                <button type="button" class="btn bg-gradient-primary px-4" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<script>
    let errorMessages = [];
    @foreach ($errors->all() as $error)
        errorMessages.push("{{ $error }}");
    @endforeach
    alert(errorMessages.join("\n"));
</script>
@endif

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

<!-- Delete confirmation -->
<script>
function confirmDelete(formId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ea580c',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById(formId);
            
            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
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
                    text: 'Error deleting student'
                });
            });
        }
    });
}
</script>

<!-- Update the edit form submission script -->
<script>
document.getElementById('editStudentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
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
            // Hide edit modal
            const editModal = bootstrap.Modal.getInstance(document.getElementById('editStudentModal'));
            editModal.hide();
            
            // Show success modal
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            
            // Reload page when success modal is closed
            document.getElementById('successModal').addEventListener('hidden.bs.modal', function() {
                location.reload();
            }, { once: true });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Error updating student'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error updating student'
        });
    })
    .finally(() => {
        submitButton.disabled = false;
    });
});
</script>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addStudentForm = document.getElementById('addStudentForm');
    const addStudentModal = document.getElementById('addStudentModal');
    
    addStudentForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(div => div.textContent = '');
        
        // Get form data
        const formData = new FormData(this);
        const email = formData.get('email');
        
        // Validate email domain
        if (!email.endsWith('@student.buksu.edu.ph')) {
            const emailError = this.querySelector('input[name="email"]')
                                 .closest('.mb-3')
                                 .querySelector('.error-message');
            emailError.textContent = 'Please use your @student.buksu.edu.ph email address';
            return false;
        }
        
        // Submit form using AJAX
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Success handling
                // Close modal using Bootstrap
                const modal = bootstrap.Modal.getInstance(addStudentModal);
                modal.hide();
                
                // Reset form
                addStudentForm.reset();
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message
                }).then(() => {
                    // Reload page
                    window.location.reload();
                });
            } else {
                // Error handling
                throw new Error(data.message);
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: error.message || 'Something went wrong!'
            });
        });
    });
});

function editStudent(id, studentId, name, email, status) {
    // Set form action
    const form = document.getElementById('editStudentForm');
    form.action = `/students/${id}`;
    
    // Fill form fields
    document.getElementById('edit_student_id').value = studentId;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_status').value = status || 'active';
    
    // Show modal using Bootstrap Modal instance
    const editModal = new bootstrap.Modal(document.getElementById('editStudentModal'));
    editModal.show();
}

// Your existing delete confirmation function
function confirmDelete(formId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ea580c',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById(formId);
            
            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
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
                    text: 'Error deleting student'
                });
            });
        }
    });
}

// Add this at the beginning of your scripts
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');

    tableRows.forEach(row => {
        const studentId = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const status = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

        if (studentId.includes(searchValue) || 
            name.includes(searchValue) || 
            email.includes(searchValue) || 
            status.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endpush

<style>
    /* Add Student/Subject Button Styling */
    .card-header .btn.bg-gradient-primary {
        background: var(--light);
        color: var(--dark);
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .card-header .btn.bg-gradient-primary:hover {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        color: var(--light);
        border: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(234, 88, 12, 0.25);
    }

    .card-header .btn.bg-gradient-primary i {
        margin-right: 0.5rem;
    }

    .modal-content {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .text-success {
        color: #10b981 !important;
    }

    .bg-gradient-primary {
        background: linear-gradient(310deg, #ff6b00, #ff8533);
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .bg-gradient-primary:hover {
        background: linear-gradient(310deg, #ff5500, #ff6b00);
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(255, 107, 0, 0.25);
    }

    #searchInput {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        padding: 8px 12px;
        color: #1a237e;
        transition: all 0.3s ease;
    }

    #searchInput:focus {
        background-color: white;
        border-color: #3949ab;
        box-shadow: 0 0 0 0.2rem rgba(57, 73, 171, 0.25);
        outline: none;
    }

    #searchInput::placeholder {
        color: #9fa8da;
    }

    /* Update the search input styling */
    .search-wrapper .form-control {
        height: 45px;
        font-size: 0.875rem;
        background-color: white;
    }

    .search-wrapper .form-control:focus {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: none;
    }

    .search-wrapper .input-group-text {
        padding: 12px 16px;
    }

    .search-wrapper .fas {
        font-size: 1rem;
    }

    /* Add these new styles */
    .modal-content {
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .input-group {
        background: rgba(248, 249, 250, 0.7);
        border: 1px solid #e0e6ed;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.2s ease;
        margin-top: 0.25rem;
    }

    .input-group:focus-within {
        border-color: #1a237e;
        box-shadow: 0 0 0 3px rgba(26, 35, 126, 0.15);
    }

    .input-group-text {
        background: transparent;
        border: none;
        padding: 0.5rem 0.75rem;
        color: #1a237e;
        font-size: 0.9rem;
    }

    .form-control {
        border: none;
        padding: 0.5rem 0.5rem 0.5rem 0;
        background: transparent;
        font-size: 0.9rem;
        color: #344767;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .form-label {
        font-weight: 600;
        color: #344767;
        margin-bottom: 0.25rem;
        font-size: 0.85rem;
    }

    .btn-primary {
        background: #000080 !important;
        border: none;
        border-radius: 8px;
        padding: 0.6rem 1rem;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        color: white;
    }

    .btn-primary:hover {
        background: #000080 !important;
        border: 2px solid #ff8c00;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .text-gradient {
        background: linear-gradient(135deg, #1a237e, #3949ab);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .card-header {
        padding-bottom: 0.75rem;
        margin-bottom: 0.75rem;
    }

    .modal-content {
        max-width: 400px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    .modal-dialog {
        margin-top: 2rem;
    }
</style>

@endsection