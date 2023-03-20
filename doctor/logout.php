<?php
    session_start();
    session_destroy();
    // redirecting the user to the login page
    header('Location: ../index.php?action=logout');
?>