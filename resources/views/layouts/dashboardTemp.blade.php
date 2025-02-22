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
  <style>
    /* Sidebar background */
    .sidenav {
        box-shadow: 4px 0 8px rgba(0, 0, 0, 0.2) !important;
        z-index: 1000 !important;
        position: fixed !important;
    }
    .navbar-main {
      
        box-shadow: 4px 0 8px rgba(0, 0, 0, 0.2) !important;
    }
    .logout-btn {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin: 0 1rem;
    }

    .logout-btn:hover {
        background: linear-gradient(310deg, #ea580c, #facc15);
    }

    .logout-btn:hover .icon {
        background: transparent !important;
    }

    .logout-btn:hover .color-background {
        fill: white !important;
    }

    .logout-btn:hover .nav-link-text {
        color: white !important;
        font-weight: 600;
    }

    .logout-btn .icon {
        transition: all 0.3s ease;
    }

    .logout-btn .nav-link-text {
        transition: all 0.3s ease;
        color: #344767;
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
        margin: 0 1rem;
    }

    .nav-item .nav-link:not(.active):hover {
        background: linear-gradient(310deg, #ea580c, #facc15);
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
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
        <!-- <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
        <span class="ms-1 font-weight-bold">Enrollment System</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if(Auth::user()->user_type === 'student')
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student.dashboard') ? 'active bg-gradient-white text-dark' : 'text-dark' }}" 
                       href="{{ route('student.dashboard') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-home text-dark opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student.studentSubjects') ? 'active bg-gradient-white text-dark' : 'text-dark' }}" 
                       href="{{ route('student.studentSubjects') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-book text-dark opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">My Subjects</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student.studentGrades') ? 'active bg-gradient-white text-dark' : 'text-dark' }}" 
                       href="{{ route('student.studentGrades') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-chart-bar text-dark opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">My Grades</span>
                    </a>
                </li>
            @endif
            
            @if(Auth::user()->user_type === 'instructor')
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('enrollment.index') ? 'active' : '' }}" href="{{ route('enrollment.index') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus text-dark opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Enrollment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('students.index') ? 'active bg-gradient-white text-dark' : 'text-dark'}}" href="{{ route('students.index') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{Request::routeIs('subjects.index') ? 'active bg-gradient-white text-dark' : 'text-dark'}}" href="{{ route('subjects.index') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Subjects</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{Request::routeIs('grades.index') ? 'active bg-gradient-white text-dark' : 'text-dark'}}" href="{{route('grades.index')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                                                <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Grades</span>
                    </a>
                </li>
            @endif
            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a class="nav-link d-flex align-items-center logout-btn" href="#" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>logout</title>
                                <g stroke="none" stroke-width="2" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(304.000000, 151.000000)">
                                                <path class="color-background opacity-6" d="M15.0002,6.99999997 C15.0002,4.23857625 17.2388,2 20.0002,2 L32.0002,2 C34.7616,2 37.0002,4.23857625 37.0002,6.99999997 L37.0002,32.9999999 C37.0002,35.7614237 34.7616,38 32.0002,38 L20.0002,38 C17.2388,38 15.0002,35.7614237 15.0002,32.9999999 L15.0002,26.9999999 L18.0002,26.9999999 L18.0002,32.9999999 L34.0002,32.9999999 L34.0002,6.99999997 L18.0002,6.99999997 L18.0002,12.9999999 L15.0002,12.9999999 L15.0002,6.99999997 Z"></path>
                                                <path class="color-background" d="M15.7071068,20.7071067 C15.3165825,21.097631 14.6834175,21.097631 14.2928932,20.7071067 L4.29289322,10.7071067 C3.90236893,10.3165825 3.90236893,9.68341751 4.29289322,9.29289322 L14.2928932,-0.707106781 C14.6834175,-1.09763107 15.3165825,-1.09763107 15.7071068,-0.707106781 C16.0976311,-0.316582489 16.0976311,0.316582489 15.7071068,0.707106781 L7.41421356,9 L24,9 C24.5522847,9 25,9.44771525 25,10 L25,20 C25,20.5522847 24.5522847,21 24,21 L7.41421356,21 L15.7071068,29.2928932 C16.0976311,29.6834175 16.0976311,30.3165825 15.7071068,30.7071068 C15.3165825,31.0976311 14.6834175,31.0976311 14.2928932,30.7071068 L4.29289322,20.7071067 C3.90236893,20.3165825 3.90236893,19.6834175 4.29289322,19.2928932 L14.2928932,9.29289322 C14.6834175,8.90236893 15.3165825,8.90236893 15.7071068,9.29289322 C16.0976311,9.68341751 16.0976311,10.3165825 15.7071068,10.7071067 L7.41421356,19 L22,19 L22,11 L7.41421356,11 L15.7071068,19.2928932 C16.0976311,19.6834175 16.0976311,20.3165825 15.7071068,20.7071067 Z" transform="translate(14.500000, 15.000000) scale(-1, 1) translate(-14.500000, -15.000000)"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Sign Out</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
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
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user cursor-pointer"></i>
                {{Auth::user()->name}}
              </a>
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
        background: var(--light);
        border-right: 1px solid rgba(234, 88, 12, 0.1);
    }

    .sidenav .navbar-brand {
        color: var(--dark) !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .sidenav .nav-link {
        color: var(--dark) !important;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 5px 10px;
    }

    .sidenav .nav-link:hover {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        color: var(--light) !important;
    }

    .sidenav .nav-link.active {
        background: linear-gradient(310deg, var(--primary-orange), var(--primary-yellow));
        color: var(--light) !important;
        box-shadow: 0 4px 6px rgba(234, 88, 12, 0.25);
    }

    /* Icon Styling in Sidebar */
    .sidenav .icon-shape {
        background: var(--gray-light) !important;
        border-radius: 8px;
    }

    .sidenav .nav-link:hover .icon-shape,
    .sidenav .nav-link.active .icon-shape {
        background: rgba(255, 255, 255, 0.2) !important;
    }

    /* Sidebar Footer or Bottom Section */
    .sidenav .sidenav-footer {
        background: var(--dark-orange);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
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
    .table thead th {
        background: var(--dark-orange);
        color: var(--light);
        border: none;
        padding: 12px 16px;
    }

    .table tbody td {
        padding: 12px 16px;
        border-bottom: 1px solid rgba(234, 88, 12, 0.1);
    }

    .table tbody tr:hover {
        background: rgba(234, 88, 12, 0.05);
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
  </style>
</body>

</html>