<?php
require 'Pusher.php';

$mensaje = $_POST['msj'];

$pusher = PusherInstance::get_pusher();

$pusher->trigger(
    'canalo',
    'nuevo_comentario',
    array('mensaje' => $mensaje),
    $_POST['socket_id']
);

echo json_encode(array('mensaje' => $mensaje));
