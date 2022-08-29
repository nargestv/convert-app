<?php
require 'vendor/autoload.php';

$html = "<div class='ping'>Pong ✅</div>";
$css = ".ping { padding: 20px; font-family: 'sans-serif'; }";

$client = new GuzzleHttpClient();
// Retrieve your user_id and api_key from https://htmlcsstoimage.com/dashboard
$res = $client->request('POST', 'https://hcti.io/v1/image', [
  'auth' => ['user_id', 'api_key'],
  'form_params' => ['html' => $html, 'css' => $css]
]);

echo $res->getBody();
// {"url":"https://hcti.io/v1/image/5803a3f0-abd3-4f56-9e6c-3823d7466ed6"}
?>
