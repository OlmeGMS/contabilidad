<?php
require_once('../../vendor/PHPExcel/Classes/PHPExcel.php');
require_once('../../vendor/PHPExcel/Classes/PHPExcel/IOFactory.php');
ini_set('date.timezone', 'America/Bogota');

/* Se crea el archivo plano de base de datos */
header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=base_datos.xls');
$excel = new PHPExcel();
$excel->getProperties()->setCreator('Taxisya')->setLastModifiedBy('Taxisya')->setTitle('Reporte');
$excel->setActiveSheetIndex(0);
$pagina = $excel->getActiveSheet();
$pagina->setTitle('Base-Datos');

/* Cabeceras */
$pagina->setCellValue('A1', 'Codigo');
$pagina->setCellValue('B1', 'Ruta');
$pagina->setCellValue('C1', 'Colegio');
$pagina->setCellValue('D1', 'Apellidos');
$pagina->setCellValue('E1', 'Nombres');
$pagina->setCellValue('F1', 'Direccion');
$pagina->setCellValue('G1', 'tel_fijo');
$pagina->setCellValue('H1', 'nombre_padre');
$pagina->setCellValue('I1', 'apell_padre');
$pagina->setCellValue('J1', 'cel._padre)');
$pagina->setCellValue('K1', 'cc_padre');
$pagina->setCellValue('L1', 'email_padre');
$pagina->setCellValue('M1', 'nomb_madre');
$pagina->setCellValue('N1', 'ap_madre');
$pagina->setCellValue('O1', 'cel._madre');
$pagina->setCellValue('P1', 'cc_madre');
$pagina->setCellValue('Q1', 'email_madre');
$pagina->setCellValue('R1', 'BARRIO');
$pagina->setCellValue('S1', 'EJE');
$pagina->setCellValue('T1', 'Nombre Acud Financiero');
$pagina->setCellValue('U1', 'C.C Acud Financiero');

//negrita y tamaño
$pagina->getStyle('A1:U1')->getFont()->setBold(true);
$pagina->getStyle('A1:U1')->getFont()->setSize(12);

//Descargar excel
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output');
 ?>
