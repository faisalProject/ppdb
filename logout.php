<?php

    session_start();

    if ( $_SESSION['login'] === 'user' ) {
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: login.php");
        exit;
    }

?>