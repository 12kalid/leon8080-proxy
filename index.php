<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/vnd.apple.mpegurl");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8"
];

if (!array_key_exists($canal, $canales)) {
    die("#EXTM3U\n#EXTINF:-1,Canal No Encontrado en leon8080");
}

$url_final = $canales[$canal];

$opciones = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36\r\n"
    ]
];

$contexto = stream_context_create($opciones);
echo @file_get_contents($url_final, false, $contexto);
?>
