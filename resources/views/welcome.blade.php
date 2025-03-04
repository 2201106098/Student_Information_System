<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BukSU - Student Information System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
        <link href="../assets/css/tabler.min.css" rel="stylesheet">
        <link href="../assets/css/tabler-flags.min.css" rel="stylesheet">
        <link href="../assets/css/tabler-payments.min.css" rel="stylesheet">
        <link href="../assets/css/tabler-vendors.min.css" rel="stylesheet">
        <link href="../assets/css/submit-delay.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            :root {
                --navy-blue: #000080; /* Navy Blue for navbar */
                --accent-gold: #ffd700; /* Gold accent */
                --dark-bg: #111111; /* Dark background */
                --primary-blue: #1a237e; /* Dark blue */
                --secondary-blue: #0d47a1; /* Royal blue */
                --light-blue: #e8eaf6; /* Light blue for highlights */
            }

            .welcome-section {
                background: linear-gradient(rgba(0, 0, 0, 0.92), rgba(0, 0, 0, 0.85)), 
                            url('../assets/img/d3cd73d1b9328a311f80370d2a3792e4_UapONy1.png');
                background-size: cover;
                background-position: center;
                position: relative;
            }

            .logo-container {
                width: 200px;  /* Increased from 150px */
                height: 200px; /* Increased from 150px */
                margin: 6rem auto 3rem;
                position: relative;
                z-index: 10;
                /* Removed background, padding, border-radius, and box-shadow */
            }

            .logo-container img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                /* Optional: add a subtle drop shadow to make the logo pop against dark background */
                filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            }

            .btn-custom {
                background: var(--accent-gold);
                color: var(--primary-blue) !important;
                border: 2px solid var(--accent-gold);
                font-weight: 600;
                transition: all 0.3s ease;
                padding: 0.8rem 2rem;
                border-radius: 30px;
            }

            .btn-custom:hover {
                background: transparent;
                color: var(--accent-gold) !important;
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
            }

            .text-gradient {
                background: linear-gradient(45deg, var(--accent-gold), #ffffff);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-size: 3.5rem;
            }

            .navbar {
                background: #ffffff;  /* White background */
                padding: 0.5rem 0;
                z-index: 1000;
                box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand {
                font-size: 1.2rem !important;
                display: flex;
                align-items: center;
                gap: 0.8rem;
                color: #033c55 !important;  /* Deep blue-gray for main text */
                font-weight: bold;
            }

            .navbar-logo {
                width: 35px; /* Reduced logo size */
                height: 35px;
                transition: all 0.3s ease;
            }

            .nav-link {
                padding: 0.5rem 1rem !important;
                font-size: 0.9rem;
                color: #c7bb2d !important; /* Gold color for Login/Register */
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                background: rgba(3, 60, 85, 0.1); /* Slight blue tint on hover */
                color: #033c55 !important; /* Change to dark blue on hover */
            }

            /* Optional: Add a subtle hover effect */
            .nav-link:hover i {
                transform: translateX(2px);
                transition: transform 0.3s ease;
            }

            .feature-card {
                background: rgba(17, 17, 17, 0.8);
                border-radius: 20px;
                padding: 2.5rem;
                margin: 1rem 0;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
            }

            .feature-card:hover {
                transform: translateY(-5px);
                background: rgba(17, 17, 17, 0.9);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }

            .feature-icon {
                color: var(--accent-gold);
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
            }

            .lead {
                font-size: 1.2rem;
                line-height: 1.8;
                margin-bottom: 2rem;
            }

            /* Add animation for elements */
            .animate-up {
                animation: fadeInUp 0.8s ease-out;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .gold-gradient-text {
                background: linear-gradient(45deg, #FFD700, #FFC107, #FFD700);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                color: transparent;
                font-weight: bold;
                animation: shimmer 2s infinite linear;
            }

            @keyframes shimmer {
                0% { background-position: 0% 50%; }
                100% { background-position: 100% 50%; }
            }
        </style>
    </head>
    <body class="antialiased theme-light">
        <!-- Announcements Ticker -->
        <div class="announcements-ticker d-print-none" style="position: relative; height: 25px; overflow: hidden;">
            <div class="container">
                <marquee>Welcome to BukSU Student Information System - Your Gateway to Academic Excellence</marquee>
            </div>
        </div>

        <div class="wrapper">
            <div class="page-wrapper">
                <div class="page-body no-whitespace">
                    <div class="container-xl">
                        <!-- Hero Banner -->
                        <div class="card bg-primary mb-4" style="border-radius: 15px; overflow: hidden;">
                            <div class="card-body p-4" style="
                                background-image: url('../assets/img/d3cd73d1b9328a311f80370d2a3792e4_UapONy1.png') !important;
                                background-size: cover;
                                background-position: center;
                                position: relative;
                                min-height: 300px;
                                border-radius: 10px;
                                ">
                                <!-- Content -->
                                <div style="position: relative;">
                                    <img src="../assets/img/Shield_logo_of_Bukidnon_State_University.png" alt="BukSU Logo" style="max-width: 120px; margin-bottom: 1rem;">
                                    <h3 class="h3 gold-gradient-text mb-2" style="background-size: 200% auto; font-size: 1.75rem;">BukSU Student Information System</h3>
                                    <p class="text-white mb-2" style="font-size: 0.95rem;">Educate. Innovate. Lead.</p>
                                    <small class="text-white d-block mb-3">I would like to..</small>
                                    <div class="btn-list">
                                        @if (Route::has('login'))
                                            @auth
                                                <a href="{{ route('dashboard') }}" class="btn" style="border-radius: 8px; background-color: #ffffff; color: #000; font-weight: 500;">DASHBOARD</a>
                                            @else
                                                <a href="{{ route('register') }}" class="btn" style="border-radius: 8px; background-color: #ffffff; color: #000; font-weight: 500;">REGISTER</a>
                                                <a href="{{ route('login') }}" class="btn bg-primary-lt text-white" style="border-radius: 8px;">LOGIN</a>
                                            @endauth
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Section -->
                        <div class="page-title my-2">Features</div>
                        <div class="row row-cards" data-masonry="{&quot;percentPosition&quot;: true }">
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-link">
                                    <div class="card-body">
                                        <i class="fas fa-graduation-cap fa-2x text-primary mb-3"></i>
                                        <div class="card-title">Academic Excellence</div>
                                        <div>Track your academic journey with comprehensive tools and resources.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-link">
                                    <div class="card-body">
                                        <i class="fas fa-shield-alt fa-2x text-primary mb-3"></i>
                                        <div class="card-title">Security</div>
                                        <div>Your data is protected with state-of-the-art encryption.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-link">
                                    <div class="card-body">
                                        <i class="fas fa-chart-line fa-2x text-primary mb-3"></i>
                                        <div class="card-title">Progress Monitoring</div>
                                        <div>Keep track of your academic performance and achievements.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Section -->
                        <div class="card mt-3">
                            
                            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                <div class="divide-y">
                                    <div class="accordion" id="accordion-faq">
                                        <!-- Add your FAQ items here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="footer footer-transparent">
                    <div class="container">
                        <div class="row text-center align-items-center flex-row-reverse">
                            <div class="col-lg-auto ms-lg-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item">
                                        <small><a href="#" class="link-secondary">Terms & Conditions</a></small>
                                    </li>
                                    <li class="list-inline-item">
                                        <small><a href="#" class="link-secondary">Privacy Policy</a></small>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item">
                                        <small>Copyright © {{ date('Y') }} <a href="https://buksu.edu.ph/" class="link-secondary">Bukidnon State University</a>. All rights reserved</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Scripts -->
        <script src="../assets/js/tabler.min.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
    </body>
</html>
