<?php require('koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Anggota | Sinapers</title>
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
                        include('page/edit_anggota.php');
                        break;
                    
                    default:
                        
                        break;
                }
                ?>

                <div class="card p-4 bg-light shadow-sm mt-4">
                    <h2 class="card-title">Daftar Anggota</h2>
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
                                <th>Id Anggota</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Gabung</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $sql_buku = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                            while ($data = mysqli_fetch_assoc($sql_buku)) {
                            ?>
                                <tr>
                                    <td><?= $data['id_anggota']; ?></td>
                                    <td><?= $data['nama_anggota']; ?></td>
                                    <td><?= $data['email_anggota']; ?></td>
                                    <td><?= date('D, M Y', strtotime($data['tanggal_gabung'])); ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?=$data['id_anggota']; ?>">
                                            <a href="?page=edit&id=<?=$data['id_anggota']; ?>" name="ubah" class="btn btn-sm btn-default text-warning">Ubah</a>
                                            |
                                            <button type="submit" name="hapus" onclick="return confirm('Yakin ingin hapus <?= $data['nama_anggota']; ?>');" class="btn btn-sm btn-default text-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Anggota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="pengarang" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-sm btn-info" name="tambah">Tambah</button>
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

if (isset($_POST['tambah'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tgl = date('Y-m-d');

    $tambah = mysqli_query($koneksi, "INSERT INTO tb_anggota (nama_anggota, email_anggota, tanggal_gabung) VALUES ('$nama','$email','$tgl')");
        //jika query bernilai benar
    if ($tambah) {
        echo '<script>alert("Berhasil menambahkan anggota !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=anggota.php#table">';
    } else {
        echo '<script>alert("Gagal menambahkan anggota !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=anggota.php#table">';
    }
}
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_anggota WHERE id_anggota='$id'");

    //jika query bernilai benar
    if ($hapus) {

        echo '<script>alert("Berhasil mengahapus anggota !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=anggota.php#table">';
    } else {
        echo '<script>alert("Gagal menghapus anggota !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=anggota.php#table">';
    }
}

?>