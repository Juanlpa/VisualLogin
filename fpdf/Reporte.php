<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../models/conexion.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from estudiante ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
     //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 30); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('REPORTE COMPUTACION VISUAL'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(15); // Salto de línea
      $this->SetTextColor(103); //color

    

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0,0,0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("TABLA DE ESTUDIANTES"), 0, 1, 'C', 0);
      $this->Ln(5);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(173,39,46); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(173,39,46); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(42, 10, utf8_decode('CEDULA'), 1, 0, 'C', 1);
      $this->Cell(44, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(34, 10, utf8_decode('APELLIDO'), 1, 0, 'C', 1);
      $this->Cell(29, 10, utf8_decode('TELEFONO'), 1, 0, 'C', 1);
      $this->Cell(42, 10, utf8_decode('EDAD'), 1, 0, 'C', 1);
      
     
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

include '../models/conexion.php';


$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte_alquiler = $conn->query("SELECT * FROM estudiante");

while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   $i = $i + 1;
   /* TABLA */
   $pdf->Ln(); 
   $pdf->Cell(42, 10, utf8_decode($datos_reporte ->cedula), 1, 0, 'C', 0);
   $pdf->Cell(44, 10, utf8_decode($datos_reporte ->nombre), 1, 0, 'C', 0);
   $pdf->Cell(34, 10, utf8_decode($datos_reporte ->apellido), 1, 0, 'C', 0);
   $pdf->Cell(29, 10, utf8_decode($datos_reporte ->telefono), 1, 0, 'C', 0);
   $pdf->Cell(42, 10, utf8_decode($datos_reporte ->edad), 1, 0, 'C', 0);
}




$pdf->Output('Reporte.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
