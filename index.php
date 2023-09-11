<?php

    session_start();

    require 'libraries/conn.php';

    if ( isset($_SESSION['login']) ) {
        if ( $_SESSION['login'] === 'user' ) {
            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: admin/index.php");
        }
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    $result = $db->show($conn, "SELECT r.id, u.name, r.place_of_birth, r.date_of_birth, r.gender, r.status FROM registration r 
    LEFT JOIN users u ON r.user_id = u.id");

    // header
    require 'layouts/header-landing-page.php';

?>

    <div class="landing-page-contents">
        <div class="container">
            <form action="" method="post">
                <input type="text" class="form-control" placeholder="Masukkan nama...." autofocus>
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
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
                                <?php else : ?>
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
        require 'layouts/sidebar-landing.php';

    ?>

<?php

    // footer
    require 'layouts/footer.php';

?>