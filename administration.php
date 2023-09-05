<?php

    // header
    require 'layouts/header-user.php';

?>

    <div class="administration-contents">
        <div class="container">
            <p>Kelengkapan Administrasi</p>
            <form action="" method="post">
                <select class="form-select" aria-label="Default select example" required>
                    <option selected>Pilih Jurusan</option>
                    <option value="1">IPA</option>
                    <option value="2">IPS</option>
                    <option value="3">Bahasa</option>
                </select>

                <select class="form-select" aria-label="Default select example" required>
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>

                <input type="text" class="form-control" placeholder="Tempat Lahir" required>
                <input type="date" class="form-control" required>
                <input type="text" class="form-control" placeholder="Alamat" required>
                <button type="submit" class="btn btn-primary">Submit</button>
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