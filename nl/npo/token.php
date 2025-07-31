<?php
$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0"
        )
    )
);
$token = file_get_contents('https://npo.nl/start/api/domain/player-token?productId=LI_BVN_4589107', false, $context);
var_dump(json_decode($token));
?>
