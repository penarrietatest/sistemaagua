<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Details extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Details_model");
		$this->load->library('pdf');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function invoice()
	{
		$data = array('details' => $this->Details_model->getDetails());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/details/invoice", $data);
		$this->load->view("layouts/footer");
	}

	public function pay()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/details/pay");
		$this->load->view("layouts/footer");
	}

	public function searchdetail(){

		$search = $this->input->post("search");
		$this->form_validation->set_rules("search", "Ingrese C.I. para buscar", "required");

		if ($this->form_validation->run()) {
			if ($this->Details_model->getAffiliate($search)) {
				$data = array(
							'details' => $this->Details_model->getPayAffiliate($search), 
							'meter' => $this->Details_model->getMeter($search));

				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("content/details/pay", $data);
				$this->load->view("layouts/footer");
			} else {
				$this->session->set_flashdata("error"," No existe ningun afiliado con ese C.I.");
				$this->pay();
			}
		}else{
			$this->pay();
		}	
	}


	public function generateinvoice($id, $ci){
		$data = array('status' => 1);
		if ($this->Details_model->update($id, $data)) {
			$datetoday = date("Y-m-d h:i:s");

			$this->pdf = new Pdf();
	        $this->pdf->AddPage("L", "A5");
	        $this->pdf->AliasNbPages();
	        $this->pdf->SetFont('Arial','B',20);
	        $this->pdf->SetTitle("Recibo de Ingreso");

	        $this->pdf->SetLeftMargin(10);
	        $this->pdf->SetRightMargin(10);
	        $this->pdf->SetFillColor(200,200,200);
	     
	        $this->pdf->SetFont('Arial', 'B', 12);

	        $detail = $this->Details_model->getPay($id);
	        $this->pdf->Cell(50,10, utf8_decode('N° MEDIDOR: '.$detail->meter), 'TBRL',0,'L','0');
	        $this->pdf->Cell(45,10, utf8_decode('C.I.: '.$detail->ci), 'TBRL',0,'C','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,10, utf8_decode('N° RECIBO: '.$detail->id), 'TRL',0,'L','0');
	        $this->pdf->Ln(10);
			$this->pdf->SetX(110);
			$this->pdf->SetFont('Arial', '', 10);
	        $this->pdf->Cell(90,10, utf8_decode('Fecha: '.$datetoday), 'BRL',0,'L','0');
	        $this->pdf->Ln(10);
	        $this->pdf->Cell(95,7, utf8_decode('Señor (a): '.$detail->names), '',0,'L','0');
	        
	        $this->pdf->Ln(7);
	        $this->pdf->Cell(55,7, 'Lectura anterior: '.$detail->previousreading, '',0,'L','0');
	        $this->pdf->Cell(40,7, 'Fecha: ' .$detail->previousdate, '',0,'L','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,7, utf8_decode('Perido: '.$detail->period), '',0,'L','0');
	        $this->pdf->Ln(7);
	        $this->pdf->Cell(55,7, 'Lectura actual: '.$detail->currentreading, '',0,'L','0');
	        $this->pdf->Cell(40,7, 'Fecha: '.$detail->currentdate, '',0,'L','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,7,'Consumo: '.($detail->currentreading-$detail->previousreading).' m3','',0,'L','0');
	  
	        $this->pdf->Ln(15);
	        $this->pdf->SetFont('Arial', 'B', 10);
	        $this->pdf->Cell(15,7,'#','TBL',0,'C','1');
	        $this->pdf->Cell(100,7,'Detalle de pago','TBRL',0,'C','1');
	        $this->pdf->Cell(40,7,'Consumo','TBRL',0,'C','1');
	        $this->pdf->Cell(35,7,'Importe','TBRL',0,'C','1');
	        
	        $this->pdf->SetFont('Arial', '', 10);
	        $this->pdf->Ln(8);
	        $this->pdf->Cell(15,7,'1','',0,'C','0');
	        $this->pdf->Cell(100,7,'Pago por consumo de agua','',0,'L','0');
	        $this->pdf->Cell(40,7, ($detail->currentreading-$detail->previousreading).' m3', '',0,'C','0');
	        $this->pdf->Cell(35,7, $detail->total, '',0,'C','0');

				
	        $this->pdf->Ln(15);
	        $this->pdf->SetX(165);
	        $this->pdf->Cell(35,0,'','T',0,'C','0');
	        $this->pdf->Ln(3);
	        $this->pdf->SetX(165);
	        $this->pdf->SetFont('Arial', 'B', 12);
	        $this->pdf->Cell(35,10,'Total: ' .$detail->total .' Bs', 'TBRL',0,'L','0');

	        $this->pdf->Output('I', 'factura.pdf');

	        $data = array('usuario' => $ci);
			$this->session->set_userdata($data);
			$this->searchdetail();
		} else {
			
		}
		

		
	}




}
