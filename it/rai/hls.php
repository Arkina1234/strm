<?php
$cont = $_GET['cont'];

$json = file_get_contents('http://mediapolis.rai.it/relinker/relinkerServlet.htm?cont='.$cont.'&output=62');

$get = json_decode($json);

header('Location: '.$get->video[0]);
?>
