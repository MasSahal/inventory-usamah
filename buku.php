<?php require('koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Buku | Sinapers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/bootstrap2.min.css"> -->
</head>

<body style="background:#d1ccc0">

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5" style="background:#b33939">
                <h3 class="text-center font-weight-bold text-light mb-4">Sinapers</h3>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="index.php"> Home</a>
                    </li>
                    <li>
                        <a href="buku.php"> Data Buku</a>
                    </li>
                    <li>
                        <a href="pinjaman.php"> Pinjaman</a>
                    </li>
                    <li>
                        <a href="kembali.php"> Pengembalian</a>
                    </li> 
                    <li>
                        <a href="riwayat.php"> Riwayat</a>
                    </li>
                    <li>
                        <a href="anggota.php"> Anggota</a>
                    </li>
                </ul>

                <div class="footer">
                    <!-- masih tahap perbaikan -->
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-danger">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- <ul class="nav navbar-nav ml-auto" style="cursor: cursor">
                            <li class="nav-item ">
                                <span class="nav-link" href="#">Hi Admin</span>
                            </li>  
                        </ul> -->
                    </div>
                </div>
            </nav>

            <div class="content">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }else{
                    echo "";
                }

                switch (@$page) {
                    case 'edit':
                        include('page/edit_buku.php');
                        break;
                    case 'stok':
                        include('page/tambah_stok.php');
                        break;
                    
                    default:
                        
                        break;
                }
                ?>

                <div class="card p-4 bg-light shadow-sm mt-4">
                    <h2 class="card-title">Stok Buku Tersedia</h2>
                    <div class="row">
                        <div class="col my-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                + Tambah
                            </button>
                        </div>
                    </div>

                    <script>
                        $('#tambah').on('show.bs.modal', event => {
                            var button = $(event.relatedTarget);
                            var modal = $(this);
                            // Use above variables to manipulate the DOM

                        });
                    </script>
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Stok</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $sql_buku = mysqli_query($koneksi, "SELECT * FROM tb_buku ORDER BY tgl_masuk_buku DESC");
                            while ($data = mysqli_fetch_assoc($sql_buku)) {
                            ?>
                                <tr>
                                    <td><?= $data['id_buku']; ?></td>
                                    <td><?= $data['judul_buku']; ?></td>
                                    <td><?= $data['stok_buku']; ?></td>
                                    <td><?= $data['penerbit_buku']; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?=$data['id_buku']; ?>">
                                            <a href="?page=edit&id=<?=$data['id_buku']; ?>" name="ubah" class="btn btn-sm btn-default text-warning">Ubah</a>
                                            |
                                            <button type="submit" name="hapus" onclick="return confirm('Yakin ingin hapus Buku <?= $data['judul_buku']; ?>');" class="btn btn-sm btn-default text-danger">Hapus</button>
                                            |
                                            <a href="?page=stok&id=<?=$data['id_buku']; ?>" name="stok" class="btn btn-sm btn-default text-info">+ Stok</a>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="judul">Judul Buku</label>
                                                        <input type="text" class="form-control" name="judul" id="judul" aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pengarang">Pengarang Buku</label>
                                                        <input type="text" class="form-control" name="pengarang" id="pengarang" aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penerbit">Penerbit Buku</label>
                                                        <input type="text" class="form-control" name="penerbit" id="penerbit" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- ambil data tahun dari tahun 1800 ke aat ini -->
                                                        <?php $years = range(1900, strftime("%Y", time())); ?>

                                                        <label for="terbit">Tahun Terbit</label>
                                                        <select class="form-control" name="terbit" id="terbit">
                                                            <option>- Pilih -</option>
                                                            <?php foreach ($years as $year) : ?>
                                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="stok">Stok Buku</label>
                                                        <input type="number" min="1" class="form-control" name="stok" id="stok" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="sinopsis">Sinopsis Buku</label>
                                                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-sm btn-info" name="tambah_buku">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php

if (isset($_POST['tambah_buku'])) {

    $id = time();
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $terbit = $_POST['terbit'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];
    $tgl = date('Y-m-d');

    //jika ukuranfoto kurang dari 2mb
    if ($size_foto < 2048000) {

        //pindahkan file foto ke folder images
        move_uploaded_file($tmp_foto, "images/" . $nama_foto);

        //eksekusi query
        $tambah = mysqli_query($koneksi, "INSERT INTO 
        tb_buku(id_buku, judul_buku, pengarang_buku, penerbit_buku, isbn_buku, tahun_terbit, dimensi_buku, stok_buku, sinopsis_buku, foto_buku, tgl_masuk_buku)
        VALUES('$id','$judul','$pengarang','$penerbit','$isbn','$terbit','$dimensi','$stok','$sinopsis','$nama_foto','$tgl')");

        //jika query bernilai benar
        if ($tambah) {

            $riwayat = mysqli_query($koneksi,"INSERT INTO tb_riwayat (id_buku, jumlah, tanggal_riwayat, status_riwayat, ket_riwayat)
            VALUES('$id','$stok','$tgl','Masuk','Pemasukan Barang Baru')");
            
            echo '<script>alert("Berhasil menambahkan buku !");</script>';
            echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
        } else {
            echo '<script>alert("Gagal menambahkan buku !");</script>';
            echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
        }
    }
}
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_buku WHERE id_buku='$id'");

    //jika query bernilai benar
    if ($hapus) {

        echo '<script>alert("Berhasil mengahapus buku !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
    } else {
        echo '<script>alert("Gagal menghapus buku !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=buku.php#table">';
    }
}
?>