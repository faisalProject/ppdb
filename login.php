<?php

    require 'libraries/conn.php';

    $db = new Db("localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    if ( isset($_POST['submit']) ) {
        if ( $db->loginAccount($_POST, $conn) ) {
            echo "
                <script type='text/javascript'>
                    document.addEventListener('DOMContentLoaded', () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil', 
                            html: '<p class="."p-popup".">Selamat datang di website PPDB!</p>',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    })
                </script>
            ";
        }
    }

    // header
    require 'layouts/header-landing-page.php';

?>
    <div class="login-contents">
        <div class="container">
            <form action="" method="post">
                <div class="top">
                    <p>Masuk</p>
                </div>
                <div class="bottom">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                    <div class="password-container">    
                        <input type="password" class="form-control input-type" name="password" placeholder="Password" required>
                        <div class="show">
                            <i class="bi bi-eye-slash"></i>
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
                    <p>Belum mempunyai akun? <a href="register.php">Daftar</a></p>
                </div>
                <div class="desc">
                    <p>Dengan melakukan login, Anda setuju dengan syarat & ketentuan PPDB. This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
                </div>
            </form>
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