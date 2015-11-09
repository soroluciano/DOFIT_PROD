<?php
require 'Pusher.php';

$mensaje = $_POST['msj'];
$canal = $_POST['canal'];

$pusher = PusherInstance::get_pusher();

$pusher->trigger(
    $canal,
    'nuevo_comentario',
    array('mensaje' => $mensaje),
    $_POST['socket_id']
);

echo json_encode(array('mensaje' => $mensaje));
