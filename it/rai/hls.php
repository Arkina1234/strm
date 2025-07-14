<?php
$cont = $_GET['cont'];

$url = "http://mediapolis.rai.it/relinker/relinkerServlet.htm?cont='.$cont.'&output=62

$json = file_get_html();

$get = json_decode($json);

header('Location: '.$get->video[0]);
?>
