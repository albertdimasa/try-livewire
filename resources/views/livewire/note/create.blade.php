<div>
    @if (session()->has('message'))
        <div class="alert alert-success" id="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Note</h5>
            <form wire:submit='{{ $isEdit ? "update($note->id)" : 'save' }}'>
                <div class="mb-3">
                    <label for="text" class="form-label">Masukkan Text</label>
                    <input type="text" class="form-control" wire:model='text'>
                    @error('text')
                        <div class="text-danger d-block mt-1">{{ $message }}</div>
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
@push('js')
    <script>
        document.addEventListener('notify', () => {
            // console.log(event);
            $('#alert').delay(500).fadeOut();
        });
    </script>
@endpush
