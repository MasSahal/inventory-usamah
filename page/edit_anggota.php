<?php

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_anggota='$id'");
$data = mysqli_fetch_assoc($sql);
?>
<div class="card p-4 sahdow-sm bg-light">
    <h2 class="card-title">Ubah Anggota</h2>
    <form method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?=$data['nama_anggota'];?>" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?=$data['email_anggota'];?>" aria-describedby="helpId">
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
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $up = mysqli_query($koneksi, "UPDATE tb_anggota SET nama_anggota='$nama', email_anggota='$email' WHERE id_anggota='$id'");
        //jika query bernilai benar
    if ($up) {
        echo '<script>alert("Berhasil menhubah anggota !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=anggota.php#table">';
    } else {
        echo '<script>alert("Gagal mengubah anggota !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=anggota.php#table">';
    }
}
?>