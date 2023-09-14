<?php

    session_start();

    require '../libraries/conn.php';

    if ( $_SESSION['login'] !== 'admin' ) {
        header("Location: ../login.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    $id = $_GET['id'];

    $result = $db->show($conn, "SELECT r.id, rf.file_name, rf.file FROM registration r 
    LEFT JOIN registration_file rf ON r.id = rf.registration_id WHERE r.id = '$id'");

    if ( isset($_POST['accept']) ) {
        if ( $db->accept($conn, $id) > 0 ) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil', 
                            html: '<p class="."p-popup".">Verifikasi berhasil!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";

            header("Location: selection-results.php");
        }
    }

    if ( isset($_POST['reject']) ) {
        if ( $db->reject($conn, $id) ) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil', 
                            html: '<p class="."p-popup".">Verifikasi berhasil!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";

            header("Location: selection-results.php");
        }
    }



    // header
    require '../layouts/header-admin.php';

?>

    <div class="verification-contents">
        <div class="container">
            <p>Detail Berkas Siswa</p>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Berkas</th>
                            <th scope="col">File Berkas</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $i = 1 ?>
                            <?php foreach ( $result as $r ) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $r['file_name'] ?></td>
                                    <td><a href="<?= '../uploads/' . $r['file'] ?>" target="_blank"><?= $r['file'] ?></a></td>
                                </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <form action="" method="post" class="action">
                <button type="submit" name="accept" class="btn btn-primary">Terima</button>
                <button type="submit" name="reject" class="btn btn-danger">Tolak</button>
            </form>
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