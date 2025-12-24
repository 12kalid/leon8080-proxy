<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/vnd.apple.mpegurl");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url = $canales[$canal];
    
    // Generamos una lista M3U8 de un solo nivel (más fácil para la TV)
    echo "#EXTM3U\n";
    echo "#EXT-X-VERSION:3\n";
    echo "#EXT-X-ALLOW-CACHE:NO\n";
    echo "#EXT-X-TARGETDURATION:10\n";
    echo "#EXT-X-MEDIA-SEQUENCE:0\n";
    echo "#EXTINF:10.0,\n";
    echo $url . "\n";
    echo "#EXT-X-ENDLIST";
    exit;
}
?>
