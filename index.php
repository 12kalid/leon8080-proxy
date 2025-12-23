<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: video/mp2t");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url = $canales[$canal];
    
    $opciones = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36\r\n"
        ]
    ];

    $contexto = stream_context_create($opciones);
    
    // Abrimos la conexión al canal
    $stream = fopen($url, 'r', false, $contexto);
    
    if ($stream) {
        // Enviamos el video directamente a la TV
        fpassthru($stream);
        fclose($stream);
    }
}
?>
