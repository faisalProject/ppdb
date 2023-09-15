<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB</title>

    <!-- bootstrap 5.2.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- css -->
    <link rel="stylesheet" href="main.css">
    
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="left">
                <a href="dashboard.php">Hasil Seleksi</a>
                <a href="administration.php">Administrasi</a>
            </div>
            <div class="right">
                <p><?= $_SESSION['name'] ?></p>
                <div class="profile">
                    <div class="image">
                        <img src="images/f2.png" alt="">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="dropdown-container">
                        <a href="#"><i class="bi bi-person"></i>Profil</a>
                        <a href="logout.php"> <i class="bi bi-box-arrow-left"></i> Keluar</a>
                    </div>
                </div>
                <div class="hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>