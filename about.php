<?php require('koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>About | Sinapers</title>
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
                        Apliaksi pengelola perpustakaan berbasis web untuk keperluan
                        pinjaman dan memonitoring perpustakkan secara mudah.<br>
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Magni ab quo aliquid iste expedita debitis nobis aliquam dolor porro quidem cupiditate officia
                        voluptatum sint mollitia nemo, reprehenderit repudiandae qui omnis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur,
                        cumque. Dicta vero, voluptatibus assumenda quae saepe sunt, consequuntur ipsam
                        provident magnam ullam incidunt minus
                        autem iste harum nesciunt? Fugiat, delectus.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Magni ab quo aliquid iste expedita debitis nobis aliquam dolor porro quidem cupiditate officia
                        voluptatum sint mollitia nemo, reprehenderit repudiandae qui omnis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur,
                        cumque. Dicta vero, voluptatibus assumenda quae saepe sunt, consequuntur ipsam
                        provident magnam ullam incidunt minus
                        autem iste harum nesciunt? Fugiat, delectus. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Numquam, assumenda! Amet quidem tempore,
                        officia commodi eveniet minus voluptatibus saepe laboriosam nihil numquam illum natus deserunt,
                        nisi magnam soluta eius a.
                    </p>
                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-sm btn-secondary" href="index.php">Kembali</button>
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