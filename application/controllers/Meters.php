<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meters extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Meters_model");
		$this->load->model("Details_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array('meters' => $this->Meters_model->getMeters());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/meters/meters", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{
        $data = array('affiliates' => $this->Meters_model->getAffiliates());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/meters/meteradd", $data);
		$this->load->view("layouts/footer");
	}

	public function register()
	{
		$meter = $this->input->post("meter");
		$id_affiliate = $this->input->post("id_affiliate");
		$p_reading = $this->input->post("p_reading");
		$state = $this->input->post("state");
        $currentdate = date("Y-m-d");

		$this->form_validation->set_rules("meter", "numero de medidor", "required|is_unique[meters.meter]|alpha_numeric_spaces");
		$this->form_validation->set_rules("id_affiliate", "afiliado", "required");
		$this->form_validation->set_rules("p_reading", "lectura del medidor", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("state", "state", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		
		if ($this->form_validation->run()) {
            $data = array('meter' => $meter, 'id_affiliate' => $id_affiliate, 'p_reading' => $p_reading, 'currentdate' => $currentdate, 'state' => $state, 'status' => 1);
            if ($this->Meters_model->save($data)) {
                $this->session->set_flashdata("success", " Registro realizado exitosamente.");
                redirect(base_url() . "meters");
            }
		} else {
			$this->add();
		}
	}

	public function delete($id)
	{
		$data = array('status' => 0);
		if ($this->Meters_model->update($id, $data)) {
			redirect(base_url() . "meters");
		}
	}


}
