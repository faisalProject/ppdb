<?php

    session_start();

    require '../libraries/conn.php';

    if ( $_SESSION['login'] !== 'admin' ) {
        header("Location: ../login.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    $result = $db->show($conn, "SELECT * FROM major");

    // header
    require '../layouts/header-admin.php';

?>

    <div class="list-major-contents">
        <div class="container">
            <p>Daftar Jurusan</p>
            <a href="add-major.php" class="btn btn-primary">Tambah Jurusan</a>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $i = 1 ?>
                        <?php foreach ( $result as $r ) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $r['major_name'] ?></td>
                                <td>
                                    <div class="button-container">
                                        <a href="update-major.php?id=<?= $r['id'] ?>" class="btn btn-warning">Ubah</a>
                                        <a href="#" onclick="deleteMajor(<?= $r['id'] ?>)" class="btn btn-danger">Hapus</a>
                                    </div>
                                </td>
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
        require '../layouts/sidebar-admin.php';

    ?>

<?php

    // footer
    require '../layouts/footer-admin.php';

?>