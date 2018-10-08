<?php
require_once('../vendor/PHPExcel/Classes/PHPExcel.php');
require_once('../vendor/PHPExcel/Classes/PHPExcel/IOFactory.php');
ini_set('date.timezone', 'America/Bogota');

if ($_FILES['colpatria'] ['error'] > 0) {
    $colpatria = null;
} else {
    $colpatria = $_FILES['colpatria'];
}

if ($colpatria != null) {

  /* Subir el fichero de colpatria */
  $rutaBd = '../uploads/bd/'.$_FILES['colpatria']['name'];
  $moverFlag = false;
  $mover = @move_uploaded_file($_FILES['colpatria']['tmp_name'], $rutaBd);

  if ($mover) {
      $moverFlag = true;
  }


  /* Leer el fichero */
  $objPHPExcel = PHPExcel_IOFactory::load($rutaBd);
  $objPHPExcel->setActiveSheetIndex(0);
  $filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
  $columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
  if ($columnas == "E") {
    /* Variables quemas de la cuenta */
    $tipoCuenta = 1;
    $nCuenta = 4732039568;
    $cvs = null;

    for ($i=0; $i <= $filas; $i++) {

        $referencia1 = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $referencia2 = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $referencia3 = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $valor  = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $adenda = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        if (strlen($referencia1) > 0) {
          if (strlen($referencia1) < 25) {
            $referencia1 = str_pad($referencia1, 25, "0");
          }

          if(strlen($referencia2) < 25){
            $referencia2 = str_pad($referencia2, 25, "0");
          }

          if(strlen($referencia3) < 25){
            $referencia3 = str_pad($referencia3, 12, "0");
          }

          if (strlen($valor) < 15) {
            $valor = str_pad($valor, 15, "0");
          }

          $adenda = str_pad($adenda, 49, "0");

          /* Agregar fila al array */
          $arrayColpatria[] = array($tipoCuenta,$nCuenta,$referencia1,$referencia2,$referencia3,$valor,$adenda);
        }




    }

    $cantArray = count($arrayColpatria);

    /* Crear archivo de salida */
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename=plantilla_colpatria.txt');

    $archivo_csv = fopen("../documents/colpatria.txt", 'w');

    for ($i=0; $i < $cantArray; $i++) {
      $data = implode($arrayColpatria[$i]);
      //var_dump($data);
      echo "$data\n";
      //$cvs.= "$data\n";

    }

    fputs($archivo_csv, ($cvs.PHP_EOL));
    fclose($archivo_csv);

    /* Borrar el fichero */
    unlink('../documents/colpatria.txt');

    //echo "termino ...";

  }else {
    header('Location: ../views/mensajes/alerta_archivo.html');
  }



}else {
  header('Location: ../views/mensajes/alerta_validacion.html');;
}



 ?>
