@extends('layouts.app')

@section('content')
<style>
    .dashboard-stat-card {
        border: none;
        border-radius: 1rem;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: default;
        overflow: hidden;
    }
    .dashboard-stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.1);
    }
    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.7;
    }
    .list-group-item-action-custom {
        transition: background 0.15s;
        border-left: 3px solid transparent;
    }
    .list-group-item-action-custom:hover {
        background-color: #f8f9fa;
        border-left-color: #198754;
        transform: translateX(4px);
    }
    .welcome-banner {
        background: #f0fdf4;
        border-radius: 1.5rem;
        border-left: 6px solid #198754;
    }
    .btn-outline-primary-custom {
        border-radius: 2rem;
        padding: 0.4rem 1.2rem;
        border-color: #871054;
        color: #871054;
    }
    .btn-outline-primary-custom:hover {
        background-color: #871054;
        color: white;
    }
    .table-appointments th {
        background-color: #f8f9fc;
    }
    .status-badge {
        font-size: 0.75rem;
        padding: 0.35rem 0.75rem;
        border-radius: 2rem;
    }
    .quick-action-icon {
        width: 48px;
        height: 48px;
        background-color: rgba(135, 16, 84, 0.1);
        border-radius: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #871054;
        transition: all 0.2s;
    }
    .quick-action-card:hover .quick-action-icon {
        background-color: #871054;
        color: white;
        transform: scale(1.05);
    }
</style>

<div class="container py-4">
    <!-- Welcome Banner -->
    <div class="welcome-banner p-4 mb-4 d-flex flex-wrap justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-1">Welcome back, {{ session('name') ?? 'John' }} 👋</h2>
            <p class="text-muted mb-0">Your health journey at a glance – stay on top of your care.</p>
        </div>
        <div class="mt-2 mt-sm-0">
            <button class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
                <i class="bi bi-plus-circle"></i> New Appointment
            </button>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-5">
        <div class="col-sm-6 col-lg-3">
            <div class="card dashboard-stat-card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1 small">Total Appointments</p>
                            <h3 class="fw-bold mb-0">12</h3>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> +2 this month</small>
                        </div>
                        <div class="stat-icon text-success"><i class="bi bi-calendar-check"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card dashboard-stat-card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1 small">Prescriptions</p>
                            <h3 class="fw-bold mb-0">5</h3>
                            <small class="text-warning">2 expiring soon</small>
                        </div>
                        <div class="stat-icon text-primary"><i class="bi bi-capsule"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card dashboard-stat-card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1 small">Lab Reports</p>
                            <h3 class="fw-bold mb-0">3</h3>
                            <small class="text-info">New result available</small>
                        </div>
                        <div class="stat-icon text-info"><i class="bi bi-file-earmark-medical"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card dashboard-stat-card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1 small">Health Points</p>
                            <h3 class="fw-bold mb-0">2450</h3>
                            <small class="text-success"><i class="bi bi-gift"></i> Redeemable</small>
                        </div>
                        <div class="stat-icon text-warning"><i class="bi bi-star-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Upcoming Appointments (Left) -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h5 class="fw-bold mb-0"><i class="bi bi-calendar-week text-success me-2"></i>Upcoming Appointments</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <table>
                                    <th>Doctor</th>
                                    <th>Date & Time</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="bi bi-person-circle me-2"></i> Dr. Anne Wanjiku</td>
                                    <td>May 15, 2025 · 10:30 AM</td>
                                    <td><span class="badge bg-light text-dark">Virtual</span></td>
                                    <td><span class="status-badge bg-success bg-opacity-10 text-success">Confirmed</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#appointmentDetailModal">Details</button></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-person-circle me-2"></i> Dr. James Otieno</td>
                                    <td>May 20, 2025 · 2:00 PM</td>
                                    <td><span class="badge bg-light text-dark">In-person</span></td>
                                    <td><span class="status-badge bg-warning bg-opacity-10 text-warning">Pending</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary rounded-pill">Reschedule</button></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-person-circle me-2"></i> Dr. Faith Muthoni</td>
                                    <td>May 25, 2025 · 9:00 AM</td>
                                    <td><span class="badge bg-light text-dark">Lab Follow-up</span></td>
                                    <td><span class="status-badge bg-success bg-opacity-10 text-success">Confirmed</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary rounded-pill">Join</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-2">
                        <a href="#" class="text-decoration-none small">View all appointments <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Recent Medical Records -->
            <div class="card shadow-sm border-0 rounded-4 mt-4">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h5 class="fw-bold mb-0"><i class="bi bi-archive text-success me-2"></i>Recent Medical Records</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item list-group-item-action-custom d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-file-pdf text-danger me-2"></i> Blood Test Results - April 2025</div>
                            <a href="#" class="btn btn-sm btn-link text-success">Download</a>
                        </div>
                        <div class="list-group-item list-group-item-action-custom d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-file-image text-primary me-2"></i> Chest X-Ray - March 2025</div>
                            <a href="#" class="btn btn-sm btn-link text-success">View</a>
                        </div>
                        <div class="list-group-item list-group-item-action-custom d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-file-text text-secondary me-2"></i> Consultation Summary - Dr. Wanjiku</div>
                            <a href="#" class="btn btn-sm btn-link text-success">Read</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Quick Actions + Health Tip -->
        <div class="col-lg-5">
            <!-- Quick Actions Cards -->
            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h5 class="fw-bold mb-0"><i class="bi bi-lightning-charge text-success me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="quick-action-card text-center p-3 rounded-3 border bg-white" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
                                <div class="quick-action-icon mx-auto mb-2"><i class="bi bi-calendar-plus"></i></div>
                                <p class="mb-0 fw-semibold small">Book Appointment</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="quick-action-card text-center p-3 rounded-3 border bg-white" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#refillModal">
                                <div class="quick-action-icon mx-auto mb-2"><i class="bi bi-capsule"></i></div>
                                <p class="mb-0 fw-semibold small">Request Refill</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="quick-action-card text-center p-3 rounded-3 border bg-white" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#labModal">
                                <div class="quick-action-icon mx-auto mb-2"><i class="bi bi-droplet"></i></div>
                                <p class="mb-0 fw-semibold small">Book Lab Test</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="quick-action-card text-center p-3 rounded-3 border bg-white" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#messageModal">
                                <div class="quick-action-icon mx-auto mb-2"><i class="bi bi-chat-dots"></i></div>
                                <p class="mb-0 fw-semibold small">Message Doctor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Tip of the Day -->
            <div class="card shadow-sm border-0 rounded-4 bg-success bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0"><i class="bi bi-lightbulb fs-1 text-success"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fw-bold">Health Tip</h6>
                            <p class="small mb-0">Drink at least 2-3 litres of water daily to stay hydrated, especially with the current warm weather in Kenya. 💧</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Support -->
            <div class="card shadow-sm border-0 rounded-4 mt-4">
                <div class="card-body text-center">
                    <i class="bi bi-headset fs-1 text-secondary"></i>
                    <h6 class="fw-bold mt-2">Need help?</h6>
                    <p class="small text-muted">Our support team is available 24/7</p>
                    <button class="btn btn-sm btn-outline-success rounded-pill" data-bs-toggle="modal" data-bs-target="#supportModal"><i class="bi bi-chat-right-text"></i> Contact Support</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== MODALS (Interactive) ==================== -->

<!-- Book Appointment Modal -->
<div class="modal fade" id="bookAppointmentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Book New Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('BookAppointment') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Doctor</label>
                        <select class="form-select" name="doctor">
                            <option>--select--</option>
                            @foreach ($doctors as $doc )
                            <option value="{{ $doc['Doctor_No_'] }}">{{ $doc['Name'] }} - {{ $doc['Specialization_Description'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Appointment Type</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="virtual" id="virtual" checked>
                                <label class="form-check-label" for="virtual">Virtual</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="in-person" id="inperson">
                                <label class="form-check-label" for="inperson">In-person</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preferred Date</label>
                        <input type="date" name="date" class="form-control" min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Time Slot</label>
                        <select class="form-select" name="time">
                            <option value="9:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="2:00">2:00 PM</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Symptoms (optional)</label>
                        <textarea rows="2" name="symptoms" class="form-control" placeholder="Brief description..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-pill">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Refill Request Modal -->
<div class="modal fade" id="refillModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Request Prescription Refill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Medication</label>
                        <select class="form-select">
                            <option>Amoxicillin 500mg</option>
                            <option>Lisinopril 10mg</option>
                            <option>Paracetamol 500mg</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pharmacy of Choice</label>
                        <select class="form-select">
                            <option>AfyaLink Pharmacy - Nairobi CBD</option>
                            <option>Good Health Chemist - Westlands</option>
                            <option>MediQuick - Mombasa Road</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label fw-semibold">Delivery Address</label>
                        <input type="text" class="form-control" placeholder="Your address" value="Kilimani, Nairobi">
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-pill">Request Refill</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Lab Test Modal -->
<div class="modal fade" id="labModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Book Lab Test</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Test Type</label>
                        <select class="form-select">
                            <option>Complete Blood Count</option>
                            <option>Lipid Profile</option>
                            <option>Blood Glucose</option>
                            <option>Urinalysis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preferred Lab</label>
                        <select class="form-select">
                            <option>Lancet Lab - Hurlingham</option>
                            <option>Pathcare - Upper Hill</option>
                            <option>AfyaLink Mobile Lab</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-pill">Book Test</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Message Doctor Modal -->
<div class="modal fade" id="messageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Message Your Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Doctor</label>
                        <select class="form-select">
                            <option>Dr. Anne Wanjiku</option>
                            <option>Dr. James Otieno</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Type your medical query..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-pill">Send Message</button>
                </form>
                <p class="small text-muted mt-3 text-center">Your doctor will reply within 24 hours.</p>
            </div>
        </div>
    </div>
</div>

<!-- Support Modal -->
<div class="modal fade" id="supportModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-body text-center p-4">
                <i class="bi bi-chat-heart fs-1 text-success"></i>
                <h5 class="fw-bold mt-2">AfyaLink Care Support</h5>
                <p class="small">Call: +254 700 123 456<br>Email: support@afyalink.ke<br>Live chat: Open 24/7</p>
                <button class="btn btn-success rounded-pill" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Appointment Detail Modal example -->
<div class="modal fade" id="appointmentDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><span>Doctor:</span><strong>Dr. Anne Wanjiku</strong></li>
                    <li class="list-group-item d-flex justify-content-between"><span>Date:</span><strong>May 15, 2025</strong></li>
                    <li class="list-group-item d-flex justify-content-between"><span>Time:</span><strong>10:30 AM</strong></li>
                    <li class="list-group-item d-flex justify-content-between"><span>Type:</span><strong>Virtual Consultation</strong></li>
                    <li class="list-group-item d-flex justify-content-between"><span>Status:</span><span class="badge bg-success">Confirmed</span></li>
                </ul>
                <div class="mt-3 d-grid">
                    <button class="btn btn-outline-success rounded-pill">Join Video Call</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection