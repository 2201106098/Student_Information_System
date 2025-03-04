<x-guest-layout>
    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Add custom styles -->
    <style>
        body {
            background: url('/assets/img/BUKIDNON-STATE-U.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .card-plain {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            width: 100%;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.8);
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
            padding: 0.6rem;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 1rem;
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
        .form-check {
            margin: 0.75rem 0;
        }
        .form-check-input {
            margin-right: 0.4rem;
            border-radius: 3px;
            width: 16px;
            height: 16px;
        }
        .form-check-input:checked {
            background-color: #1a237e;
            border-color: #1a237e;
        }
        .form-check-label {
            font-size: 0.8rem;
            color: #6c757d;
        }
        .card-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 0.75rem;
            margin-top: 1rem;
        }
        .card-footer a {
            color: #1a237e;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        /* Target specifically the Sign up link */
        .card-footer p a[href*="register"] {
            color: #ff8c00 !important; /* Orange color with !important to override */
            font-weight: 700;
        }
        
        .card-footer a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }
        .mb-3 {
            margin-bottom: 0.75rem;
        }
        .text-sm {
            font-size: 0.8rem;
            color: #6c757d;
        }
        .card-footer p {
            margin: 0.4rem 0;
        }
    </style>

    <div class="login-container">
        <div class="card card-plain">
            <div class="card-header text-center bg-transparent">
                <h3 class="text-gradient">BSU Login</h3>
                <p class="mb-0 text-sm">Sign in to your account</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" role="form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   placeholder="your.email@example.com" 
                                   value="{{ old('email') }}" 
                                   required>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="error-message" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" 
                                   name="password" 
                                   class="form-control" 
                                   placeholder="Enter password" 
                                   required>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="error-message" />
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign in
                    </button>
                </form>
            </div>
            <div class="card-footer text-center">
                <p class="text-sm">
                    Don't have an account?
                    <a href="{{ route('register') }}">Sign up</a>
                </p>
                @if (Route::has('password.request'))
                    <p class="text-sm mb-0">
                        <a href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
