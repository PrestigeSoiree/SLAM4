<?php

require_once File::build_path('controller/ControllerVoiture.php');
require_once 'config/Conf.php';


$action = $_GET['action'];

ControllerVoiture::$action();

?>