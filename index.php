<?php
header("Access-Control-Allow-Origin: *");
// Definimos que el contenido es una lista de reproducción de video (M3U8)
header("Content-Type: application/vnd.apple.mpegurl");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url_final = $canales[$canal];
    
    // Construimos una estructura que la Smart TV Samsung entiende perfectamente
    echo "#EXTM3U\n";
    echo "#EXT-X-VERSION:3\n";
    echo "#EXT-X-STREAM-INF:BANDWIDTH=1280000,RESOLUTION=1280x720\n";
    echo $url_final;
    exit;
}
?>
