<?php

    session_start();

    require 'libraries/conn.php';

    if ( $_SESSION['login'] !== 'user' ) {
        header("Location: login.php");
        exit;
    }

    $db = new Db("localhost", "root", "", "db_ppdb");
    $conn = $db->connect();
    $user_id = $_SESSION['id'];

    $result = mysqli_query($conn, "SELECT * FROM registration WHERE user_id = '$user_id'");

    if ( mysqli_num_rows($result) === 1 ) {
        header("Location: administration-advanced.php");
    }

    if ( isset($_POST['submit']) ) {
        if ( $db->administration($_POST, $conn, $user_id) > 0 ) {
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
                <select class="form-select" name="major_id" aria-label="Default select example" required>
                    <option selected>Pilih Jurusan</option>
                    <?php foreach ( $major as $m ) : ?>
                        <option value="<?= $m['id'] ?>"><?= $m['major_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="form-select" name="gender" aria-label="Default select example" required>
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>

                <input type="text" class="form-control" name="place_of_birth" placeholder="Tempat Lahir" required>
                <input type="date" class="form-control" name="date_of_birth" required>
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