@extends('layouts.app')

@section('content')
    <style>
        /* Custom styles - no linear gradients used */
        .hero-section {
            background-image: url('https://images.unsplash.com/photo-1581056771107-24ca5f033842?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center 30%;
            position: relative;
            min-height: 85vh;
            display: flex;
            align-items: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.55); /* Solid overlay, not a gradient */
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        .hero-content h1 {
            font-size: 3.2rem;
            font-weight: 700;
        }

        .service-card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.12);
        }

        .service-card img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }

        .quote-block {
            background-color: #eef2f7;
            border-left: 6px solid #198754;
            padding: 2rem 2rem;
            border-radius: 1rem;
            font-size: 1.35rem;
            font-style: normal;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .blend-row img {
            border-radius: 1rem;
            width: 100%;
            object-fit: cover;
            height: 380px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .cta-banner {
            background-image: url('https://images.unsplash.com/photo-1581056771107-24ca5f033842?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
        }

        .cta-overlay {
            background-color: rgba(25, 135, 84, 0.88); /* solid green overlay, no gradient */
            padding: 3rem 2rem;
            border-radius: 1.5rem;
        }

        .btn-cta-primary {
            background-color: white;
            color: #198754;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 40px;
            transition: all 0.2s;
        }

        .btn-cta-primary:hover {
            background-color: #f8f9fa;
            color: #0f5132;
            transform: scale(1.02);
        }

        .btn-outline-light-custom {
            border: 2px solid white;
            color: white;
            border-radius: 40px;
            padding: 0.7rem 1.8rem;
            font-weight: 500;
        }

        .btn-outline-light-custom:hover {
            background-color: white;
            color: #198754;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #198754;
        }
        
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }
            .blend-row img {
                height: 260px;
                margin-bottom: 1.5rem;
            }
        }
    </style>

    <!-- Hero Section with background image and overlay -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <span class="badge bg-success bg-opacity-75 mb-3 fs-6 px-3 py-2">🇰🇪 Kenya's Digital Healthcare Access Platform</span>
                    <h1 class="display-4 fw-bold mb-3">AfyaLink: Your Health, Connected.</h1>
                    <p class="lead mb-4">Instant access to trusted doctors, digital records, and pharmacy delivery — all from your phone.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="#" class="btn btn-success btn-lg px-4 py-2 rounded-pill"><i class="bi bi-calendar-check"></i> Book Appointment</a>
                        <a href="#" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill"><i class="bi bi-play-circle"></i> Explore Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section: Cards with Unsplash cute images -->
    <div class="container py-5 my-4">
        <div class="text-center mb-5">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill mb-2">Our Digital Ecosystem</span>
            <h2 class="display-5 fw-semibold">Comprehensive Care at Your Fingertips</h2>
            <p class="lead text-muted">Powered by technology, driven by compassion.</p>
        </div>

        <div class="row g-4">
            <!-- Telemedicine -->
            <div class="col-md-6 col-lg-3">
                <div class="card service-card h-100">
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Happy doctor video calling patient">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="bi bi-camera-video text-success me-2"></i>Telemedicine</h5>
                        <p class="card-text">Consult top specialists via HD video, from Nairobi to Kisumu. Get prescriptions & e-referrals instantly.</p>
                    </div>
                </div>
            </div>
            <!-- Digital Records -->
            <div class="col-md-6 col-lg-3">
                <div class="card service-card h-100">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Digital health records on tablet">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="bi bi-file-earmark-medical text-success me-2"></i>Smart Health Records</h5>
                        <p class="card-text">Your lifelong medical history, lab results & immunizations — secure, accessible, and shareable.</p>
                    </div>
                </div>
            </div>
            <!-- Pharmacy Delivery -->
            <div class="col-md-6 col-lg-3">
                <div class="card service-card h-100">
                    <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Pharmacist preparing medication">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="bi bi-truck text-success me-2"></i>Pharmacy on Wheels</h5>
                        <p class="card-text">Get verified medicines delivered to your doorstep within hours. Prescription refills made simple.</p>
                    </div>
                </div>
            </div>
            <!-- Lab Test Booking -->
            <div class="col-md-6 col-lg-3">
                <div class="card service-card h-100">
                    <img src="https://images.unsplash.com/photo-1579154204601-0152f96e0b84?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Lab technician at work">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="bi bi-droplet text-success me-2"></i>Lab Test Hub</h5>
                        <p class="card-text">Book and pay for lab tests online, view results securely, and get AI-powered health insights.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blending Quote + Image - The digital backbone statement -->
    <div class="container my-5">
        <div class="row align-items-center blend-row">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1557425493-6f90ae4659fc?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Smiling Kenyan mother with baby at clinic" class="img-fluid">
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="quote-block">
                    <i class="bi bi-quote display-1 text-success opacity-25"></i>
                    <p class="fs-4 fw-medium">“AfyaLink is not simply a health app. It is the digital backbone of a healthier Kenya — one that grows smarter, faster, and more trusted with every patient served.”</p>
                    <hr class="w-25 my-3 text-success">
                    <p class="text-muted mb-0">— Dr. Naliaka W., Chief Health Innovation Officer</p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-success rounded-pill"><i class="bi bi-arrow-right"></i> Join the movement</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats & Trust Signals blending with image -->
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <div class="row text-center">
                    <div class="col-6 mb-4">
                        <div class="stats-number">500K+</div>
                        <p class="text-muted">Active Patients</p>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stats-number">1,200+</div>
                        <p class="text-muted">Verified Doctors</p>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stats-number">47</div>
                        <p class="text-muted">Counties Covered</p>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stats-number">24/7</div>
                        <p class="text-muted">Virtual Urgent Care</p>
                    </div>
                </div>
                <div class="mt-3 text-center text-md-start">
                    <a href="#" class="btn btn-outline-success rounded-pill px-4">View Impact Report →</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Kenyan doctor with tablet consulting patient" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>

    <!-- CTA Banner - No gradient, solid overlay with Unsplash background -->
    <div class="container my-5">
        <div class="cta-banner">
            <div class="cta-overlay text-white text-center">
                <h2 class="display-5 fw-bold">Ready to transform your healthcare journey?</h2>
                <p class="lead mb-4">Join thousands of Kenyans who trust AfyaLink for fast, affordable, and dignified digital care.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="#" class="btn btn-cta-primary btn-lg px-5 rounded-pill"><i class="bi bi-download"></i> Download App</a>
                    <a href="#" class="btn btn-outline-light-custom btn-lg px-5 rounded-pill"><i class="bi bi-chat-dots"></i> Talk to Advisor</a>
                </div>
                <p class="mt-3 mb-0 small"><i class="bi bi-shield-check"></i> Secure & HIPAA-compliant. Free signup.</p>
            </div>
        </div>
    </div>

    <!-- More CTA and additional cute image blending - Community Section -->
    <div class="container py-4 mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                <img class="rounded" src="https://images.unsplash.com/photo-1584515933487-779824d29309?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=450" alt="Happy nurse with newborn in Kenya" ...>
                <!-- <img src="https://images.unsplash.com/photo-1629909613654-28e377c37d6f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Happy nurse with newborn in Kenya" class="img-fluid rounded-4 shadow-lg"> -->
            </div>
            <div class="col-md-7">
                <h3 class="fw-bold">Bridging the last mile with <span class="text-success">AfyaLink Community Hubs</span></h3>
                <p class="fs-5">Through partnerships with local chemists and community health volunteers, we ensure no Kenyan is left behind — whether you're in urban Nairobi or remote Turkana.</p>
                <div class="d-flex flex-wrap gap-3 mt-3">
                    <a href="#" class="btn btn-success rounded-pill"><i class="bi bi-geo-alt"></i> Find a Hub Near You</a>
                    <a href="#" class="btn btn-light border rounded-pill"><i class="bi bi-heart"></i> Become a Partner</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Footer Note (extends layout likely has footer, but adds charm) -->
    <div class="bg-light py-4 mt-3 border-top">
        <div class="container text-center text-muted small">
            <p class="mb-0">© 2025 AfyaLink — Empowering Kenya's digital health revolution. <br> Proudly serving the nation with empathy and innovation.</p>
        </div>
    </div>

@endsection