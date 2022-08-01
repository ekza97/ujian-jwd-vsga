<h2 class="mt-3">Daftar Harga</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Alamat</th>
                <th scope="col">Harga</th>
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
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td align="right"><?= money($row['harga']); ?></td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
</div>