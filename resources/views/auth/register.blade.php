<x-guest-layout>
    <div class="card card-plain">
        <div class="card-header text-center bg-transparent">
            <h3 class="font-weight-bolder text-gradient mb-0">Create Account</h3>
            <p class="mb-0 text-sm text-dark">Enter your details to register</p>
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
                    <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">
                        Sign up
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
</x-guest-layout>
