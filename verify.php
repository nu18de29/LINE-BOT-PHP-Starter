<?php
$access_token = 'NgqnXpljINEa4NCWUuOqRkeLueDfKHcLE5uLNpVG2/nbA6wlbzEXzlRgB9+y2ZsNhDP7l5je2sTesFxId8RNPjmT0hHPTDUygOJ2qUyvCHq6iYlKpKzmJJ/4toV7SncwZdqPQj9pwIELneXmkAOrowdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;