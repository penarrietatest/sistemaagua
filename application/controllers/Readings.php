<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Readings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Readings_model");
		$this->load->model("Details_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/readings/readings");
		$this->load->view("layouts/footer");
	}


    public function searchaffiliate(){
		$appletree = $this->input->post("appletree");
        $lote = $this->input->post("lote");
		$this->form_validation->set_rules("appletree", "manzano", "required");
        $this->form_validation->set_rules("lote", "lote", "required");

		if ($this->form_validation->run()) {
			if ($this->Readings_model->getSearchAffiliate($appletree, $lote)) {

				$res = $this->Readings_model->getSearchAffiliate($appletree, $lote);
				$id = $res->id;

				$data = array('meter' => $this->Readings_model->getMeterList($id));
				
				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("content/readings/readings", $data);
				$this->load->view("layouts/footer");
			} else {
				$this->session->set_flashdata("error"," No existe ningun afiliado...");
				$this->index();
			}
		}else{
			$this->index();
		}
	}



	public function reading($id){
		$data = array(
					'meter' => $this->Readings_model->getMeter($id), 
					'reading' => $this->Readings_model->getReading($id));
		$this->load->view("layouts/header");
        $this->load->view("layouts/aside");
		$this->load->view("content/readings/reading", $data);
		$this->load->view("layouts/footer");
	}

    public function readingadd(){
        
		$id_meter = $this->input->post("id_meter");
		$p_reading = $this->input->post("p_reading");
		$currentreading = $this->input->post("currentreading");
		$previousdate = $this->input->post("previousdate");
        $observation = $this->input->post("observation");
		$id_affiliate = $this->input->post("id_affiliate");

		setlocale(LC_TIME, 'spanish');
		$today = getdate();
		$month = ucwords(strftime("%B"));
		$year = strftime("%Y");
		$period = $month .' / '. $year;

		$currentdate = date("Y-m-d");
        
		$this->form_validation->set_rules("currentreading", "nueva lectura", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("observation", "observacion", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
	
		if ($this->form_validation->run()) {

			if ($currentreading >= $p_reading) {
				$data = array('id_meter' => $id_meter, 'previousreading' => $p_reading, 'currentreading' => $currentreading, 'previousdate' => $previousdate, 'currentdate' => $currentdate, 'observation' => $observation);

				//--------------------------

				$quantity = $this->Readings_model->getQuantityDetail($id_meter, $id_affiliate);
				if ($quantity) {
					$notify = 1;
				} else {
					$notify = 0;
				}
				$pcs = $this->Readings_model->getPrices();
				$amount = (($currentreading - $p_reading ) * $pcs->price);
				$total = $amount + $notify;

				$datadetail = array('id_meter' => $id_meter, 'previousreading' => $p_reading, 'currentreading' => $currentreading, 'period' => $period, 'previousdate' => $previousdate, 'currentdate' => $currentdate, 'dateofissue' => $currentdate, 'id_affiliate' => $id_affiliate, 'notify' => $notify, 'amount' => $amount, 'total' => $total, 'status' => 0,);			 
				//--------------------------

				if ($this->Readings_model->saver($data) && $this->Details_model->save($datadetail)) {

					$this->session->set_flashdata("success"," Lectura registrada correctamente.");
					redirect(base_url()."Readings");
				}

			} else {
				$this->session->set_flashdata("error"," Lectura actual es menor a lectura anterior.");
				$this->reading($id_meter);
			}	

		}else{
			$this->reading($id_meter);
		}	
	}


}
