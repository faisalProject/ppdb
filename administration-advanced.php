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

    $user_id = $_SESSION['id'];

    if ( isset($_POST['submit']) ) {
        if ( $db->administrationAdvanced($_POST, $conn, $user_id) > 0 ) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil', 
                            html: '<p class="."p-popup".">Data berhasil tersimpan!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";

            header("Location: administration-advanced.php");
        }
    }

    $result = $db->show($conn, "SELECT rf.id, rf.file_name, rf.file  FROM registration_file rf 
    LEFT JOIN registration r ON rf.registration_id = r.id WHERE r.user_id = '$user_id' ORDER BY rf.id DESC");

    // heeader
    require 'layouts/header-user.php';

?>

    <div class="administration-advanced-contents">
        <div class="container">
            <p>Daftar Berkas</p>
            <?php if ( count($result) > 0 ) : ?>
                <div class="table-container">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Berkas</th>
                            <th scope="col">File Berkas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $i = 1 ?>
                            <?php foreach ( $result as $r ) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $r['file_name'] ?></td>
                                    <td><a href="<?= 'uploads/' . $r['file'] ?>" target="_blank"><?= $r['file'] ?></a></td>
                                    <td><a href="#" onclick="deleteFile(<?= $r['id'] ?>)" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <p>Kelengkapan Administrasi Lanjutan</p>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="file_name" placeholder="Nama Berkas" required>
                <input type="file" class="form-control" name="file" required>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
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