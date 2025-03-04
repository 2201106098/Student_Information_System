<!--
=========================================================
* Soft UI Dashboard 3 - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sidebar structure */
    .sidenav {
        height: 100vh !important;
        display: flex !important;
        flex-direction: column !important;
        width: 250px !important;
        transition: all 0.3s ease-in-out !important;
        overflow: hidden !important;
    }

    /* Header section */
    .sidenav-header {
        flex-shrink: 0 !important;
        padding: 1rem 0 !important;
    }

    /* Content section */
    .sidenav-content {
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
        padding: 0.5rem 0 !important;
    }

    /* Footer section */
    .sidenav-footer {
        flex-shrink: 0 !important;
        padding: 1rem 0 !important;
        margin-top: auto !important;
    }

    /* Navigation items */
    .nav-item .nav-link {
        padding: 0.5rem 0.75rem !important;
        margin: 0 0.5rem !important;
        display: flex !important;
        align-items: center !important;
    }

    /* Icon container */
    .icon-container {
        width: 30px !important;
        min-width: 30px !important;
        height: 30px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Collapsed state */
    .sidenav.collapsed {
        width: 80px !important;
    }

    .sidenav.collapsed .nav-link {
        justify-content: center !important;
        padding: 0.5rem 0 !important;
    }

    .sidenav.collapsed .icon-container {
        margin: 0 !important;
    }

    .sidenav.collapsed .nav-text-container {
        display: none !important;
    }

    /* Remove scrolling */
    .navbar-collapse {
        overflow: visible !important;
    }

    /* Hover effect for collapsed state */
    .sidenav.collapsed .nav-item:hover .nav-text-container {
        display: block !important;
        position: absolute !important;
        left: 80px !important;
        background: white !important;
        padding: 0.5rem 1rem !important;
        border-radius: 4px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
        z-index: 1001 !important;
    }

    /* Sidebar background */
    .sidenav {
        box-shadow: 4px 0 8px rgba(0, 0, 0, 0.2) !important;
        z-index: 1000 !important;
        position: fixed !important;
        background: linear-gradient(180deg, #1a237e 0%, #283593 50%, #3949ab 100%) !important; /* Navy Blue gradient */
        top: 64px !important;
        left: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        border-radius: 0 !important;
        height: calc(100vh - 64px) !important;
        width: 250px !important;
        transition: all 0.3s ease-in-out !important;
    }

    /* Adjust main content */
    .main-content {
        margin-left: 250px !important;
        transition: all 0.3s ease-in-out !important;
    }

    .main-content.shifted {
        margin-left: 80px !important;
    }

    /* Navigation items */
    .nav-item .nav-link {
        padding: 0.5rem 1rem !important;
        display: flex !important;
        align-items: center !important;
    }

    /* Text container */
    .nav-text-container {
        transition: opacity 0.3s ease-in-out !important;
        white-space: nowrap !important;
        overflow: hidden !important;
    }

    /* Toggle button */
    #sidebarToggle {
        cursor: pointer;
        padding: 0;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    #sidebarToggle:hover {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    #sidebarToggle i {
        font-size: 16px; /* Adjust this to match your other icons */
    }

    /* Adjust the header alignment */
    .sidenav-header .nav-link {
        padding: 0.5rem 1rem !important;
        display: flex !important;
        align-items: center !important;
    }

    .sidenav-header .icon-container {
        width: 35px !important;
        min-width: 35px !important;
        height: 35px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .nav-tooltip {
        display: none;
    }

    .navbar-main {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        z-index: 1001 !important;
        background-color: #1a237e !important; /* Navy Blue */
        margin: 0 !important;
        padding: 0.5rem 1rem !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        border-bottom: 3px solid #ff6b00 !important; /* Orange border */
    }
    .logout-btn {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin: 0 1rem;
        background: transparent !important;
    }

    .logout-btn:hover {
        background: rgba(255, 255, 255, 0.1) !important;
    }

    .logout-btn:hover .icon {
        background: transparent !important;
    }

    .logout-btn:hover .nav-link-text {
        color: white !important;
    }

    .logout-btn .icon {
        transition: all 0.3s ease;
    }

    .logout-btn .nav-link-text {
        transition: all 0.3s ease;
        color: white !important;
    }

    .logout-btn i {
        color: white !important;
    }

    .logout-btn .color-background {
        fill: #344767;
        transition: all 0.3s ease;
    }

    .logout-btn .color-background.opacity-6 {
        fill-opacity: 0.6;
    }

    /* New styles for all sidebar items */
    .nav-item .nav-link {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin: 0.25rem 1rem !important;
        color: var(--light) !important;
    }

    .nav-item .nav-link:not(.active):hover {
        background: rgba(255, 255, 255, 0.1) !important;
    }

    .nav-item .nav-link:hover .icon {
        background: transparent !important;
    }

    .nav-item .nav-link:hover .nav-link-text {
        color: white !important;
        font-weight: 600;
    }

    .nav-item .nav-link:hover .color-background,
    .nav-item .nav-link:hover .color-background.opacity-6 {
        fill: white !important;
    }

    .nav-item .nav-link .icon {
        transition: all 0.3s ease;
    }

    .nav-item .nav-link .nav-link-text {
        transition: all 0.3s ease;
        color: #344767;
    }

    .nav-item .nav-link .color-background {
        fill: #344767;
        transition: all 0.3s ease;
    }

    .nav-item .nav-link .color-background.opacity-6 {
        fill-opacity: 0.6;
        transition: all 0.3s ease;
    }

    .user-name-display {
        color: #344767;
        padding: 0;
        cursor: default;
        pointer-events: none;
    }

    .user-name-display i {
        margin-right: 8px;
    }

    .sidenav .navbar-brand {
        color: var(--light);
        border-radius: 0 !important;
        margin: 0 !important;
        padding: 1rem !important;
    }

    /* Remove margin from the navigation items container */
    .navbar-collapse {
        margin: 0 !important;
    }

    /* Ensure sign out aligns with other menu items */
    .sidenav-footer .nav-link {
        padding: 0.5rem 0.75rem !important;
        margin: 0 0.5rem !important;
        display: flex !important;
        align-items: center !important;
    }

    /* Navbar text colors */
    .navbar-main .breadcrumb-item,
    .navbar-main .breadcrumb-item a,
    .navbar-main h6,
    .navbar-main .nav-link,
    .navbar-main .nav-link span,
    .navbar-main .nav-link i,
    .user-name-display,
    .user-name-display i {
        color: white !important;
    }

    /* Adjust opacity for breadcrumb items */
    .navbar-main .breadcrumb-item a.opacity-5 {
        opacity: 0.7 !important;
    }

    /* Remove any border radius */
    .navbar-main,
    .navbar-main *,
    .navbar-main .dropdown-menu {
        border-radius: 0 !important;
    }

    /* Navigation link text color */
    .nav-item .nav-link .nav-link-text {
        color: white !important;
    }

    /* Remove background from enrollment icon */
    .nav-item .nav-link .icon.icon-shape {
        background: transparent !important;
        box-shadow: none !important;
    }

    /* Ensure icon color is white */
    .nav-item .nav-link .icon i {
        color: white !important;
    }

    /* Add after line 110 */
    .sidenav.collapsed .nav-link-text {
        display: none !important;
    }

    /* Add after line 120 */
    .sidenav.collapsed .nav-item:hover .nav-link-text {
        display: block !important;
        position: absolute !important;
        left: 80px !important;
        background: #1a237e !important;
        color: white !important;
        padding: 0.5rem 1rem !important;
        border-radius: 4px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
        z-index: 1001 !important;
        white-space: nowrap !important;
    }

    /* Make all sidebar icons pure white */
    .nav-item .nav-link .icon i,
    .nav-item .nav-link .icon.icon-shape i,
    .nav-item .nav-link:hover .icon i {
        color: white !important;
        opacity: 1 !important;
    }

    /* Override any existing icon colors and backgrounds */
    .nav-item .nav-link .icon.icon-shape {
        background: transparent !important;
        box-shadow: none !important;
    }

    /* Ensure active state maintains white color */
    .nav-item .nav-link.active .icon i {
        color: white !important;
        opacity: 1 !important;
    }

    /* Add after line 265 */
    .nav-item .nav-link.active {
        background: #ff6b00 !important; /* Orange background */
        box-shadow: 0 2px 8px rgba(255, 107, 0, 0.4) !important;
    }

    .nav-item .nav-link.active .nav-link-text,
    .nav-item .nav-link.active i {
        color: white !important;
        font-weight: 600;
    }

    .nav-item .nav-link.active:hover {
        background: #e65c00 !important; /* Slightly darker orange on hover */
    }

    /* Add after line 365 */
    .nav-item .nav-link.active {
        background: #ff6b00 !important;
    }

    .nav-item .nav-link.active .icon i,
    .nav-item .nav-link.active .nav-link-text {
        color: white !important;
    }

    .nav-item .nav-link:not(.active) .icon i {
        color: white !important;
    }

    .nav-item .nav-link:hover .icon i {
        color: white !important;
    }

    /* Override any existing icon colors */
    .nav-item .nav-link .icon.icon-shape {
        background: transparent !important;
        box-shadow: none !important;
    }

    /* Active state hover effect */
    .nav-item .nav-link.active:hover {
        background: #e65c00 !important;
    }

    /* Add after line 420 */
    .nav-item .nav-link.active {
        background: #ff6b00 !important;
        box-shadow: 0 2px 8px rgba(255, 107, 0, 0.4) !important;
    }

    .nav-item .nav-link.active .icon i {
        color: #ff6b00 !important;  /* Orange color for active icon */
    }

    .nav-item .nav-link.active .nav-link-text {
        color: white !important;
        font-weight: 600;
    }

    .nav-item .nav-link.active:hover {
        background: #e65c00 !important;
    }

    /* Override the text-dark class for active state */
    .nav-item .nav-link.active .icon-container i.text-dark {
        color: #ff6b00 !important;
    }

    /* Status Badge and Row Styling */
    .status-badge {
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        background: #4CAF50;
        color: white;
        box-shadow: 0 2px 4px rgba(76, 175, 80, 0.2);
        display: inline-block;
    }

    .table tbody tr.enrolled {
        background-color: rgba(76, 175, 80, 0.1);
    }

    .table tbody tr.enrolled:hover {
        background-color: rgba(76, 175, 80, 0.15);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(76, 175, 80, 0.2);
    }

    .table tbody tr.enrolled td {
        border-bottom: 1px solid rgba(76, 175, 80, 0.2);
    }

    /* Update these styles */
    .nav-item .nav-link .icon-container i.text-orange {
        color: #ff6b00 !important;
    }

    .nav-item .nav-link .icon-container i.text-white {
        color: white !important;
    }

    .nav-item .nav-link.active .nav-text-container span.text-dark {
        color: #344767 !important;
    }

    .nav-item .nav-link .nav-text-container span.text-white {
        color: white !important;
    }

    .sidenav .nav-link.active {
        background: var(--light) !important;
        color: var(--dark) !important;
        box-shadow: 0 4px 6px rgba(234, 88, 12, 0.25);
    }

    .nav-link.active {
        color: black !important;
        background-color: white; /* or any other desired background */
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0" id="sidenav-main">
    <div class="sidenav-header">
        <div class="nav-item">
            <a class="nav-link" href="#">
                <div class="icon-container">
                    <button id="sidebarToggle" class="border-0 bg-transparent">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                </div>
                <div class="nav-text-container">
                    <span class="font-weight-bold">Student Information System</span>
                </div>
            </a>
        </div>
    </div>

    <div class="sidenav-content">
        <ul class="navbar-nav">
            @if(Auth::user()->user_type === 'student')
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student.dashboard') ? 'active' : '' }}" href="{{ route('student.dashboard') }}">
                        <div class="icon-container">
                            <i class="fas fa-home {{ Request::routeIs('student.dashboard') ? 'text-orange' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('student.dashboard') ? 'text-dark' : 'text-white' }}">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student.studentSubjects') ? 'active' : '' }}" href="{{ route('student.studentSubjects') }}">
                        <div class="icon-container">
                            <i class="fas fa-book {{ Request::routeIs('student.studentSubjects') ? 'text-orange' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('student.studentSubjects') ? 'text-dark' : 'text-white' }}">Subjects</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student.studentGrades') ? 'active' : '' }}" href="{{ route('student.studentGrades') }}">
                        <div class="icon-container">
                            <i class="fas fa-chart-bar {{ Request::routeIs('student.studentGrades') ? 'text-orange' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('student.studentGrades') ? 'text-dark' : 'text-white' }}">Grades</span>
                        </div>
                    </a>
                </li>
            @endif
            
            @if(Auth::user()->user_type === 'instructor')
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <div class="icon-container">
                            <i class="fas fa-home {{ Request::routeIs('dashboard') ? 'text-orange' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('dashboard') ? 'text-dark' : 'text-white' }}">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('students.index') ? 'active' : '' }}" href="{{ route('students.index') }}">
                        <div class="icon-container">
                            <i class="fas fa-user {{ Request::routeIs('students.index') ? 'text-dark' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('students.index') ? 'text-dark' : 'text-white' }}">Students</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('subjects.index') ? 'active' : '' }}" href="{{ route('subjects.index') }}">
                        <div class="icon-container">
                            <i class="fas fa-book {{ Request::routeIs('subjects.index') ? 'text-dark' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('subjects.index') ? 'text-dark' : 'text-white' }}">Subjects</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('grades.index') ? 'active' : '' }}" href="{{ route('grades.index') }}">
                        <div class="icon-container">
                            <i class="fas fa-list-alt {{ Request::routeIs('grades.index') ? 'text-dark' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ Request::routeIs('grades.index') ? 'text-dark' : 'text-white' }}">Grades</span>
                        </div>
                    </a>
                </li>
            @endif
            @if(Auth::user()->isInstructor())
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('enrollment') ? 'active' : '' }}" href="{{ route('enrollment.index') }}">
                        <div class="icon-container">
                            <i class="fas fa-user-graduate {{ request()->is('enrollment') ? 'text-orange' : 'text-white' }}"></i>
                        </div>
                        <div class="nav-text-container">
                            <span class="{{ request()->is('enrollment') ? 'text-dark' : 'text-white' }}">Enrollment</span>
                        </div>
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <!-- Sign Out at bottom -->
    <div class="sidenav-footer">
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <a class="nav-link logout-link" href="#" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="icon-container">
                    <i class="fas fa-sign-out-alt text-danger" style="font-size: 1.2rem; font-weight: 900;"></i>
                </div>
                <div class="nav-text-container">
                    <span class="text-danger font-weight-bold" style="font-size: 1rem;">Sign Out</span>
                </div>
            </a>
        </form>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4" id="navbarBlur" navbar-scroll="true" style="border-radius: 0 !important;">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('Pages')</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">@yield('Pages')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
          <ul class="navbar-nav justify-content-end">
            <!-- Profile Dropdown -->
            <li class="nav-item pe-2 d-flex align-items-center">
              <span class="user-name-display">
                  <i class="fa fa-user"></i>
                  {{Auth::user()->name}}
              </span>
          </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
   @yield('content')
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Stack scripts -->
  @stack('scripts')
  <style>
    :root {
        --primary-orange: #f97316;    /* Bright orange */
        --primary-yellow: #facc15;    /* Bright yellow */
        --dark-orange: #ea580c;       /* Deep orange */
        --medium-orange: #fb923c;     /* Medium orange */
        --light-orange: #fdba74;      /* Light orange */
        --dark-yellow: #eab308;       /* Deep yellow */
        --light-yellow: #fde047;      /* Light yellow */
        --light: #ffffff;
        --dark: #1a1a1a;
        --gray-light: #f3f4f6;
    }

    /* Sidebar Styling */
    .sidenav {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        border-right: 1px solid rgba(234, 88, 12, 0.1);
    }

    .sidenav .navbar-brand {
        color: var(--light);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .sidenav .nav-link {
        color: var(--light) !important;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 5px 10px;
    }

    .sidenav .nav-link:hover {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        color: var(--dark) !important;
    }

    .sidenav .nav-link.active {
        background: var(--light) !important;
        color: var(--dark) !important;
        box-shadow: 0 4px 6px rgba(234, 88, 12, 0.25);
    }

    /* Icon Styling in Sidebar */
    .sidenav .icon-shape {
        background: rgba(255, 255, 255, 0.2) !important;
        border-radius: 8px;
    }

    .sidenav .nav-link:hover .icon-shape,
    .sidenav .nav-link.active .icon-shape {
        background: rgba(255, 255, 255, 0.2) !important;
    }

    /* Sidebar Footer or Bottom Section */
    .sidenav .sidenav-footer {
        background: transparent !important;
    }

    .sidenav-footer .nav-link {
        background: transparent !important;
        padding: 0.5rem 0.75rem !important;
        margin: 0 0.5rem !important;
    }

    .sidenav-footer .nav-link:hover {
        background: rgba(255, 255, 255, 0.1) !important;
    }

    .sidenav-footer form {
        background: transparent !important;
    }

    /* Main Content Area */
    .main-content {
        background-color: var(--gray-light);
    }

    /* Cards */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card-header {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        color: var(--light);
        border-radius: 12px 12px 0 0 !important;
    }

    /* Stats Cards */
    .stats-card {
        background: linear-gradient(310deg, var(--primary-orange), var(--light-yellow));
        color: var(--light);
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(310deg, var(--primary-yellow), var(--dark-yellow));
    }

    /* Tables */
    .table {
        width: 95%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 20px auto;
    }

    .table thead th {
        background: linear-gradient(310deg, #1e40af, #1e3a8a);
        color: #ffffff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 16px 24px;
        border: none;
        white-space: nowrap;
    }

    .table thead th:first-child {
        border-top-left-radius: 8px;
    }

    .table thead th:last-child {
        border-top-right-radius: 8px;
    }

    .table tbody td {
        padding: 16px 24px;
        color: #374151;
        font-size: 0.95rem;
        border-bottom: 1px solid #e5e7eb;
        background: #ffffff;
        vertical-align: middle;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 8px;
    }

    .table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 8px;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .table-responsive {
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px 40px;
        width: auto;
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        border: none;
        box-shadow: 0 4px 6px rgba(234, 88, 12, 0.25);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(234, 88, 12, 0.3);
    }

    /* Status Badges */
    .badge-success {
        background: linear-gradient(310deg, #059669, #10b981);
    }

    .badge-secondary {
        background: linear-gradient(310deg, #4b5563, #6b7280);
    }

    .min-h-screen {
        transition: width 0.3s ease-in-out;
    }

    .main-content {
        transition: margin-left 0.3s ease-in-out;
    }

    #sidebarToggle {
        cursor: pointer;
        padding: 0;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    #sidebarToggle:hover {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    #sidebarToggle i {
        font-size: 16px; /* Adjust this to match your other icons */
    }

    /* Adjust the header alignment */
    .sidenav-header .nav-link {
        padding: 0.5rem 1rem !important;
        display: flex !important;
        align-items: center !important;
    }

    .sidenav-header .icon-container {
        width: 35px !important;
        min-width: 35px !important;
        height: 35px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .nav-text {
        transition: display 0.3s ease-in-out;
    }

    /* Hover effect for collapsed state */
    .min-h-screen[style*="width: 80px"]:hover .nav-text {
        position: absolute;
        left: 100%;
        background: white;
        padding: 5px 10px;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        display: block !important;
        z-index: 1000;
        white-space: nowrap;
    }
    .search-container {
    width: 70%;
    margin: 90px auto 20px;
    display: flex; 
    justify-content: center;
}

.search-wrapper {
    position: relative;
    width: 100%;
    max-width: none;
}

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #1a237e;
        opacity: 0.7;
    }

    .search-input {
        width: 100%;
        padding: 12px 20px 12px 40px;
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
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidenav = document.getElementById('sidenav-main');
        const mainContent = document.querySelector('.main-content');
        let isCollapsed = false;

        sidebarToggle.addEventListener('click', function() {
            isCollapsed = !isCollapsed;
            sidenav.classList.toggle('collapsed');
            mainContent.classList.toggle('shifted');
            
            // Save state to localStorage
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        });

        // Restore state on page load
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidenav.classList.add('collapsed');
            mainContent.classList.add('shifted');
            isCollapsed = true;
        }
    });
  </script>
</body>

</html>