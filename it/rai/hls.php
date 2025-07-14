<?php
$cont = $_GET['cont'];

$context = stream_context_create(array("http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36")));

$json = file_get_contents('https://mediapolis.rai.it/relinker/relinkerServlet.htm?cont='.$cont.'&output=62', false, $context);

$get = json_decode($json);

header('Location: '.$get->video[0]);
?>
