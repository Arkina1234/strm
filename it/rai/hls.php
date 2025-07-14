<?php
$cont = $_GET['cont'];

$url = "https://mediapolis.rai.it/relinker/relinkerServlet.htm?cont='.$cont.'&output=62

$json = file_get_html($url);

$get = json_decode($json);

header('Location: '.$get->video[0]);
?>
