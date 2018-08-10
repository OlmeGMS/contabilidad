<?php
require_once('../vendor/PHPExcel/Classes/PHPExcel.php');
require_once('../vendor/PHPExcel/Classes/PHPExcel/IOFactory.php');
ini_set('date.timezone', 'America/Bogota');

if ($_FILES['base_datos'] ['error'] > 0) {
    $baseDatos = null;
} else {
    $baseDatos = $_FILES['base_datos'];
}

if ($_FILES['base_alumnos'] ['error'] > 0) {
    $baseAlumnos = null;
} else {
    $baseAlumnos = $_FILES['base_alumnos'];
}

if ($_FILES['base_vehiculos'] ['error'] > 0) {
    $baseVehiculo = null;
} else {
    $baseVehiculo = $_FILES['base_vehiculos'];
}

if (isset($_POST['mes'])) {
  $mes = $_POST['mes'];
}else {
  $mes = null;
}

if ($baseDatos != null && $baseAlumnos != null && $baseVehiculo != null && $mes != null) {
  /* Guardar ficheros de subida */
  /* Porceso base de datos */

  $rutaBd = '../uploads/bd/'.$_FILES['base_datos']['name'];
  $moverFlag = false;
  $mover = @move_uploaded_file($_FILES['base_datos']['tmp_name'], $rutaBd);

  if ($mover) {
      $moverFlag = true;
  }

  /* Proceso fichero alumnos */

  $rutaAlumnos = '../uploads/alumnos/'.$_FILES['base_alumnos']['name'];
  $moverFlagAlumnos = false;
  $moverAlumnos = @move_uploaded_file($_FILES['base_alumnos']['tmp_name'], $rutaAlumnos);

  if ($moverAlumnos) {
      $moverFlagAlumnos = true;
  }

  /* Proceso fichero vehiculos */

  $rutaVehiculos = '../uploads/vehiculos/'.$_FILES['base_vehiculos']['name'];
  $moverFlagVehiculos = false;
  $moverVehiculos = @move_uploaded_file($_FILES['base_vehiculos']['tmp_name'], $rutaVehiculos);

  if ($moverVehiculos) {
      $moverFlagVehiculos = true;
  }

  /* Variables quemadas */




  $objPHPExcel = PHPExcel_IOFactory::load($rutaBd);
  $objPHPExcel->setActiveSheetIndex(0);
  $filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
  $columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
  if ($columnas == "U") {
    /* Recorrer archivos*/

    /* Fichero bd */

    for ($i = 0; $i <= $filas; $i++) {
      $codigo = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
      $nRuta = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
      $colegio = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
      $apellidos = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
      $nombre = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
      $direccion = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
      $tel = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
      $nombrePadre = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
      $apellidosPadre = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
      $celularPadre = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
      $cedulaPadre = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
      $emailPadre = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
      $nombreMadre = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
      $apellidosMadre = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
      $celularMadre = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
      $cedulaMadre = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
      $emailMadre = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
      $barrio = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
      $eje = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
      $nombreAcuerdoFin = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
      $ccAcuerdoFin = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();

      /* Agregar elemento al array*/

      $arrayBd[] = array('codigo' => $codigo, 'nRuta' => $nRuta, 'colegio' => $colegio, 'apellidos' => $apellidos, 'nombre' => $nombre, 'direccion' => $direccion, 'tel' => $tel, 'nombre_padre' => $nombrePadre, 'apellidos_padre' => $apellidosPadre,
                       'celular_padre' => $celularPadre, 'cedula_padre' => $cedulaPadre, 'email_padre' => $emailPadre, 'nombre_madre' => $nombreMadre, 'apellidos_madre' => $apellidosMadre, 'celular_madre' => $celularMadre, 'cedula_madre' => $cedulaMadre, 'email_madre' => $emailMadre,
                       'barrio' => $barrio, 'eje' => $eje, 'nombre_acuerdo_fin' => $nombreAcuerdoFin, 'cc_acuerdo_fin' => $ccAcuerdoFin);

    }

    /* Fichero alumno */

    $objPHPExcelAlumno = PHPExcel_IOFactory::load($rutaAlumnos);
    $objPHPExcelAlumno->setActiveSheetIndex(0);
    $filasAlumno = $objPHPExcelAlumno->setActiveSheetIndex(0)->getHighestRow();
    $columnasAlumnos = $objPHPExcelAlumno->setActiveSheetIndex(0)->getHighestColumn();
    if ($columnasAlumnos == "D") {
      for ($j=0; $j <= $filasAlumno; $j++) {
        $codigoAlumno = $objPHPExcelAlumno->getActiveSheet()->getCell('A'.$j)->getCalculatedValue();
        $colegioAlumno = $objPHPExcelAlumno->getActiveSheet()->getCell('B'.$j)->getCalculatedValue();
        $rutaAlumno = $objPHPExcelAlumno->getActiveSheet()->getCell('C'.$j)->getCalculatedValue();
        $valor = $objPHPExcelAlumno->getActiveSheet()->getCell('D'.$j)->getCalculatedValue();
        $arrayAlumnos[] = array('codigo_alumno' => $codigoAlumno, 'colegio_alumno' => $colegioAlumno, 'ruta_alumno' => $rutaAlumno, 'valor' => $valor);
      }
      /* Fichero vehiculos */

      $objPHPExcelVehiculo = PHPExcel_IOFactory::load($rutaVehiculos);
      $objPHPExcelVehiculo->setActiveSheetIndex(0);
      $filasVehiculo = $objPHPExcelVehiculo->setActiveSheetIndex(0)->getHighestRow();
      $columnas = $objPHPExcelVehiculo->setActiveSheetIndex(0)->getHighestColumn();
      if ($columnas == "C") {
        for ($k=0; $k <= $filasVehiculo; $k++) {
          $colegioVehiculo = $objPHPExcelVehiculo->getActiveSheet()->getCell('A'.$k)->getCalculatedValue();
          $rutaVehiculo = $objPHPExcelVehiculo->getActiveSheet()->getCell('B'.$k)->getCalculatedValue();
          $nombreVehiculo = $objPHPExcelVehiculo->getActiveSheet()->getCell('C'.$k)->getCalculatedValue();
          $arrayVehiculos[] = array('colegio_vehiculo' => $colegioVehiculo, 'ruta_vehiculo' => $rutaVehiculo, 'nombre_vehiculo' => $nombreVehiculo);
        }

        /* Variables quemadas archivo salida */
        $autonumerico = " ";
        $sucursal = " ";
        $cboIdDireccion = " ";
        $cantidadExcel = 1;
        $descuento = "0,00%";
        $centroCosto = " ";
        $observacion = " ";
        $activos = "-1";
        $prefijo = " ";
        $idDireccion = " ";
        $personalizadoUno = " ";
        $personalizadoDos = " ";
        $mesDiferir = " ";
        $idSucursal = " ";
        $numerador = 0;

        /* Logica archivo de salida */

        $cantRegistros = count($arrayAlumnos);


        /* Se crea el archivo plano de salida */
        header('Content-Type: application/vdn.ms-excel');
        header('Content-Disposition: attachment; filename=plantilla_colegios.xls');
        $excel = new PHPExcel();
        $excel->getProperties()->setCreator('Taxisya')->setLastModifiedBy('Taxisya')->setTitle('Reporte');
        $excel->setActiveSheetIndex(0);
        $pagina = $excel->getActiveSheet();
        $pagina->setTitle('Servicios-Mes');

        /* Cabeceras */
          $pagina->setCellValue('A1', 'Autonúmerico');
          $pagina->setCellValue('B1', 'Cliente');
          $pagina->setCellValue('C1', 'Sucursal (Opcional)');
          $pagina->setCellValue('D1', 'CboIdDireccion');
          $pagina->setCellValue('E1', 'Item a Facturar');
          $pagina->setCellValue('F1', 'Cantidad');
          $pagina->setCellValue('G1', 'Valor Unit.');
          $pagina->setCellValue('H1', 'Dcto');
          $pagina->setCellValue('I1', 'Centro Costos');
          $pagina->setCellValue('J1', 'Concepto (Factura)');
          $pagina->setCellValue('K1', 'Observacion');
          $pagina->setCellValue('L1', 'Activo');
          $pagina->setCellValue('M1', 'Tercero Secundario (Opcional)');
          $pagina->setCellValue('N1', 'Prefijo (Opcional)');
          $pagina->setCellValue('O1', 'IdDireccion');
          $pagina->setCellValue('P1', 'Personalizado1');
          $pagina->setCellValue('Q1', 'Personalizado2');
          $pagina->setCellValue('R1', 'Meses Diferir');
          $pagina->setCellValue('S1', 'IdSucursal');

          //negrita y tamaño
          $pagina->getStyle('A1:S1')->getFont()->setBold(true);
          $pagina->getStyle('A1:S1')->getFont()->setSize(12);



        foreach ($arrayAlumnos as $dato) {

            $clave = array_search($dato['codigo_alumno'], array_column($arrayBd, 'codigo'));
            $claveVehiculo = array_search($dato['ruta_alumno'], array_column($arrayVehiculos, 'ruta_vehiculo'));

            $cedulaFather = $arrayBd[$clave]['celular_padre'];
            $cedulaAcudiente = $cedulaFather;

            if ($cedulaFather == null || $cedulaFather == "sin datos") {
              $cedulaMother = $arrayBd[$clave]['cedula_madre'];
              $cedulaAcudiente = $cedulaMother;
            }

            $pagoConductor = $arrayVehiculos[$claveVehiculo]['nombre_vehiculo'];
            $concepto = 'CODIGO '.$dato['codigo_alumno'].' RUTA '.$dato['ruta_alumno'].' '.$mes;
            //echo $cedulaAcudiente;
            //echo "<br>";
            //echo $pagoConductor;
            //echo "<br>";


            $pagina->setCellValue('A'.($numerador+2), $autonumerico);
            $pagina->setCellValue('B'.($numerador+2), $cedulaAcudiente);
            $pagina->setCellValue('C'.($numerador+2), $sucursal);
            $pagina->setCellValue('D'.($numerador+2), $cboIdDireccion);
            $pagina->setCellValue('E'.($numerador+2), $dato['colegio_alumno']);
            $pagina->setCellValue('F'.($numerador+2), $cantidadExcel);
            $pagina->setCellValue('G'.($numerador+2), $dato['valor']);
            $pagina->setCellValue('H'.($numerador+2), $descuento);
            $pagina->setCellValue('I'.($numerador+2), $centroCosto);
            $pagina->setCellValue('J'.($numerador+2), $concepto);
            $pagina->setCellValue('K'.($numerador+2), $observacion);
            $pagina->setCellValue('L'.($numerador+2), $activos);
            $pagina->setCellValue('M'.($numerador+2), $pagoConductor);
            $pagina->setCellValue('N'.($numerador+2), $prefijo);
            $pagina->setCellValue('O'.($numerador+2), $idDireccion);
            $pagina->setCellValue('P'.($numerador+2), $personalizadoUno);
            $pagina->setCellValue('Q'.($numerador+2), $personalizadoDos);
            $pagina->setCellValue('R'.($numerador+2), $mesDiferir);
            $pagina->setCellValue('S'.($numerador+2), $idSucursal);



            $numerador = $numerador + 1;
        }

        //Tamaño de las celdas
        foreach (range('A', 'S') as $column) {
            $pagina->getColumnDimension($column)->setAutoSize(true);
        }

        /* Borrar ficheros*/
        unlink('../uploads/bd/'.$_FILES['base_datos']['name']);
        unlink('../uploads/alumnos/'.$_FILES['base_alumnos']['name']);
        unlink('../uploads/vehiculos/'.$_FILES['base_vehiculos']['name']);


        //Descargar excel
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save('php://output');
      }else {
        header('Location: ../views/mensajes/alerta_archivo.html');
      }
    }else {
      header('Location: ../views/mensajes/alerta_archivo.html');
    }

  }else {
    header('Location: ../views/mensajes/alerta_archivo.html');
  }



}else {
  header('Location: ../views/mensajes/alerta_validacion.html');;
}

 ?>
