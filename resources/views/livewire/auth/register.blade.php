<div>
    <div class="card-body">
        <h5 class="card-title">Register</h5>
        <hr>
        <form wire:submit="store">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Nama Lengkap</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama lengkap" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Email</label>
                        <input type="email" wire:model="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Password</label>
                        <input type="password" wire:model="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Konfirmasi Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control"
                            placeholder="Konfirmasi Password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Register</button>
            <p class="mt-1">Sudah punya akun? <a wire:navigate href="{{ route('auth.login') }}">Login</a></p>

        </form>
    </div>
</div>
