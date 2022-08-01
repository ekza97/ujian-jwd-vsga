<!-- Content awal  -->
<div class="container-fluid">
    <div class="row">
        <?php 
        $n=1;
        $query = mysqli_query($con,"SELECT * FROM wisata ORDER BY idwisata DESC")or die(mysqli_error($con));
        while($row = mysqli_fetch_array($query)):
        ?>
        <div class="col-md-4 mt-3 mb-3">
            <div class="card">
                <img src="<?=base_url();?>uploads/wisata/cover/<?=$row['cover'];?>" class="card-img-top" alt="Cover"
                    style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama']; ?></h5>
                    <p class="card-text"><?= $row['alamat']; ?></p>
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#galeriModal<?= $row['idwisata']; ?>">Galeri</button>
                    <!-- Galeri Modal -->
                    <div class="modal fade" id="galeriModal<?= $row['idwisata']; ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Galeri Wisata <?= $row['nama']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <?php 
                                        $id = $row['idwisata'];
                                        $query2 = mysqli_query($con,"SELECT * FROM wisata_galery WHERE wisata_id=$id ORDER BY idwisata_galery DESC")or die(mysqli_error($con));
                                        while($galeri = mysqli_fetch_array($query2)):
                                        ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <?php 
                                                $path = base_url()."uploads/wisata/gallery/".$galeri['file'];
                                                $ext = pathinfo($path,PATHINFO_EXTENSION);
                                                if($ext=="jpg" || $ext=="png" || $ext=="jpeg"):
                                                ?>
                                                <img src="<?=base_url();?>uploads/wisata/gallery/<?= $galeri['file']; ?>"
                                                    alt="File" class="img-thumbnail rounded" style="height: 300px;">
                                                <?php else: ?>
                                                <iframe height="300"
                                                    src="https://www.youtube.com/embed/<?= $galeri['file']; ?>?controls=1"
                                                    allowfullscreen>
                                                </iframe>
                                                <?php endif; ?>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $galeri['keterangan']; ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        endwhile;
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                            data-feather="x"></i>
                                        Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        endwhile;
        ?>
    </div>
</div>
<!-- Content akhir  -->