<?php

#EL INDEX: En el mostramos la salida de las vistas al usuario y también a travez de él enviamos las distintas acciones que el usuario envíe al controlador.

require_once "../backend/controlador/enlaces.php";
require_once "../backend/modelo/enlaces.php";

$mvc = new MvcControladorB();
$mvc->plantilla();
