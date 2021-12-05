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
		$appletree = $this->input->post("appletree");
		$lote = $this->input->post("lote");
		$this->form_validation->set_rules("appletree", "manzano", "required");
		$this->form_validation->set_rules("lote", "lote", "required");

		if ($this->form_validation->run()) {

			if ($this->Details_model->getAffiliate($appletree, $lote)) {
				$data = array(
							'details' => $this->Details_model->getPayAffiliate($appletree, $lote), 
							'meter' => $this->Details_model->getMeter($appletree, $lote));

				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("content/details/pay", $data);
				$this->load->view("layouts/footer");
			} else {
				$this->session->set_flashdata("error"," No existe ningun afiliado.");
				$this->pay();
			}
		}else{
			$this->pay();
		}	
	}

	public function detailadd(){
		$detailId = $this->input->post("detailId");
		$missingmeeting = $this->input->post("missingmeeting");
		$other = $this->input->post("other");
		$total = $this->input->post("total");
		$meterId = $this->input->post("meterId");
		$AffiliateId = $this->input->post("AffiliateId");

		if($missingmeeting == 1) {
			$missingmeeting = 50;
		} else {
			$missingmeeting = 0;
		}

		$verifyreconnection = $this->Details_model->getVerifyReconnection($meterId, $AffiliateId);


		$total = $total + $missingmeeting + $other + $verifyreconnection->reconnection;

		$data = array('missingmeeting' => $missingmeeting, 'other' => $other, 'total' => $total);
		if ($this->Details_model->update($detailId, $data)) {

			$this->generateinvoice($detailId);
		}
			
	}

	public function generateinvoice($id){

		$datetoday = date("Y-m-d h:i:s");
		
		$data = array('dateofissue' => $datetoday, 'pendingdetails' => 0, 'status' => 1);
		if ($this->Details_model->update($id, $data)) {

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
	        $this->pdf->Cell(90,8, utf8_decode('N° RECIBO: '.$detail->id), 'TRL',0,'L','0');
	        $this->pdf->Ln(7);
			$this->pdf->SetX(110);
			$this->pdf->SetFont('Arial', '', 10);
	        $this->pdf->Cell(90,8, utf8_decode('Fecha: '.$datetoday), 'BRL',0,'L','0');
	        $this->pdf->Ln(5);
	        $this->pdf->Cell(95,7, utf8_decode('Señor (a): '.$detail->names), '',0,'L','0');
			$this->pdf->Ln(5);
	        $this->pdf->Cell(95,7, utf8_decode('Direccion: '.$detail->address), '',0,'L','0');
			$this->pdf->Ln(5);
	        $this->pdf->Cell(55,7, ('Manzano: '.$detail->appletree), '',0,'L','0');
			$this->pdf->Cell(40,7, ('Lote: '.$detail->lote), '',0,'L','0');
	        $this->pdf->Ln(7);
	        $this->pdf->Cell(55,7, 'Lectura anterior: '.$detail->previousreading, '',0,'L','0');
	        $this->pdf->Cell(40,7, 'Fecha: ' .$detail->previousdate, '',0,'L','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,7, utf8_decode('Perido: '.$detail->period), '',0,'L','0');
	        $this->pdf->Ln(5);
	        $this->pdf->Cell(55,7, 'Lectura actual: '.$detail->currentreading, '',0,'L','0');
	        $this->pdf->Cell(40,7, 'Fecha: '.$detail->currentdate, '',0,'L','0');
	        $this->pdf->SetX(110);
	        $this->pdf->Cell(90,7,'Consumo: '.($detail->currentreading-$detail->previousreading).' m3','',0,'L','0');
	  
	        $this->pdf->Ln(10);
	        $this->pdf->SetFont('Arial', 'B', 10);
	        $this->pdf->Cell(25,7,'#','TBL',0,'C','1');
	        $this->pdf->Cell(120,7,'Detalle de pago','TBRL',0,'C','1');
	        $this->pdf->Cell(45,7,'Importe (Bs)','TBRL',0,'C','1');
	        
	        $this->pdf->SetFont('Arial', '', 10);
	        $this->pdf->Ln(8);
	        $this->pdf->Cell(25,7,'-','',0,'C','0');
	        $this->pdf->Cell(120,7,'Pago por consumo de agua','',0,'L','0');
	        $this->pdf->Cell(45,7, $detail->amount, '',0,'C','0');

			if($detail->notify == 1) {
				$this->pdf->Ln(5);
				$this->pdf->Cell(25,7,'-','',0,'C','0');
				$this->pdf->Cell(120,7,'Notificacion','',0,'L','0');
				$this->pdf->Cell(45,7, $detail->notify, '',0,'C','0');
			}
			if($detail->missingmeeting > 0) {
				$this->pdf->Ln(5);
				$this->pdf->Cell(25,7,'-','',0,'C','0');
				$this->pdf->Cell(120,7,'Falta a reunion','',0,'L','0');
				$this->pdf->Cell(45,7, $detail->missingmeeting, '',0,'C','0');
			}

			if($detail->reconnection > 0) {
				$this->pdf->Ln(5);
				$this->pdf->Cell(25,7,'-','',0,'C','0');
				$this->pdf->Cell(120,7,'Reconexion','',0,'L','0');
				$this->pdf->Cell(45,7, $detail->reconnection, '',0,'C','0');
			}

			if($detail->other > 0) {
				$this->pdf->Ln(5);
				$this->pdf->Cell(25,7,'-','',0,'C','0');
				$this->pdf->Cell(120,7,'Otros','',0,'L','0');
				$this->pdf->Cell(45,7, $detail->other, '',0,'C','0');
			}
				
	        $this->pdf->Ln(7);
	        $this->pdf->SetX(165);
	        $this->pdf->Cell(35,0,'','T',0,'C','0');
	        $this->pdf->Ln(1);
	        $this->pdf->SetX(165);
	        $this->pdf->SetFont('Arial', 'B', 12);
	        $this->pdf->Cell(35,10,'Total: ' .$detail->total .' Bs', 'TBRL',0,'L','0');

	        $this->pdf->Output('D', 'Recibo de pago.pdf');

	        // $data = array('user' => $ci);
			// $this->session->set_userdata($data);
			$this->searchdetail();
		} else {
			
		}
		

		
	}




}
