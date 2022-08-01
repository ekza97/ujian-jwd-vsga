<h2 class="mt-3">Selamat Datang Kembali</h2>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Tempat Wisata</h5>
                <h1><?= count_table('wisata'); ?> Tempat</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Pesanan</h5>
                <h1><?= count_table('pesanan'); ?> Pesanan</h1>
            </div>
        </div>
    </div>
</div>