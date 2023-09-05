<?php

    // heeader
    require 'layouts/header-user.php';

?>

    <div class="administration-advanced-contents">
        <div class="container">
            <p>Daftar Berkas</p>
            <div class="table-container">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Berkas</th>
                        <th scope="col">File Berkas</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>Ijazah SMA</td>
                            <td>faspiodf1324.pdf</td>
                            <td><a href="#" class="btn btn-danger">Hapus</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Transkip Nilai</td>
                            <td>faspiodf1324.pdf</td>
                            <td><a href="#" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>Kelengkapan Administrasi Lanjutan</p>

            <form action="" method="post">
                <input type="text" class="form-control" placeholder="Nama Berkas" required>
                <input type="file" class="form-control" required>
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