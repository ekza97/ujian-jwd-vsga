<h2 class="mt-3">Form Pemesanan</h2>

<?php if (isset($_SESSION['success'])) : ?>
<div class="alert alert-success fade show" role="alert">
    <strong>Berhasil !</strong> <?= $_SESSION['success']; ?>.
</div>
<?php endif;
unset($_SESSION['success']); ?>
<?php if (isset($_SESSION['error'])) : ?>
<div class="alert alert-danger fade show" role="alert">
    <strong>Error !</strong> <?= $_SESSION['error']; ?>.
</div>
<?php endif;
unset($_SESSION['error']); ?>
<div class="card">
    <div class="card-body">
        <form class="mt-3" action="process/pesan_tiket.php" method="post">
            <div class="row mb-3">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control text-capitalize" id="nama_lengkap" name="nama_lengkap"
                        autofocus required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="no_identitas" class="col-sm-3 col-form-label">Nomor Indentitas</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control nip" id="no_identitas" name="no_identitas" minlength="16"
                        maxlength="16" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control no_hp" id="no_hp" name="no_hp" minlength="12" maxlength="12"
                        placeholder="0812xxxxxxxx" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="wisata_id" class="col-sm-3 col-form-label">Tempat Wisata</label>
                <div class="col-sm-9">
                    <select class="form-select" name="wisata_id" id="wisata_id" onchange="getHargaTiket(this)" required>
                        <option value="">Pilih Tempat Wisata</option>
                        <?= list_wisata(); ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jml_dewasa" class="col-sm-3 col-form-label">Pengunjung Dewasa</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="jml_dewasa" name="jml_dewasa" value="0" min="0"
                            required>
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jml_anak" class="col-sm-3 col-form-label">Pengunjung Anak-Anak</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="jml_anak" name="jml_anak" value="0" min="0"
                            required>
                        <span class="input-group-text">,00</span>
                    </div>
                    <small class="text-danger">Usia dibawah 12 tahun</small>
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga_tiket" class="col-sm-3 col-form-label">Harga Tiket</label>
                <div class="col-sm-9">
                    <input type="hidden" class="form-control" id="harga_tikets" name="harga_tiket" value="0" readonly>
                    <h4 id="harga_tiket"></h4>
                </div>
            </div>
            <div class="row mb-3">
                <label for="total_bayar" class="col-sm-3 col-form-label">Total Bayar</label>
                <div class="col-sm-9">
                    <input type="hidden" class="form-control uang" id="total_bayar" name="total_bayar" value="0"
                        readonly>
                    <h4 id="t_bayar"></h4>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9 offset-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="syarat" name="syarat" required>
                        <label class="form-check-label" for="syarat">
                            Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan
                            yang elah ditetapkan
                        </label>
                    </div>
                </div>
            </div>
            <div class="offset-sm-3">
                <button type="button" class="btn btn-primary" onclick="hitungTotalBayar()">Hitung Total Bayar</button>
                <button type="submit" class="btn btn-success" name="pesan">Pesan Tiket</button>
                <a href="index.php?pesan-tiket" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script>
function hitungTotalBayar() {
    let dewasa = $('[name="jml_dewasa"]').val();
    let anak = $('[name="jml_anak"]').val();
    let harga = $('[name="harga_tiket"]').val();
    let total = hargaDewasa() + hargaAnak();
    $('#t_bayar').html(formatUang(total));
    $('[name="total_bayar"]').val(total);
}

function hargaDewasa() {
    let dewasa = $('[name="jml_dewasa"]').val();
    let harga = $('[name="harga_tiket"]').val();
    return dewasa * harga;
}

function hargaAnak() {
    let anak = $('[name="jml_anak"]').val();
    let harga = $('[name="harga_tiket"]').val();
    return anak * ((harga * 50) / 100);
}

function formatUang(angka) {
    let format = angka.toString().split('').reverse().join('');
    let convert = format.match(/\d{1,3}/g);
    let rupiah = 'Rp. ' + convert.join('.').split('').reverse().join('') + ',00';
    return rupiah;
}

function getHargaTiket(x) {
    $.ajax({
        type: "POST",
        data: {
            id: x.value
        },
        url: '<?= base_url(); ?>process/view_wisata.php',
        dataType: 'json',
        success: function(data) {
            $('#harga_tiket').html(formatUang(data.harga));
            $('[name="harga_tiket"]').val(data.harga);
        }
    });
}
</script>