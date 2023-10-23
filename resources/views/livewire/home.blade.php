<div>
    <div class="container bg-Wwarning mb-4">
        <h1 class="display-4">Hai <b>{{ ucfirst(auth()->user()->name) }}</b></h1>
        <p class="lead">Sebuah projek yang dikerjakan ketika senggang dan dibangun menggunakan <a
                href="https://livewire.laravel.com" target="_blank" class="badge bg-warning text-dark">Livewire</a></p>
        <div class="d-flex">


        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            @include('components.home-card', [
                'title' => '📝 Notes Sederhana',
                'desc' => 'Bisa digunakan untuk membuat, mengedit, dan menghapus catatan.',
                'link' => 'notes',
            ])
        </div>
        <div class="col-sm-12 col-md-4">
            @include('components.home-card', [
                'title' => '✅ History',
                'desc' => 'Sebuah catatan kegiatan yang dilakukan pada website ini.',
                'link' => 'history',
            ])
        </div>
        <div class="col-sm-12 col-md-4">
            @include('components.home-card', [
                'title' => '⏰ Absen QR Code',
                'desc' => 'Absensi yang dilakukan hanya mencatat waktu masuk saja.',
                'link' => 'qr',
            ])
        </div>
    </div>
</div>
