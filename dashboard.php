<?php

    // header
    require 'layouts/header-user.php';

?>
    <div class="dashboard-contents">
        <div class="container">
            <form action="" method="post">
                <input type="text" class="form-control" placeholder="Masukkan nama...." autofocus>
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </form>
            <p>Hasil Seleksi</p>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>Rigger Damayarta Tejayanda</td>
                            <td>Karawang</td>
                            <td>25 Desember 2005</td>
                            <td>L</td>
                            <td><p class="pending">Pending</p></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Bayu Prasetyo</td>
                            <td>Karawang</td>
                            <td>25 Januari 2004</td>
                            <td>L</td>
                            <td><p class="pending">Pending</p></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Raka Fazzah Fithra</td>
                            <td>Karawang</td>
                            <td>25 Januari 2005</td>
                            <td>L</td>
                            <td><p class="pending">Pending</p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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