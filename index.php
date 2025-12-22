<?php
$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8"
];

if (array_key_exists($canal, $canales)) {
    $url_final = $canales[$canal];
    // Esta instrucción le dice a la TV que salte el bloqueo de origen
    header("Location: $url_final");
    exit;
} else {
    header("Content-Type: text/plain");
    echo "#EXTM3U\n#EXTINF:-1,Canal No Encontrado";
}
?>
