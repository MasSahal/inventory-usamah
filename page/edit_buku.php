<?php

//ambil data id
$id = $_GET['id'];

//seleksi data berdasarkan id
$ubah = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");

//buat data menjadi array
$data = mysqli_fetch_assoc($ubah);
?>

<div class="card p-4 shadow-sm bg-light">
    <h2 class="card-title">
        Edit Buku <?= $data['judul_buku']; ?>
    </h2>
    <form method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?=$data['judul_buku'];?>" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang Buku</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?=$data['pengarang_buku'];?>" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit Buku</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?=$data['penerbit_buku'];?>" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN Buku</label>
                    <input type="number" min="1" class="form-control" name="isbn" id="isbn" value="<?=$data['isbn_buku'];?>" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <!-- ambil data tahun dari tahun 1800 ke aat ini -->
                    <?php $years = range(1900, strftime("%Y", time())); ?>
    
                    <label for="terbit">Tahun Terbit</label>
                    <select class="form-control" name="terbit" id="terbit">
                        <option>- Pilih -</option>
                        <option value="<?=$data['tahun_terbit'];?>" selected><?=$data['tahun_terbit'];?></option>
                        <?php foreach ($years as $year) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dimensi">Dimensi Buku</label>
                    <input type="text" class="form-control" name="dimensi" value="<?=$data['dimensi_buku'];?>" id="dimensi" aria-describedby="helpId" placeholder="P x L x T">
                </div>
                <div class="form-group">
                    <label for="foto">Foto Buku</label><br>
                    <img src="images/<?=$data['foto_buku'];?>" width="200" alt="Foto">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="sinopsis">Sinopsis Buku</label>
                    <textarea class="form-control" name="sinopsis" id="sinopsis" rows="5"><?=$data['sinopsis_buku'];?></textarea>
                </div>
                <div class="tombol my-3 float-right">
                    <a href="buku.php" class="btn btn-sm btn-secondary">Kembali</a>
                    <input type="submit" class="btn btn-sm btn-info" name="simpan_ubah" value="Simpan Perubahan">
                </div>
            </div>
        </div>
    </form>
</div>
<?php
    if (isset($_POST['simpan_ubah'])) {

        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $isbn = $_POST['isbn'];
        $terbit = $_POST['terbit'];
        $dimensi = $_POST['dimensi'];
        $sinopsis = $_POST['sinopsis'];

        //query edit
        $sql = "UPDATE tb_buku SET judul_buku='$judul', pengarang_buku='$pengarang', penerbit_buku='$penerbit', isbn_buku='$isbn', tahun_terbit='$terbit', dimensi_buku='$dimensi', sinopsis_buku='$sinopsis' WHERE id_buku='$id'";
        
        //eksekusi query update
        $up = mysqli_query($koneksi, $sql);
        
        // jika kondisi bernilai bnar
        if ($up) {
            echo '<script>alert("Berhasil mengubah buku !");</script>';
            echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
        } else {
            echo '<script>alert("Gagal mengubah buku !");</script>';
            echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
        }
    }
?>