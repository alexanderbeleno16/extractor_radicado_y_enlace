<?php
class Ctr_extractor{
    function __construct(){
        
    }

    public function subir_pdf(){
        
        $data['html'] = "";
        $data['status']=true;
        
        // var_dump($_FILES);
        if ( !empty($_POST['option']) and !empty($_FILES['pdf_local']['name'])) {
            // $_FILES['pdf_local']['name']
            $rutaDestino = "C:/xampp/htdocs/proyectos_alex/extractor_radicado_enlace/assets/estados_pdf";
            // $nombre_archivo = "PDF_LOCAL_".microtime(true).".pdf";
            $nombre_archivo = $_FILES['pdf_local']['name'];

            if (!file_exists($rutaDestino)) {
                mkdir($rutaDestino, 0777, true);
            }

            if (copy($_FILES['pdf_local']['tmp_name'], $rutaDestino . "/" . $nombre_archivo )) {
                $output=null;
                
                $ruta_extractor_rad_enlances_py = "../extractor_py/extractorSic_v2.class.py";

                $ruta_pdf = $rutaDestino."/".$nombre_archivo;
                $comando_completo = "python ".$ruta_extractor_rad_enlances_py." ".$ruta_pdf." ".$_POST['option'];

                $salida = exec($comando_completo. " 2>&1", $output, $retval); 
                
                // $arr_salida = json_encode($salida);
                // $json_salida = json_decode($arr_salida, true);

                // var_dump( $json_salida, $salida);

                $data['msg'] = $salida;
            }else {
                $data['status'] = false;
                $data['msg'] = "No se puedo subir el archivo pdf";
            }
        }else {
            $data['status'] = false;
            $data['msg'] = "Debe de seleccionar una opcion. [1, 2, 3, 4, 5]";
        }


        return $data;
    }

    public function subir_pdf_enlace(){
        
        $data['html'] = "";
        $data['status']=true;
        
        var_dump($_POST);
        if ( !empty($_POST['option']) and !empty($_POST['txt_enlace']) ) {
            // $ruta_extractor_rad_enlances_py = "../assets/extractor_py/extractorSic_v2.class.py";
            // $result_consola = exec("python3 ".$ruta_extractor_rad_enlances_py." '".$_POST['txt_enlace']."' 1"); 
            // var_dump($result_consola, $ruta_extractor_rad_enlances_py, $_POST['txt_enlace']);
            
        }else {
            $data['status'] = false;
            $data['msg'] = "Debe de seleccionar una opcion. [1, 2, 3, 4, 5]";
        }


        return $data;
    }
}