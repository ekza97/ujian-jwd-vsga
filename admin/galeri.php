<h2 class="mt-3">Data Wisata Galeri</h2>
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
<a href="" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addModalFoto"><i
        data-feather="plus"></i> Tambah Foto</a>
<a href="" class="btn btn-sm btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addModalVideo"><i
        data-feather="plus"></i> Tambah Video</a>
<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" width="5">No</th>
                <th scope="col" width="200">File</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col" width="100">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $query = mysqli_query($con,"SELECT * FROM wisata_galery x JOIN wisata x1 ON x.wisata_id=x1.idwisata ORDER BY idwisata_galery DESC")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($query)):
            ?>
            <tr>
                <td><?= $n++; ?></td>
                <td>
                    <?php 
                    $path = base_url()."uploads/wisata/gallery/".$row['file'];
                    $ext = pathinfo($path,PATHINFO_EXTENSION);
                    if($ext=="jpg" || $ext=="png" || $ext=="jpeg"):
                    ?>
                    <img src="<?=base_url();?>uploads/wisata/gallery/<?= $row['file']; ?>" alt="File"
                        class="img-thumbnail rounded" width="200">
                    <?php else: ?>
                    <iframe width="200" height="200" src="https://www.youtube.com/embed/<?= $row['file']; ?>?controls=1"
                        allowfullscreen>
                    </iframe>
                    <?php endif; ?>
                </td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="deleteData(<?= $row['idwisata_galery'] ?>)">
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
<div class="modal fade" id="addModalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/galeri.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="wisata_id" class="form-label">Wisata</label>
                            <select class="form-select" name="wisata_id" id="wisata_id" required>
                                <option value="">Pilih Tempat Wisata</option>
                                <?= list_wisata() ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="file" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="file" name="file" required>
                            <small class="text-danger">Ukuran maksimal <strong>10 MB</strong>. Type file yang diterima
                                <strong>.jpg .png .jpeg</strong></small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="keterangan" class="form-label">Keterangan File</label>
                            <input type="text" class="form-control text-capitalize" id="keterangan" name="keterangan"
                                placeholder="Video Drone" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="simpan-foto"><i data-feather="save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addModalVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url();?>process/galeri.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Tambah Data Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="wisata_id" class="form-label">Wisata</label>
                            <select class="form-select" name="wisata_id" id="wisata_id" required>
                                <option value="">Pilih Tempat Wisata</option>
                                <?= list_wisata() ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="file" class="form-label">Link Video</label>
                            <input type="text" class="form-control" id="file" name="file"
                                placeholder="Url video dari youtube" required>
                            <small class="text-danger">Ambil kode video di URl. Contoh :
                                <strong>https://www.youtube.com/watch?v=feoRIr5MNHM</strong>. Cukup ambil
                                <strong>feoRIr5MNHM</strong></small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="keterangan" class="form-label">Keterangan File</label>
                            <input type="text" class="form-control text-capitalize" id="keterangan" name="keterangan"
                                placeholder="Video Drone" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i data-feather="x"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary" name="simpan-video"><i data-feather="save"></i>
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
            <form action="<?=base_url();?>process/galeri.php" method="post">
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
                    <button type="submit" class="btn btn-danger" name="delete-galeri"><i data-feather="trash"></i> Iya
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
        url: '<?= base_url(); ?>process/view_galeri.php',
        dataType: 'json',
        success: function(data) {
            $('[name="id"]').val(data.idwisata_galery);
            $('[name="oldImage"]').val(data.file);
        }
    });
}
</script>