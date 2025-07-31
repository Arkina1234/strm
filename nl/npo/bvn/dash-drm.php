<?php
$ch_token = curl_init();
curl_setopt($ch_token, CURLOPT_URL, 'https://npo.nl/start/api/domain/player-token?productId=LI_BVN_4589107');
curl_setopt($ch_token, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_token, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch_token, CURLOPT_HTTPHEADER, [
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
    'Content-type: application/json',
]);

$token = curl_exec($ch_token);

$auth = json_decode($token);

curl_close($ch_token);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://prod.npoplayer.nl/stream-link');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36');
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
