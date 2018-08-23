<?php
<?php
require_once('../../vendor/PHPExcel/Classes/PHPExcel.php');
require_once('../../vendor/PHPExcel/Classes/PHPExcel/IOFactory.php');
ini_set('date.timezone', 'America/Bogota');

/* Se crea el archivo plano de base de datos */
header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=alumnos.xls');
$excel = new PHPExcel();
$excel->getProperties()->setCreator('Taxisya')->setLastModifiedBy('Taxisya')->setTitle('Reporte');
$excel->setActiveSheetIndex(0);
$pagina = $excel->getActiveSheet();
$pagina->setTitle('alumnos');

/* Cabeceras */
$pagina->setCellValue('A1', 'Codigo');
$pagina->setCellValue('B1', 'Colegio');
$pagina->setCellValue('C1', 'Ruta');
$pagina->setCellValue('D1', 'Valor');

//negrita y tamaño
$pagina->getStyle('A1:D1')->getFont()->setBold(true);
$pagina->getStyle('A1:D1')->getFont()->setSize(12);

//Descargar excel
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output');
 ?>
