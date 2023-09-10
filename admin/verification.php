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

    <?php

        // sidebar
        require '../layouts/sidebar-admin.php';

    ?>

<?php

    // footer
    require '../layouts/footer-admin.php';

?>