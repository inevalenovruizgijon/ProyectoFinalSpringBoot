<?php
require_once "../Model/Asignatura.php";
$data['asignatura'] = Asignatura::getAsignaturas();
include '../View/index_view.php';