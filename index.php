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
        <div class="card bg-light shadow-sm p-4" style="border:none">
          <h3 class="display-3">Sinapers</h3>
          <p class="lead">
            Sistem manajemen perpustakaan berbasis web untuk keperluan
            pinjaman dan memonitoring perpustakkan secara mudah.<br>
            <a href="about.php">More info</a>
          </p>
          <div class="card p-4" style="background:#fa8072">
            <div class="row text-center">
              <div class="col-12">
                <h3 class="pb-3">Data Realtime</h3>
              </div>
              <div class="col-3">
                <div class="card p-3" style="background:#faf0e6">
                  <h5 class="card-title">Buku</h5>
                  <h2 class="font-weight-bold">
                    <?php
                    $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                    echo mysqli_num_rows($buku);
                    ?>
                  </h2>
                </div>
              </div>
              <div class="col-3">
                <div class="card p-3" style="background:#faf0e6">
                  <h5 class="card-title">Pinjaman</h5>
                  <h2 class="font-weight-bold">
                    <?php
                      $pinjaman = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman");
                      echo mysqli_num_rows($pinjaman);                                                
                    ?>
                  </h2>
                </div>
              </div>
              <div class="col-3">
                <div class="card p-3" style="background:#faf0e6">
                  <h5 class="card-title">Anggota</h5>
                  <h2 class="font-weight-bold">
                    <?php
                      $anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                      echo mysqli_num_rows($anggota);
                    ?>
                  </h2>
                </div>
              </div>
              <div class="col-3">
                <div class="card p-3" style="background:#faf0e6">
                  <h5 class="card-title">Kunjungan</h5>
                  <h2 class="font-weight-bold">
                  <?php
                    echo rand(1,100);
                  ?>
                  </h2>
                </div>
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