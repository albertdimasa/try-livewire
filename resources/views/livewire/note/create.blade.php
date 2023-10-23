<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Note</h5>
            <form wire:submit='{{ $isEdit ? "update($note->id)" : 'save' }}'>
                <div class="mb-3">
                    <label for="text" class="form-label">Masukkan Text</label>
                    <input type="text" class="form-control @error('text') is-invalid @enderror" wire:model='text'
                        autofocus>
                    @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @if ($isEdit)
                    <button type="submit" class="btn btn-success">Update</button>
                @else
                    <button type="submit" class="btn btn-primary">Save</button>
                @endif

            </form>
        </div>
    </div>
</div>
