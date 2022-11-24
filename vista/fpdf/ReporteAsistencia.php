<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../modelo/conexion.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from institucion");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 180, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('I.E PEDRO MERCEDES UREÑA'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación :  MZ P LT. 6 Natasha Alta Urb., Trujillo"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : (044) 285759 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo :pmu.trujillo@gmail.com "), 0, 0, '', 0);
      $this->Ln(10);

      
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE ASISTENCIAS "), 0, 1, 'C', 0);
      $this->Ln(2);

      
      // FILTROS DESDE - HASTA
      $fechainicio = empty($_GET['fInicio']) ? date('Y-m-01') : $_GET['fInicio'];
      $fechafinal = empty($_GET['fFinal']) ? date('Y-m-t') : $_GET['fFinal'];
      
      $this->SetTextColor(0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(100, 10, utf8_decode("Desde: " . date('d/m/Y', strtotime($fechainicio)) . '  Hasta: ' . date('d/m/Y', strtotime($fechafinal))), 0, 1, 'C', 0);
      $this->Ln(1);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(154, 190, 83); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(0, 0, 0); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(13, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('ALUMNO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('DNI'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('ENTRADA'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('SALIDA'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('TARDANZA'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}
include '../../modelo/conexion.php';
$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde


// FILTROS DESDE - HASTA
$fechainicio = empty($_GET['fInicio']) ? date('Y-m-01') : $_GET['fInicio'];
$fechafinal = empty($_GET['fFinal']) ? date('Y-m-t') : $_GET['fFinal'];

$consulta_reporte_asistencia = $conexion->query("select asistencia.fecha,asistencia.entrada,asistencia.salida,tardanza,alumno.dni,alumno.nombre,alumno.apellidos from asistencia
inner join matricula on asistencia.id_matricula= matricula.id_matricula
inner join alumno on matricula.id_alumno=alumno.id_alumno 
WHERE (fecha BETWEEN '$fechainicio' AND '$fechafinal')");

while ($datos_reporte = $consulta_reporte_asistencia->fetch_object()) {    
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(13, 10, utf8_decode($i), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($datos_reporte->nombre. " " .$datos_reporte->apellidos), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->dni), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->fecha), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->entrada), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->salida), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->tardanza), 1, 1, 'C', 0);
   }



$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)

