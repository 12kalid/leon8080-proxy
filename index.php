<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/vnd.apple.mpegurl");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url_final = $canales[$canal];
    
    // En lugar de procesar el video, creamos una estructura M3U8 "limpia"
    // Esto ayuda a que la Samsung entienda que es un streaming estándar
    echo "#EXTM3U\n";
    echo "#EXT-X-STREAM-INF:BANDWIDTH=1280000\n";
    echo $url_final;
}
?>
