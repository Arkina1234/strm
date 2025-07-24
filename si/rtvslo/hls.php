<?php
$id = $_GET['id'];

$json = file_get_contents('https://api.rtvslo.si/ava/getLiveStream/'.$id.'?&client_id=82013fb3a531d5414f478747c1aca622');

$get = json_decode($json);

header('Location: '.$get->response->mediaFiles[0]->streamer.$get->response->mediaFiles[0]->file);
?>
