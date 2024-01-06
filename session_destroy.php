<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: http://localhost/DTR_System/index.php");
?>