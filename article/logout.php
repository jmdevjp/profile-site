<?php
session_start();
$_SESSION = [];
header('Location: ./top.php');
exit;
?>
