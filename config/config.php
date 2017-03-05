<?php
    /*
     * define the base ur.
     */
    define('BASE_URL', 'http://localhost/website/');

    /*
     * Initialize session.
     * Authenticate users based on session value.
     */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($doNotAuthenticate)||($doNotAuthenticate != true)) {
        if (!isset($_SESSION['isAuthenticated']) || ($_SESSION['isAuthenticated'] != true)) {
            echo "Access Denied";
            header('location: ' . BASE_URL . 'views/registration_view.php');
            exit;
        }
    }
?>	