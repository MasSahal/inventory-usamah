<?php
//ambil id dari url
$id = $_GET['id'];

//seleksi data berdasrkan id
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_pinjaman='$id'");

//jadikan data menjadi array
$data = mysqli_fetch_assoc($sql);

//pilih buku sesuai id
$buku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$data[id_buku]'");
$buku2 = mysqli_fetch_assoc($buku);
?>
<div class="card p-4 shadow-sm bg-light mb-4">
    <h3 class="card-title mb-4">
        Detail Riwayat <span>Id no : <?=$data['id_pinjaman'];?></span>
    </h3>
    <div class="row">
        <table class="table table-borderless">
            <tr>
                <th>Id Buku</th>
                <td>:</td>
                <td><?=$data['id_buku'];?></td>
                <th>Tanggal Pinjaman</th>
                <td>:</td>
                <td><?=$data['tanggal_pinjaman'];?></td>
            </tr>
            <tr>
                <th>Judul buku</th>
                <td>:</td>
                <td><?=$buku2['judul_buku'];?></td>
                <th>Status</th>
                <td>:</td>
                <td><?=$data['status_pinjaman'];?></td>
            </tr>
            <tr>
                <th>Nama Peminjam</th>
                <td>:</td>
                <td><?=$data['nama_peminjam'];?></td>
                <th>Keterangan</th>
                <td>:</td>
                <td><?=$data['detail_pinjaman'];?></td>
            </tr>
            <?php if($data['status_pinjaman']!=="Dikembalikan"){ ?>
                <tr>
                    <th>Jumlah Buku Pinjaman</th>
                    <td>:</td>
                    <td><?=$data['jml_pinjaman'];?></td>
                </tr>
            <?php } ?>
        </table>
        <div class="col">
            <a href="riwayat.php" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</div>