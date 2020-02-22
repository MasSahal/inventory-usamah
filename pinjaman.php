<?php require('koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Home | Sinapers</title>
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
                    case 'edit':
                        include('page/edit_pinjaman.php');
                        break;
                    case 'detail':
                        include('page/detail_pinjaman.php');
                        break;
                    
                    default:
                        
                        break;
                }
                ?>
                <div class="card p-4 shadow-sm bg-light">
                    <h2 class="card-title">
                        Daftar peminjam Buku
                    </h2>
                    <div class="row">
                        <div class="col my-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                + Tambah Pinjaman
                            </button>
                        </div>
                    </div>
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Peminjam</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman ORDER BY tanggal_pinjaman DESC");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no += 1; ?></td>
                                    <td><?= $data['id_buku']; ?></td>
                                    <td><?= $data['nama_peminjam']; ?></td>
                                    <td><?= date('D, M Y', strtotime($data['tanggal_pinjaman'])); ?></td>
                                    <td><?= $data['status_pinjaman']; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?= $data['id_pinjaman']; ?>">
                                            <?php if($data['status_pinjaman']=="Sedang Dipinjam"){ ?>
                                                <a href="?page=edit&id=<?= $data['id_pinjaman']; ?>" class="btn btn-sm btn-default text-warning">Ubah</a>
                                                |
                                            <?php } elseif($data['status_pinjaman']=="Dikembalikan"){ ?>
                                                <button type="submit" class="btn btn-sm btn-default disabled" readonly >Ubah</button>
                                                |
                                            <?php } ?>
                                            <button type="submit" name="hapus" onclick="return confirm('Yakin ingin hapus <?= $data['nama_peminjam']; ?>');" class="btn btn-sm btn-default text-danger">Hapus</button>
                                            |
                                            <a href="?page=detail&id=<?= $data['id_pinjaman']; ?>" class="btn btn-sm btn-default text-info">Detail</a>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pinjaman Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama Peminjam</label>
                                        <select class="form-control" name="nama" id="nama">
                                            <option>- Pilih -</option>
                                            <?php
                                            $nama_anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                                            while ($data = mysqli_fetch_assoc($nama_anggota)) {
                                            ?>
                                            <option value="<?=$data['id_anggota'];?>"><?=$data['nama_anggota'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="buku">Buku Pinjaman</label>
                                        <select class="form-control" name="buku" id="buku">
                                            <option>- Pilih -</option>
                                            <?php
                                            $nama_anggota = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                                            while ($data = mysqli_fetch_assoc($nama_anggota)) {
                                            ?>
                                            <option value="<?=$data['id_buku'];?>"><?=$data['judul_buku'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" max="<?=$data['stok_buku'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="detail">Detail Pinjaman</label>
                                        <textarea class="form-control" name="detail" id="detail" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-info" name="tambah_pinjaman">Tambah</button>
                    </div>
                </form>
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
//set tanggal ke jakarta
date_default_timezone_set('ASIA/JAKARTA');

if (isset($_POST['tambah_pinjaman'])) {

    $id_anggota = $_POST['nama'];
    $id_buku = $_POST['buku'];
    $detail = $_POST['detail'];
    $jumlah = $_POST['jumlah'];
    $tgl = date('Y-m-d');

    //ambil data buku sesuai id buku
    $sql = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
    $buku = mysqli_fetch_assoc($sql);

    //ambil data anggota sesuai id anggota
    $sql2 = mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'");
    $anggota = mysqli_fetch_assoc($sql2);
    $nama_peminjam = $anggota['nama_anggota'];

     //stok asli di kurangi stok pinjaman
    $stok_stlh_pinjam = $buku['stok_buku'] - $jumlah;

    if ($jumlah <= $buku['stok_buku']) {

        $pinjam = mysqli_query($koneksi, "INSERT INTO tb_pinjaman (id_buku, id_anggota, nama_peminjam, detail_pinjaman, tanggal_pinjaman, status_pinjaman, jml_pinjaman)
        VALUES ('$id_buku','$id_anggota','$nama_peminjam','$detail','$tgl','Sedang Dipinjam','$jumlah')");
        

        //jika kondisi benar
        if ($pinjam) {

            //masukan data ke riwayat
            $riwayat = mysqli_query($koneksi,"INSERT INTO tb_riwayat (id_buku, jumlah, tanggal_riwayat, status_riwayat, ket_riwayat)
                VALUES('$id_buku','$jumlah','$tgl','Pinjaman Buku','$detail')");

            //update stok buku setelah di pinjam
            mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku='$stok_stlh_pinjam' WHERE id_buku='$id_buku'");

            echo '<script>alert("Berhasil meminjam buku!");</script>';
            echo '<meta http-equiv="refresh" content="0; url=pinjaman.php#table">';
        } else {
            echo '<script>alert("Gagal meminjam buku !");</script>';
            echo '<meta http-equiv="refresh" content="0; url=pinjaman.php#table">';
        }
    }else{
        echo "<script>alert('Buku terlalu banayak dipinjam !')</script>";
        echo "<script>alert('Stok Buku $buku[judul_buku] Saat ini : $buku[stok_buku]');</script>";
    }
}

if (isset($_POST['hapus'])) {

    $id = $_POST['id'];
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_pinjaman WHERE id_pinjaman='$id'");

    //jika query bernilai benar
    if ($hapus) {

        echo '<script>alert("Berhasil mengahapus data pinjaman !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=pinjaman.php#table">';
    } else {
        echo '<script>alert("Gagal menghapus data pinjaman !");</script>';
        echo '<meta http-equiv="refresh" content="0; url=pinjaman.php#table">';
    }
}
?>