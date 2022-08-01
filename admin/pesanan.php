<h2 class="mt-3">Daftar Pesanan</h2>
<!-- <div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="5" rowspan="2">No</th>
                <th scope="col" rowspan="2">Tempat Wisata</th>
                <th scope="col" width="100" rowspan="2">Nomor Identitas</th>
                <th scope="col" rowspan="2">Nama Lengkap</th>
                <th scope="col" rowspan="2">No. HP</th>
                <th scope="col" rowspan="2">Tanggal</th>
                <th scope="col" colspan="2" class="text-center">Pengunjung</th>
                <th scope="col" rowspan="2">Harga Tiket</th>
                <th scope="col" rowspan="2">Total Bayar</th>
            </tr>
            <tr>
                <th scope="col">Dewasa</th>
                <th scope="col">Anak-Anak</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM pesanan x JOIN wisata x1 ON x.wisata_id=x1.idwisata  ORDER BY idwisata DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['no_identitas']; ?></td>
                <td><?= $row['nama_lengkap']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['jml_dewasa'].' Orang'; ?></td>
                <td><?= $row['jml_anak'].' Orang'; ?></td>
                <td><?= money($row['harga']); ?></td>
                <td><?= money($row['total_bayar']); ?></td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
</div> -->

<div class="row">
    <?php 
    $n=1;
    $query = mysqli_query($con,"SELECT * FROM pesanan x JOIN wisata x1 ON x.wisata_id=x1.idwisata  ORDER BY idwisata DESC")or die(mysqli_error($con));
    while($row = mysqli_fetch_array($query)):
    ?>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td width="200">Nama Pemesan</td>
                        <td>: <?= $row['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Nomor Identitas</td>
                        <td>: <?= $row['no_identitas']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">No. HP</td>
                        <td>: <?= $row['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Tempat Wisata</td>
                        <td>: <?= $row['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Pengunjung Wisata</td>
                        <td>: <?= $row['jml_dewasa'].' Orang'; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Pengunjung Anak-Anak</td>
                        <td>: <?= $row['jml_anak'].' Orang'; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Harga Tiket</td>
                        <td>: <?= money($row['harga']); ?></td>
                    </tr>
                    <tr>
                        <td width="200">Total Bayar</td>
                        <td>: <?= money($row['total_bayar']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php 
    endwhile;
    ?>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/wisata.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nama" class="form-label">Nama Tempat</label>
                            <input type="text" class="form-control text-capitalize" id="nama" name="nama"
                                placeholder="Gunung Botak" required autofocus>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat" class="form-label">Alamat Tempat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="harga">Harga Tiket</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control uang" name="harga" required>
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="cover" class="form-label">Foto Cover</label>
                            <input class="form-control" type="file" id="cover" name="cover" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?=base_url();?>process/wisata.php" method="post">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="ModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data ini ?</p>
                    <input type="hidden" name="id">
                    <input type="hidden" name="oldImage">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" name="delete-wisata">Iya Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function deleteData(x) {
    $('#deleteModal').modal('show');
    $.ajax({
        type: "POST",
        data: {
            id: x
        },
        url: '<?= base_url(); ?>process/view_wisata.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.idwisata);
            $('[name="oldImage"]').val(data.cover);
        }
    });
}
</script>