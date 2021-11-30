<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Price extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Price_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array('price' => $this->Price_model->getPrices());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/meters/price", $data);
		$this->load->view("layouts/footer");
	}

	public function register()
	{
        $price = $this->input->post("price");

		$this->form_validation->set_rules("price", "precio", "required|numeric");
		if ($this->form_validation->run()) {

			$data = array('price' => $price);
			if ($this->Price_model->update($data)) {
				$this->session->set_flashdata("success"," Modificacion realizada con exitosamente.");
				redirect(base_url()."price");
			}
		}else{
			$this->index();
		}
	}



}
