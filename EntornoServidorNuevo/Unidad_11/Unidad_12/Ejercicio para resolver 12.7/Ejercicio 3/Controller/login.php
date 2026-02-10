<?php
if (session_status() == PHP_SESSION_NONE) session_start();

$data['mensaje'] = "";
if (isset($_SESSION['mensaje'])) {
  $data['mensaje'] = $_SESSION['mensaje'];
}

  include '../View/login_view.php';  
?>