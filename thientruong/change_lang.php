<?php
session_start();
$_SESSION['lang'] = $_GET['lang'];
header('Location: '.$_GET['r']);
?>
