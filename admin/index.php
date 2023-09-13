<?php

    session_start();

    require '../libraries/conn.php';

    if ( $_SESSION['login'] !== 'admin' ) {
        header("Location: ../login.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    $all_status = mysqli_query($conn, "SELECT COUNT(*) as jumlah_status FROM registration r");
    $pending = mysqli_query($conn, "SELECT COUNT(*) as jumlah_pending FROM registration r WHERE r.status = 'pending'");
    $accept = mysqli_query($conn, "SELECT COUNT(*) as jumlah_accept FROM registration r WHERE r.status = 'accept'");
    $reject = mysqli_query($conn, "SELECT COUNT(*) as jumlah_reject FROM registration r WHERE r.status = 'reject'");

    $arr_as = mysqli_fetch_assoc($all_status);
    $arr_p = mysqli_fetch_assoc($pending);
    $arr_a = mysqli_fetch_assoc($accept);
    $arr_r = mysqli_fetch_assoc($reject);

    // header
    require '../layouts/header-admin.php';

?>
    <div class="dashboard-admin-contents">
        <div class="container">
            <div class="card-container">    
                <div class="card">
                    <h1><?= $arr_as['jumlah_status'] ?></h1>
                    <p>Berkas Administrasi</p>
                </div>
                <div class="card">
                    <h1><?= $arr_p['jumlah_pending'] ?></h1>
                    <p>Pending</p>
                </div>
                <div class="card">
                    <h1><?= $arr_a['jumlah_accept'] ?></h1>
                    <p>Accept</p>
                </div>
                <div class="card">
                    <h1><?= $arr_r['jumlah_reject'] ?></h1>
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