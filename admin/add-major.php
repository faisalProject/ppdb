<?php

    session_start();

    require '../libraries/conn.php';

    if ( $_SESSION['login'] !== 'admin' ) {
        header("Location: ../login.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    if ( isset($_POST['submit']) ) {
        if ( $db->addMajor($conn, $_POST) > 0 ) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil', 
                            html: '<p class="."p-popup".">Jurusan berhasil ditambahkan!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
        }
    }

    // header
    require '../layouts/header-admin.php';

?>

    <div class="add-major-contents">
        <div class="container">
            <p>Tambah Jurusan</p>
            <form action="" method="post">
                <input type="text" class="form-control" name="major_name" placeholder="Nama Jurusan">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Jurusan</button>
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