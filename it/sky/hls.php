<?php
$id = $_GET['id'];

$json = file_get_contents('https://video.sky.it/api/v1/getLivestream?id='.$id);

$get = json_decode($json);

header('Location: '.$get->streaming_url);
?>
