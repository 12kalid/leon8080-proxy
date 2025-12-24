<?php
// Permitir que cualquier dispositivo se conecte
header("Access-Control-Allow-Origin: *");

$canal = isset($_GET['canal']) ? $_GET['canal'] : '';

$canales = [
    "sicardi" => "https://vivo.solumedia.com:19360/sicarditv/sicarditv.m3u8",
    "gentv"   => "https://srv3.zcast.com.br/gentv/gentv/playlist.m3u8"
];

if (array_key_exists($canal, $canales)) {
    // Usamos una redirección 301 (Permanente), que es la que mejor procesan las Samsung
    header("Location: " . $canales[$canal], true, 301);
    exit;
} else {
    echo "Canal no encontrado";
}
?>
