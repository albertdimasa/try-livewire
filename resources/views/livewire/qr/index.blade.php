<div>
    <div class="card">
        <h5 class="card-header bg-primary">Absen QR Code</h5>
        <div class="card-body">
            @role('user')
                @include('livewire.qr.qrcode')
            @endrole

            @role('admin')
                @include('livewire.qr.scanner')
            @endrole
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', (event) => {
                console.log(event[0]);
                if (event[0] == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Absen Hari Ini',
                        showConfirmButton: false,
                        timer: 1300
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Anda Sudah Absen',
                        showConfirmButton: false,
                        timer: 1300
                    })
                }

            });
        });
    </script>
@endpush
