<?php

    require 'libraries/conn.php';

    $db = new Db("localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    if ( isset($_POST['submit']) ) {
        if ( $db->administration($_POST, $conn) > 0 ) {
            
            header("Location: administration-advanced.php");
        }
    }

    $major = $db->show($conn, "SELECT * FROM major");

    // header
    require 'layouts/header-user.php';

?>

    <div class="administration-contents">
        <div class="container">
            <p>Kelengkapan Administrasi</p>
            <form action="" method="post">
                <select class="form-select" name="major_name" aria-label="Default select example" required>
                    <option selected>Pilih Jurusan</option>
                    <?php foreach ( $major as $m ) : ?>
                        <option value="<?= $m['major_name'] ?>"><?= $m['major_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="form-select" name="gender" aria-label="Default select example" required>
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>

                <input type="text" class="form-control" name="place-of-birth" placeholder="Tempat Lahir" required>
                <input type="date" class="form-control" name="date-of-birth" required>
                <input type="text" class="form-control" name="address" placeholder="Alamat" required>
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