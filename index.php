<?php
$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

// Diccionario de canales actualizado
$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url_final = $canales[$canal];
    // Redireccionamos directamente a la fuente
    header("Location: $url_final");
    exit;
} else {
    header("Content-Type: text/plain");
    echo "#EXTM3U\n#EXTINF:-1,Canal No Encontrado en leon8080";
}
?>
