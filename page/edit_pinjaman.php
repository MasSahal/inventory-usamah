<?php

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_pinjaman='$id'");
$data = mysqli_fetch_assoc($sql);

//pilih buku sesuai id
$buku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$data[id_buku]'");
$buku2 = mysqli_fetch_assoc($buku);
var_dump($data);
?>
<div class="card p-4 sahdow-sm bg-light mb-4">
    <h2 class="card-title">Ubah Data Pinjaman</h2>
    <form method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="id_peminjam">Nama Peminjam</label>
                    <select class="form-control" name="id_peminjam" id="id_peminjam">
                        <option value="<?= $data['id_anggota']; ?>"><?= $data['nama_peminjam']; ?></option>
                        <?php
                        $nama_anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                        while ($anggota = mysqli_fetch_assoc($nama_anggota)) {
                        ?>
                            <option value="<?= $anggota['id_anggota']; ?>"><?= $anggota['nama_anggota']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_buku">Buku Pinjaman</label>
                    <select class="form-control" name="id_buku" id="id_buku">
                        <option value="<?= $data['id_buku']; ?>"><?= $buku2['judul_buku']; ?></option>
                        <?php
                        $nama_anggota = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                        while ($buku = mysqli_fetch_assoc($nama_anggota)) {
                        ?>
                            <option value="<?= $buku['id_buku']; ?>"><?=$buku['judul_buku']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="detail">Detail Pinjaman</label>
                    <textarea class="form-control" name="detail" id="detail" rows="5"><?=$data['detail_pinjaman']; ?></textarea>
                </div>
            </div>
            <div class="col py-3">
                <div class="float-right">
                    <a href="anggota.php" class="btn btn-sm btn-secondary">Kembali</a>
                    <input type="submit" class="btn btn-sm btn-info" name="simpan_ubah" value="Simpan Perubahan">
                </div>
            </div>
        </div>
    </form>
</div>
<?php

if (isset($_POST['simpan_ubah'])) {

    $id_anggota = $_POST['id_peminjam'];
    $id_buku = $_POST['id_buku'];
    $detail = $_POST['detail'];
    
    //pilih nama peminjam sesuai id
    $sql_org = mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'");
    $org_pinjem = mysqli_fetch_assoc($sql_org);
    $org_baru = $org_pinjem['nama_anggota'];

    //pilih nama buku sesuai id
    $sql_buku = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
    $buku_pinjem = mysqli_fetch_assoc($sql_buku);
    $buku_baru = $org_pinjem['judul_buku'];

    //eksekusi query
    $up = mysqli_query($koneksi, "UPDATE tb_pinjaman SET id_buku='$id_buku', id_anggota='$id_anggota', nama_peminjam='$org_baru', detail_pinjaman='$detail' WHERE id_pinjaman='$id'");
    //jika query bernilai benar
    if ($up) {
        echo '<script>alert("Berhasil mengubah data pinjaman !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=pinjaman.php#table">';
    } else {
        echo '<script>alert("Gagal mengubah data pinjaman !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=pinjaman.php#table">';
    }
}
?>