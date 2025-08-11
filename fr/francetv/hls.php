<?php
$channels = [
    'France_2' => 'https://hdfauth.ftven.fr/esi/TA?format=json&url=https://simulcast-p.ftven.fr/simulcast/France_2/hls_fr2/index.m3u8',
    'France_3' => 'https://hdfauth.ftven.fr/esi/TA?format=json&url=https://simulcast-p.ftven.fr/simulcast/France_3/hls_fr3/index.m3u8',
    'France_4' => 'https://hdfauth.ftven.fr/esi/TA?format=json&url=https://simulcast-p.ftven.fr/simulcast/France_4/hls_fr4/index.m3u8',
    'France_5' => 'https://hdfauth.ftven.fr/esi/TA?format=json&url=https://simulcast-p.ftven.fr/simulcast/France_5/hls_fr5/index.m3u8',
    'France_Info' => 'https://hdfauth.ftven.fr/esi/TA?format=json&url=https://simulcast-p.ftven.fr/simulcast/France_Info/hls_monde_frinfo/index.m3u8'
];

$id = $_GET['id'];

$json = file_get_contents($channels[$id]);

$get = json_decode($json);

header('Location: '.$get->url);
?>