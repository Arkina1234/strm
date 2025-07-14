<?php
$id = $_GET['id'];

$json = file_get_contents('https://vod.tvp.pl/api/products/'.$id.'/videos/playlist?videoType=LIVE&lang=PL&platform=BROWSER');

$get = json_decode($json);

header('Location: '.$get->sources->HLS[0]->src);
?>
