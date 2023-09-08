<?php

    // header
    require '../layouts/header-admin.php';

?>

    <div class="list-major-contents">
        <div class="container">
            <p>Daftar Jurusan</p>
            <a href="add-major.php" class="btn btn-primary">Tambah Jurusan</a>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>IPA</td>
                            <td>
                                <div class="button-container">
                                    <a href="update-major.php" class="btn btn-warning">Ubah</a>
                                    <a href="#" class="btn btn-danger delete">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>IPS</td>
                            <td>
                                <div class="button-container">
                                    <a href="update-major.php" class="btn btn-warning">Ubah</a>
                                    <a href="#" class="btn btn-danger delete">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Bahasa</td>
                            <td>
                                <div class="button-container">
                                    <a href="update-major.php" class="btn btn-warning">Ubah</a>
                                    <a href="#" class="btn btn-danger delete">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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