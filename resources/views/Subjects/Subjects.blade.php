@extends('layouts.dashboardTemp')
@section('title', 'Subjects')
@section('Pages', 'Subjects')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4" style="margin-top: 70px;">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between" style="background: linear-gradient(to right, #1a237e, #3949ab); border-radius: 10px 10px 0 0;">
                        <h6 class="mb-0 text-white">Subject Lists</h6>
                        <button type="button" class="btn btn-add-subject" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                            <i class="fas fa-plus me-2"></i>
                            <span>Add Subject</span>
                        </button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr style="background-color: #f8f9fa;">
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-3" style="padding: 12px;">Subject Code</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Name</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Description</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Units</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Schedule</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9 ps-2" style="padding: 12px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                    <tr class="border-bottom">
                                        <td class="ps-3">{{ $subject->subject_code }}</td>
                                        <td class="ps-2">{{ $subject->name }}</td>
                                        <td class="ps-2">{{ $subject->description }}</td>
                                        <td class="ps-2">{{ $subject->units }}</td>
                                        <td class="ps-2">{{ $subject->schedule }}</td>
                                        <td class="ps-2">
                                            <button class="btn btn-edit-subject btn-sm" 
                                                    onclick="editSubject('{{ $subject->id }}', '{{ $subject->subject_code }}', '{{ $subject->name }}', '{{ $subject->description }}', '{{ $subject->units }}', '{{ $subject->schedule }}')">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form id="delete-form-{{ $subject->id }}" action="{{ route('subjects.destroy', $subject) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-delete-subject btn-sm" 
                                                        onclick="confirmDelete('delete-form-{{ $subject->id }}')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $subjects->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addSubjectForm" action="{{ route('subjects.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Subject Code</label>
                        <input type="text" class="form-control" name="subject_code" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Units</label>
                        <input type="number" class="form-control" name="units" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Schedule</label>
                        <input type="text" class="form-control" name="schedule">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Subject Modal -->
<div class="modal fade" id="editSubjectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editSubjectForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Subject Code</label>
                        <input type="text" class="form-control" name="subject_code" id="edit_subject_code" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Units</label>
                        <input type="number" class="form-control" name="units" id="edit_units" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Schedule</label>
                        <input type="text" class="form-control" name="schedule" id="edit_schedule">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-warning">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function editSubject(id, subject_code, name, description, units, schedule) {
    const form = document.getElementById('editSubjectForm');
    form.action = `/subjects/${id}`;
    
    document.getElementById('edit_subject_code').value = subject_code;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_units').value = units;
    document.getElementById('edit_schedule').value = schedule;
    
    const editModal = new bootstrap.Modal(document.getElementById('editSubjectModal'));
    editModal.show();
}

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
            const submitButton = form.querySelector('button[type="button"]');
            submitButton.disabled = true;
            
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
                        text: data.message || 'Error deleting subject'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error deleting subject'
                });
            })
            .finally(() => {
                submitButton.disabled = false;
            });
        }
    });
    return false;
}

// Add Subject Form Handler
document.getElementById('addSubjectForm').addEventListener('submit', function(e) {
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
                text: data.message || 'Error adding subject'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error adding subject'
        });
    })
    .finally(() => {
        submitButton.disabled = false;
    });
});

// Edit Subject Form Handler
document.getElementById('editSubjectForm').addEventListener('submit', function(e) {
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
                text: data.message || 'Error updating subject'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error updating subject'
        });
    })
    .finally(() => {
        submitButton.disabled = false;
    });
});
</script>
@endpush

<style>
    /* Add Subject Button Styling */
    .card-header {
        padding: 1rem 1.5rem !important;
    }

    .btn-add-subject {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        margin-left: auto;
    }

    .btn-add-subject:hover {
        background: #ff6b00;
        color: white;
        border-color: #ff6b00;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(255, 107, 0, 0.2);
    }

    .btn-add-subject i {
        font-size: 0.875rem;
    }

    .btn-add-subject:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(255, 107, 0, 0.2);
    }

    /* Edit Button Styling */
    .btn-edit-subject {
        background: linear-gradient(310deg, #ff6b00, #ff8533);
        color: white;
        font-weight: 600;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-edit-subject:hover {
        background: linear-gradient(310deg, #ff5500, #ff6b00);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(255, 107, 0, 0.25);
    }

    .btn-edit-subject:active {
        transform: translateY(0);
    }

    /* Delete Button Styling */
    .btn-delete-subject {
        background: linear-gradient(310deg, #dc2626, #ef4444);
        color: white;
        font-weight: 600;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        margin-left: 0.5rem;
    }

    .btn-delete-subject:hover {
        background: linear-gradient(310deg, #b91c1c, #dc2626);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(220, 38, 38, 0.25);
    }

    .btn-delete-subject:active {
        transform: translateY(0);
    }

    /* Icons in buttons */
    .btn-edit-subject i,
    .btn-delete-subject i {
        margin-right: 4px;
    }
</style>

@endsection