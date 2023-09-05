<?php

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
                    <input type="text" class="form-control" placeholder="Email" required>
                    <div class="password-container">    
                        <input type="password" class="form-control input-type" placeholder="Password" required>
                        <div class="show">
                            <i class="bi bi-eye-slash"></i>
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Masuk</button>
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