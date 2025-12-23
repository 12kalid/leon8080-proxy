<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/vnd.apple.mpegurl");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    // Redireccionamos usando el código 302 (Redirección Temporal)
    // Esto es lo que usan los servicios profesionales para Smart TV
    header("Location: " . $canales[$canal], true, 302);
    exit;
}
?>
