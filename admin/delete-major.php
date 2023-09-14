<?php 

    session_start();

    require '../libraries/conn.php';

    if ( $_SESSION['login'] !== 'admin' ) {
        header("Location: ../login.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    $id = $_GET['id'];

    if ( $db->deleteMajor($conn, $id) > 0 ) {
        echo "
            <script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil', 
                        html: '<p class="."p-popup".">Jurusan berhasil dihapus!</p>',
                        showConfirmButton: false,
                        timer: 2000
                    })
                })
            </script>
        ";
    }

?>