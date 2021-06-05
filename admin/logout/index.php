<?php
session_start();
$_SESSION["login"] = false;
$_SESSION['username']='';
$_SESSION['passwd'] = '';
header('Location: ../../')
?>