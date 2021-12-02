<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image(base_url().'vendors/images/agua.png',10,5,0);
            $this->SetFont('Arial','',12);
            $this->Cell(0,10,'COMITE DE AGUA POTABLE EL CARMEN',0,0,'C');
            $this->Ln(3);
            $this->SetFont('Arial','',8);
            $this->Cell(0,14,'MARBAN - BENI - BOLIVIA',0,0,'C');
            $this->Ln(10);
            $this->SetFont('Arial','B',15);
            $this->Cell(0,14,'RECIBO DE INGRESO',0,0,'C');
            $this->Ln(13);
       }
       // El pie del PDF
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(80,5,'..................................',0,0,'C'); 
           $this->Cell(0,5,'...........................................',0,0,'C');
           $this->Ln(4);
           $this->Cell(80,5,'RECIBI CONFORME',0,0,'C'); 
           $this->Cell(0,5,'ENTREGUE CONFORME',0,0,'C');
      }
    }
?>