<?php

    session_start();

    require 'libraries/conn.php';

    // cek session
    if ( $_SESSION['login'] !== 'user' ) {
        header("Location: index.php");
        exit;
    }

    $db = new Db("Localhost", "root", "", "db_ppdb");
    $conn = $db->connect();

    $id = $_GET['id'];

    if ( $db->deleteFile($conn, $id) > 0 ) {
        echo "
            <script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                icon: 'success',
                title: 'Berhasil', 
                html: '<p class="."p-popup".">Berkas berhasil dihapus!</p>',
                showConfirmButton: false,
                timer: 2000
                })
            })
            </script>
        ";

        header("Location: administration-advanced.php");
    }

?>