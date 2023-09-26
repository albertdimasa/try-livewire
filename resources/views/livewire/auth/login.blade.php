<div>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-danger" id="alert">
                {{ session('message') }}
            </div>
        @endif
        <h5 class="card-title">Login</h5>
        <hr>
        <form wire:submit="login">
            <div class="form-group">
                <label class="font-weight-bold mb-1">Email</label>
                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Alamat Email" autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold mb-1">Password</label>
                <div class="input-group mb-3">
                    <input type="{{ $show_text ? $show_text : 'password' }}" wire:model="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <button class="btn btn-outline-secondary" type="button" wire:click='show_password'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary btn-block">Login</button>
            <h6 class="mt-2 btn btn-sm btn-success" wire:click='akun_demo'>Gunakan Akun Demo</h6>
            <p class="mt-1">Daftar dulu yuk! <a wire:navigate href="{{ route('register') }}">Register</a>
            </p>
        </form>
    </div>
</div>
