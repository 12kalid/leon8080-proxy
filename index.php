<?php
header("Access-Control-Allow-Origin: *");
// Engañamos a la Samsung diciéndole que es un flujo de video puro
header("Content-Type: video/mp2t");
header("Content-Disposition: inline; filename='video.ts'");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url = $canales[$canal];
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36\r\n"
        ]
    ];
    $context = stream_context_create($opts);
    // Leemos y enviamos los datos
    readfile($url, false, $context);
}
?>
