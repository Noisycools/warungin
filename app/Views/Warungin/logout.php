<?php 

session_start();
unset($_SESSION['user']);
session_destroy();
session_write_close();
header("Location: login.php");
exit();
