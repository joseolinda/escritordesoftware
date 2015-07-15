<?php
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$_SESSION['Login'] = $login;
$_SESSION['senha'] = $senha;
 



?>