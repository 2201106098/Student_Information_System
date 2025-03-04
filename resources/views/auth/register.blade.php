<x-guest-layout>
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
    </style>

    <div class="login-container">
       
            <div class="card-header text-center bg-transparent">
                <h3 class="text-gradient">BSU Register</h3>
                <p class="mb-0 text-sm">Create your account</p>
            </div>
            <div class="card-body px-md-4 py-md-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
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
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-dark">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   placeholder="Email" 
                                   value="{{ old('email') }}" 
                                   required>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
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
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-user-plus"></i> Sign up
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-primary font-weight-bold">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
