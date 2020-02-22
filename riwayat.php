<?php require('koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Riwayat | Sinapers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/bootstrap2.min.css"> -->
</head>

<body style="background:#d1ccc0">

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="">
            <div class="p-4 pt-5" style="background:#b33939">
                <h3 class="text-center font-weight-bold text-light mb-4">Sinapers</h3>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="index.php"> Home</a>
                    </li>
                    <li>
                        <a href="buku.php"> Buku</a>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- <ul class="nav navbar-nav ml-auto">
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
                        case 'detail':
                            include('page/detail_riwayat.php');
                            break;
                        
                        default:
                            
                            break;
                    }
                ?>
                <div class="card p-4 shadow-sm bg-light">
                    <h3 class="card-title">Daftar Riwayat</h3>
                    <table class="table" id="riwayat">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Buku</th>
                                <th>Judul Buku</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            $sql_buku = mysqli_query($koneksi, "SELECT tb_buku.judul_buku, tb_riwayat.* FROM tb_riwayat INNER JOIN tb_buku ON tb_buku.id_buku=tb_riwayat.id_buku  ORDER BY tb_riwayat.tanggal_riwayat DESC");
                            while ($data = mysqli_fetch_assoc($sql_buku)) {
                            ?>
                                <tr>
                                    <td><?= $no +=1;; ?></td>
                                    <td><?= $data['id_buku']; ?></td>
                                    <td><?= $data['judul_buku']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= $data['tanggal_riwayat']; ?></td>
                                    <td><?= $data['status_riwayat']; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?=$data['id_riwayat']; ?>">
                                            <button type="submit" name="hapus" onclick="return confirm('Yakin ingin hapus ID : <?= $data['id_riwayat']; ?>');" class="btn btn-sm btn-default text-danger">Hapus</button>
                                            |
                                            <a href="?page=detail&id=<?=$data['id_riwayat'];?>" class="btn btn-sm btn-default text-info">Detail</a>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>
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
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_riwayat WHERE id_riwayat='$id'");

    //jika query bernilai benar
    if ($hapus) {

        echo '<script>alert("Berhasil mengahapus riwayat !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=riwayat.php#table">';
    } else {
        echo '<script>alert("Gagal menghapus riwayat !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=riwayat.php#table">';
    }
}
?>