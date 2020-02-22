<?php

//ambil id dari url
$id = $_GET['id'];

//seleksi data pinjaman sesuai id
$sql_pinjaman = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_pinjaman='$id'");
$pinjaman = mysqli_fetch_assoc($sql_pinjaman);

//seleksi data buku sesuai id_buku
$sql_buku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$pinjaman[id_buku]'");
$buku = mysqli_fetch_assoc($sql_buku);

//tambah stok buku dengan stok pinjaman
$stok_buku_stlh_kembali = $pinjaman['jml_pinjaman'] + $buku['stok_buku'];

//update stok buku setelah dikembalikan
$up_stok_buku = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku='$stok_buku_stlh_kembali' WHERE id_buku='$pinjaman[id_buku]'");

//tanggal
date_default_timezone_set('ASIA/JAKARTA');
$tgl = date('Y-m-d');

//jika kondisi benar
if ($up_stok_buku) {
        
    //masukan data ke riwayat 
    $riwayat = mysqli_query($koneksi, "INSERT INTO tb_riwayat (id_buku, jumlah, tanggal_riwayat, status_riwayat, ket_riwayat)
    VALUES ('$pinjaman[id_buku]','$pinjaman[jml_pinjaman]','$tgl','Pengembalian','Pengembalian pinjaman sebanyak $pinjaman[jml_pinjaman] buku')");

    //update status pinjaman setelah dikembalikan
    mysqli_query($koneksi, "UPDATE tb_pinjaman SET status_pinjaman='Dikembalikan', jml_pinjaman='0' WHERE id_pinjaman='$id'");

    echo '<script>alert("Berhasil dikembalikan !");</script>';
    echo '<meta http-equiv="refresh" content="0; url=kembali.php#table">';
} else {
    echo '<script>alert("Gagal mengembalikan !");</script>';
    echo '<meta http-equiv="refresh" content="0; url=kembali.php#table">';
}