<?php
require_once '../Model/Token.php';
if (session_status() == PHP_SESSION_NONE) session_start();
$data['usuario'] = $_SESSION['usuario'];
$data['mensaje'] = "";

if (isset($_SESSION['mensaje'])) {
  $data['mensaje'] = $_SESSION['mensaje'];
}

  include '../Client/index.php';
  unset ($_SESSION['mensaje']);
?>