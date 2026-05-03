<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/img/afyalink.jpg') }}">
    <title>{{ config('app.name', 'AfyaLink') }} – Kenya’s Digital Health Platform</title>

    <!-- Bootstrap 5 CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- Flatpickr for date inputs (if needed) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* Root variables & smooth overrides */
        :root {
            --primary-color: #198754;
            --primary-dark: #198754;
            --secondary-color: #ffffff;
            --inactive-bg: #F7F5ED;
            --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --shadow-md: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
            --transition-base: all 0.2s ease-in-out;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Lexend', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: var(--secondary-color);
            color: #1e1e2f;
        }

        /* Sticky footer */
        .main-content {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }

        /* Remove focus rings only for mouse users (accessibility improved) */
        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        textarea:focus-visible {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
            box-shadow: none;
        }

        /* Navbar enhancements */
        .navbar {
            transition: var(--transition-base);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand img {
            transition: transform 0.2s;
        }
        .navbar-brand:hover img {
            transform: scale(1.02);
        }

        .nav-link {
            font-weight: 500;
            transition: var(--transition-base);
            border-radius: 2rem;
            padding: 0.5rem 1rem;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
        }

        /* Modal card style */
        .modal-content {
            border: none;
            border-radius: 1.25rem;
            box-shadow: var(--shadow-md);
        }
        .modal-header {
            border-bottom: none;
            padding: 1rem 1.5rem 0;
        }
        .modal-body {
            padding: 1.5rem;
        }
        .form-control, .input-group-text {
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: var(--transition-base);
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(135, 16, 84, 0.2);
        }
        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 2rem;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: var(--transition-base);
        }
        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }
        .btn-primary-custom:active {
            transform: translateY(1px);
        }
        .toggle-password {
            cursor: pointer;
            border-left: 0;
            border-top-right-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
        }
        .alert-danger {
            border-radius: 1rem;
            background-color: #ffe3e3;
            border-left: 4px solid #dc3545;
        }
        /* Footer */
        footer a {
            transition: opacity 0.2s;
        }
        footer a:hover {
            opacity: 0.85;
            text-decoration: underline !important;
        }
        /* Custom divider */
        .divider-light {
            background-color: rgba(255,255,255,0.2);
            width: 1px;
            height: 24px;
            margin: 0 0.5rem;
        }
        @media (max-width: 992px) {
            .divider-light {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: var(--primary-color);">
        <div class="container-fluid px-3 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <img src="{{ asset('storage/img/afyalink.jpg') }}" alt="AfyaLink Logo" width="48" height="auto" class="rounded-2 shadow-sm">
                <strong class="text-light fs-5">{{ config('app.name', 'AfyaLink') }}</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-1 gap-lg-2">
                    @if(session('email') == null)
                        <li class="nav-item">
                            <a class="nav-link text-light px-3" style="cursor:pointer;" 
                               data-bs-toggle="modal" data-bs-target="#LoginModal">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </a>
                        </li>
                        <span class="divider-light d-none d-lg-inline-block"></span>
                        <li class="nav-item">
                            <a class="nav-link text-light px-3" style="cursor:pointer;" 
                               data-bs-toggle="modal" data-bs-target="#RegisterModal">
                                <i class="bi bi-person-plus me-1"></i> Signup
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link text-light px-3">
                                <i class="bi bi-person-circle me-1"></i> My Profile
                            </a>
                        </li>
                        <span class="divider-light d-none d-lg-inline-block"></span>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link text-light px-3">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <!-- ======================= MODALS (PRESERVED & ENHANCED) ======================= -->

    <!-- LOGIN MODAL -->
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <img src="{{ asset('storage/img/afyalink.jpg') }}" alt="Logo" width="75" class="mb-3 rounded-circle shadow-sm">
                    <h5 class="mb-2 fw-bold" style="color: var(--primary-color)">Welcome Back</h5>
                    <p class="text-muted small mb-4">Sign in to access your health dashboard</p>

                    <form method="POST" id="submitLogin" action="{{ route('loginUser') }}">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="loginEmail" class="form-label fw-semibold">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" name="email" id="loginEmail" placeholder="hello@afyalink.com" required>
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="loginPassword" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" name="password" id="loginPassword" placeholder="••••••••" required>
                            </div>
                        </div>
                        <button type="submit" id="loginBtn" class="btn btn-primary-custom w-100">Sign In</button>
                    </form>

                    <div class="d-flex flex-wrap justify-content-between mt-3 gap-2">
                        <a href="#" class="text-decoration-none small" style="color: var(--primary-color)" 
                           data-bs-toggle="modal" data-bs-target="#RegisterModal" data-bs-dismiss="modal">
                           <i class="bi bi-person-plus"></i> Create Account
                        </a>
                        <a href="#" class="text-decoration-none small" style="color: var(--primary-color)" 
                           data-bs-toggle="modal" data-bs-target="#ForgotPasswordModal">
                           <i class="bi bi-key"></i> Forgot password?
                        </a>
                    </div>
                    <p class="mt-4 small text-muted">Need help? <a href="mailto:info@afyalink.co.ke" class="text-decoration-none" style="color: var(--primary-color)">info@afyalink.co.ke</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- REGISTER MODAL -->
    <div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="RegisterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-0">
                    <div class="text-center mb-3">
                        <h5 class="fw-bold" style="color: var(--primary-color)">Create your AfyaLink account</h5>
                        <p class="text-muted small">Join Kenya’s trusted digital health ecosystem</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> Please fix the following errors:
                            <ul class="mb-0 mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" id="submitRegister" action="{{ route('registerUser') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6 text-start">
                                <label for="first_name" class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('first_name') }}" class="form-control" name="first_name" id="first_name" placeholder="John" required>
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="middle_name" class="form-label fw-semibold">Other Names (optional)</label>
                                <input type="text" class="form-control" value="{{ old('middle_name') }}" name="middle_name" id="middle_name" placeholder="Middle name">
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="id_number" class="form-label fw-semibold">ID Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" value="{{ old('id_number') }}" name="id_number" id="id_number" placeholder="National ID" required>
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="john@example.com" required>
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Create a strong password" required>
                                    <span class="input-group-text toggle-password"><i class="bi bi-eye-slash"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="confirm_password" class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                                    <span class="input-group-text toggle-password"><i class="bi bi-eye-slash"></i></span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="registerBtn" class="btn btn-primary-custom w-100 mt-4">Register Now</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#LoginModal" data-bs-dismiss="modal">
                            Already have an account? <span style="color: var(--primary-color)">Sign in</span>
                        </a>
                    </div>
                    <p class="mt-3 small text-muted text-center">Need help? <a href="mailto:info@afyalink.co.ke" class="text-decoration-none" style="color: var(--primary-color)">info@afyalink.co.ke</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- FORGOT PASSWORD MODAL -->
    <div class="modal fade" id="ForgotPasswordModal" tabindex="-1" aria-labelledby="ForgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <img src="{{ asset('storage/img/afyalink.jpg') }}" alt="Logo" width="70" class="mb-3">
                    <h5 class="fw-bold" style="color: var(--primary-color)">Reset your password</h5>
                    <p class="small text-muted">We’ll send a secure reset link to your email.</p>

                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="forgotEmail" class="form-label fw-semibold">Registered Email</label>
                            <input type="email" name="email" class="form-control" id="forgotEmail" placeholder="you@example.com" required>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Send Reset Link</button>
                    </form>

                    <div class="mt-3">
                        <a href="#" class="text-decoration-none small" style="color: var(--primary-color)" 
                           data-bs-toggle="modal" data-bs-target="#LoginModal" data-bs-dismiss="modal">
                           ← Back to Login
                        </a>
                    </div>
                    <p class="mt-4 small text-muted">Need help? <a href="mailto:info@afyalink.co.ke" class="text-decoration-none" style="color: var(--primary-color)">info@afyalink.co.ke</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="py-3 text-center border-top shadow-sm" style="background-color: var(--primary-color);">
        <div class="container">
            <p class="mb-0 small text-white-50">
                &copy; {{ date('Y') }} {{ config('app.name', 'AfyaLink') }} – All rights reserved<br>
                Powered by <a href="https://www.dsl.ke" class="text-decoration-none fw-semibold text-white" target="_blank">DSL Systems and Solutions Limited</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript (preserved functionality) -->
    <script>
        // Login form spinner
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('submitLogin');
            if (loginForm) {
                loginForm.addEventListener('submit', function() {
                    const btn = document.getElementById('loginBtn');
                    if (btn) {
                        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Signing in...';
                        btn.disabled = true;
                    }
                });
            }

            // Register form spinner
            const registerForm = document.getElementById('submitRegister');
            if (registerForm) {
                registerForm.addEventListener('submit', function() {
                    const btn = document.getElementById('registerBtn');
                    if (btn) {
                        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Creating account...';
                        btn.disabled = true;
                    }
                });
            }

            // Toggle password visibility (supports multiple toggles)
            document.querySelectorAll('.toggle-password').forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    const input = this.closest('.input-group')?.querySelector('input');
                    if (!input) return;
                    const icon = this.querySelector('i');
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    icon.classList.toggle('bi-eye');
                    icon.classList.toggle('bi-eye-slash');
                });
            });
        });

        // Show registration modal automatically if validation errors exist
        @if ($errors->any())
            document.addEventListener("DOMContentLoaded", function() {
                let registerModal = new bootstrap.Modal(document.getElementById('RegisterModal'));
                registerModal.show();
            });
        @endif
    </script>

    @stack('scripts')
</body>
</html>