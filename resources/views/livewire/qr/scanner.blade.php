<div class="row">
    <div class="col">
        <div id="reader"></div>
    </div>
    <div class="col">
        @if (session()->has('message'))
            <div class="alert alert-danger" id="alert">
                {{ session('message') }}
            </div>
        @endif
        <table id="hasilScan" class="table-responsive table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Clock In</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->clock_in }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Data Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@push('js')
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            Livewire.dispatch('AbsenCreated', {
                data: decodedText
            })

            html5QrcodeScanner.clear();
            setInterval(function() {
                location.reload(true)
            }, 2500);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250,
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
