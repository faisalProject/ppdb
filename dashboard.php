<?php
    session_start();
    require 'libraries/conn.php';

    // cek session
    if ( $_SESSION['login'] !== 'user' ) {
        header("Location: login.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();
    
    $result = $db->show($conn, "SELECT r.id, u.name, r.place_of_birth, r.date_of_birth, r.gender, r.status FROM registration r 
    LEFT JOIN users u ON r.user_id = u.id ORDER BY u.id DESC"); 

    if ( isset($_POST['submit-keyword']) ) {
        $result = $db->searchingByUser($conn, $_POST);
    }

    // header
    require 'layouts/header-user.php';

?>
    <div class="dashboard-contents">
        <div class="container">
            <form action="" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="Masukkan nama...." autofocus>
                <button type="submit" name="submit-keyword" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </form>
            <p>Hasil Seleksi</p>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $i = 1 ?>
                        <?php foreach ( $result as $r ) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $r['name'] ?></td>
                                <td><?= $r['place_of_birth'] ?></td>
                                <td><?= $r['date_of_birth'] ?></td>
                                <td><?= $r['gender'] ?></td>
                                <?php if ( $r['status'] === 'pending' ) : ?>
                                    <td><p class="pending"><?= $r['status'] ?></p></td>
                                <?php elseif ( $r['status'] === 'accept' ) : ?>
                                    <td><p class="accept"><?= $r['status'] ?></p></td>
                                <?php elseif ( $r['status'] === 'reject' ) : ?>
                                    <td><p class="reject"><?= $r['status'] ?></p></td>
                                <?php endif; ?>  
                            </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   <?php 
    
        // sidebar
        require 'layouts/sidebar.php';

   ?>

<?php

    // footer
    require 'layouts/footer.php';

?>