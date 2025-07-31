<?php
$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0"
        )
    )
);

$token = file_get_contents('https://npo.nl/start/api/domain/player-token?productId=LI_BVN_4589107', false, $context);
$auth = json_decode($token, true);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://prod.npoplayer.nl/stream-link');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: */*',
    'Authorization: '.$auth->jwt,
    'Referer: https://www.bvn.tv/tv-gids/?player=live',
    'Content-type: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"profileName":"dash","drmType":"widevine","referrerUrl":"https://www.bvn.tv/tv-gids/?player=live","ster":{"identifier":"npo-app-desktop","deviceType":4,"player":"web"}}');

$response = curl_exec($ch);
                
$get = json_decode($response);
header('Location: '.$get->stream->streamURL);

curl_close($ch);
?>
