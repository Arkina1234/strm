<?php
$id = $_GET['id'];

$json = file_get_contents('https://services.radio-canada.ca/media/validation/v2/?appCode=medianetlive&connectionType=hd&deviceType=ipad&idMedia='.$id.'&multibitrate=true&output=json&tech=hls&manifestVersion=2&manifestType=desktop');

$get = json_decode($json);

header('Location: '.$get->url);
?>
