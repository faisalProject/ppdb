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
    <div class="dashboard-admin-contents">
        <div class="container">
            <div class="card-container">    
                <div class="card">
                    <h1>40</h1>
                    <p>Berkas Administrasi</p>
                </div>
                <div class="card">
                    <h1>20</h1>
                    <p>Pending</p>
                </div>
                <div class="card">
                    <h1>15</h1>
                    <p>Accept</p>
                </div>
                <div class="card">
                    <h1>5</h1>
                    <p>Reject</p>
                </div>
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