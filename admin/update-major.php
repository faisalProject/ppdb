<?php

    session_start();

    require '../libraries/conn.php';

    if ( $_SESSION['login'] !== 'admin' ) {
        header("Location: ../login.php");
        exit;
    }

    // header
    require '../layouts/header-admin.php';

?>

    <div class="update-major-contents">
        <div class="container">
            <p>Ubah Jurusan</p>
            <form action="" method="post">
                <input type="text" class="form-control" placeholder="Nama Jurusan">
                <button type="submit" class="btn btn-warning">Ubah Jurusan</button>
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