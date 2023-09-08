<div>
    @if (session()->has('message'))
        <div class="alert alert-success" id="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Note</h5>
            <form wire:submit='save'>
                <div class="mb-3">
                    <label for="text" class="form-label">Masukkan Text</label>
                    <input type="text" class="form-control" wire:model='text'>
                    @error('text')
                        <div class="text-danger d-block mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
