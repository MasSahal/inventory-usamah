<?php
//ambil id dari url
$id = $_GET['id'];

//seleksi data berdasrkan id
$sql = mysqli_query($koneksi, "SELECT * FROM tb_riwayat WHERE id_riwayat='$id'");

//jadikan data menjadi array
$data = mysqli_fetch_assoc($sql);

//pilih buku sesuai id
$buku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$data[id_buku]'");
$buku2 = mysqli_fetch_assoc($buku);
?>
<div class="card p-4 shadow-sm bg-light mb-4">
    <h3 class="card-title mb-4">
        Detail Riwayat
    </h3>
    <div class="row">
        <table class="table table-borderless">
            <tr>
                <th>Id Buku</th>
                <td>:</td>
                <td><?=$data['id_buku'];?></td>
                <th>Tanggal Riwayat</th>
                <td>:</td>
                <td><?=$data['tanggal_riwayat'];?></td>
            </tr>
            <tr>
                <th>Judul Buku</th>
                <td>:</td>
                <td><?=$buku2['judul_buku'];?></td>
                <th>Status</th>
                <td>:</td>
                <td><?=$data['status_riwayat'];?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>:</td>
                <td><?=$data['jumlah'];?></td>
                <th>Keterangan</th>
                <td>:</td>
                <td><?=$data['ket_riwayat'];?></td>
            </tr>
        </table>
        <div class="col">
            <a href="riwayat.php" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
</div>