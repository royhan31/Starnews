<?php
session_start();
require_once("../AdminTemplates/page.php");
require_once("../AdminTemplates/default.php");
if(!$user->logged())
{
$user->redirect('../login.php');
}
// else {
// $user->redirect('?page=dashboard');
// }

 ?>
