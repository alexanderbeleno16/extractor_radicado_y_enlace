<?php

include(__DIR__."/../../controller/ctr_laboratorio.php");
$obj_extractor = new Ctr_extractor();

if (isset($_REQUEST['accion'])) {
    $metodo = $_REQUEST['accion'];
    if (method_exists($obj_extractor,$metodo)) {
        $Respuesta = $obj_extractor->$metodo();
    }else {
        $Respuesta['msg'] = "Error, la peticion no existe.";
        $Respuesta['status'] = false;
    }
    echo json_encode($Respuesta);
}
