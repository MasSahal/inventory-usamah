<?php

//ambil id dari url
$id = $_GET['id'];

//seleksi data dengan id
$tambah = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");

//buat data menjadi array
$data = mysqli_fetch_assoc($tambah);
?>
<div class="card p-4 shadow-sm bg-light">
    <h3 class="card-title mb-4">
        Tambah Stok Buku <?=$data['judul_buku'];?>
    </h3>
    <form method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="stok_now">Stok Saat Ini</label>
                    <input type="text" readonly name="stok_now" id="stok_now" class="form-control" value="<?=$data['stok_buku'];?> Buku"aria-describedby="helpId">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="stok">Tambah Stok</label>
                    <input type="number" min="1" readnoly name="stok" id="stok" class="form-control" aria-describedby="helpId">
                </div>
            </div>
            <div class="col">
                <div class="tombol my-3 float-right">
                    <a href="buku.php" class="btn btn-sm btn-secondary">Kembali</a>
                    <input type="submit" class="btn btn-sm btn-info" name="tambah_stok" value="Tambah Sekarang">
                </div>
            </div>
        </div>
    </form>
</div>
<?php
//set jam ke jakarta
date_default_timezone_set('ASIA/JAKARTA');
if (isset($_POST['tambah_stok'])) {

    //ambil stok lama di data array diatas
    $stok_lama = $data['stok_buku'];
    $stok_baru = $_POST['stok'];
    $tgl = date('Y-m-d');

    //jumlahkan kedua stok
    $jumlah = $stok_lama + $stok_baru;

    //eksekusi query
    $up_stok = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku='$jumlah' WHERE id_buku='$id'");

    //jika kondisi benar
    if ($up_stok) {
        
        //masukan data ke riwayat 
        $riwayat = mysqli_query($koneksi, "INSERT INTO tb_riwayat (id_buku, jumlah, tanggal_riwayat, status_riwayat, ket_riwayat) VALUES ('$id','$stok_baru','$tgl','Stok Masuk','Tambah stok sejumlah $stok_baru buku')");

        echo '<script>alert("Berhasil menambah stok buku !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
    } else {
        echo '<script>alert("Gagal menambah stok buku !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
    }
}