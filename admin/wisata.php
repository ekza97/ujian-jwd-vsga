<h2 class="mt-3">Data Wisata</h2>
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
<a href="" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addModal"><i
        data-feather="plus"></i> Tambah</a>
<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="5">No</th>
                <th scope="col" width="100">Cover</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Alamat Tempat</th>
                <th scope="col">Harga</th>
                <th scope="col" width="100">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM wisata ORDER BY idwisata DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td>
                    <img src="uploads/wisata/cover/<?= $row['cover']; ?>" alt="Cover" class="img-thumbnail rounded"
                        width="100">
                </td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= money($row['harga']); ?></td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="deleteData(<?= $row['idwisata'] ?>)">
                        <i data-feather="trash"></i>
                        Hapus
                    </button>
                </td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
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
                            <small class="text-danger">Ukuran maksimal <strong>2 MB</strong>. Type file yang diterima
                                <strong>.jpg .png .jpeg</strong></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="simpan"><i data-feather="save"></i>
                        Simpan</button>
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
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-danger" name="delete-wisata"><i data-feather="trash"></i> Iya
                        Hapus</button>
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