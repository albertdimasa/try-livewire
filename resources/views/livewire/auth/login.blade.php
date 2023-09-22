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
                <input type="password" wire:model="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            <p class="mt-1">Daftar dulu yuk! <a wire:navigate href="{{ route('auth.register') }}">Register</a></p>
        </form>
    </div>
</div>
