<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
        
        <style>
            body {
                background: #f8f9fa;
            }
            .auth-card {
                max-width: 400px;
                margin: 0 auto;
                background: white;
                border-radius: 1rem;
                box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
            }
            .form-control:focus {
                border-color: #ea580c;
                box-shadow: 0 0 0 2px rgba(234, 88, 12, 0.2);
            }
            .btn-primary {
                background: linear-gradient(310deg, #ea580c, #facc15) !important;
                border: none;
            }
            .btn-primary:hover {
                background: linear-gradient(310deg, #c2410c, #eab308) !important;
                transform: translateY(-1px);
            }
            .text-primary {
                color: #ea580c !important;
            }
            .text-gradient {
                background: linear-gradient(310deg, #ea580c, #facc15);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .input-group-text {
                border-right: none;
            }
            .form-control {
                border-left: none;
            }
            .form-control:focus {
                border-left: none;
            }
            .input-group:focus-within .input-group-text {
                border-color: #ea580c;
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="auth-card">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
