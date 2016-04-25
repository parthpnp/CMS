<?php
session_start();
unset($_SESSION['fh_email']);
session_destroy();
header("Location: login.php");
?>