<div class="row">
    <div class="col-sm-12 col-md-4">
        <div id="qrcode" class="bg-white p-3 m-1" style="width: 18rem;"></div>
    </div>
    <div class="col-sm-12 col-md-8 my-3 pe-5" style="text-align: justify">
        <h3>Petunjuk</h3>
        <p>Absensi dengan QR code adalah metode modern yang efisien dan akurat untuk mencatat kehadiran peserta dengan
            memindai kode QR yang unik yang terhubung ke informasi identifikasi individu. QR Code tersebut akan dipindai
            oleh petugas yang berjaga didepan.</p>
    </div>
</div>
@push('js')
    <script type="text/javascript">
        var qrcode = new QRCode("qrcode");

        function datetime_format(params) {
            const dateFormat = new Date(params).toISOString().slice(0, 10);;
            const timeFormat = new Date(params).toLocaleString("en-GB", {
                timeStyle: 'medium',
            });

            return dateFormat + " " + timeFormat;
        }

        function qrcoderefresh() {
            var timestamp = new Date().getTime();
            var date = datetime_format(timestamp);
            var id = {{ auth()->id() }}
            qrcode.makeCode(timestamp + "-" + id);
        }

        Window.onload = qrcoderefresh();
        setInterval(qrcoderefresh, 10000);
    </script>
@endpush
