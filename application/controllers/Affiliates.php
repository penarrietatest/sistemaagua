<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Affiliates extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Affiliates_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array('affiliates' => $this->Affiliates_model->getAffiliates());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/affiliates/affiliates", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/affiliates/affiliateadd");
		$this->load->view("layouts/footer");
	}

	public function register()
	{
		$ci = $this->input->post("ci");
		$names = ucwords($this->input->post("names"));
		$firstname = ucwords($this->input->post("firstname"));
		$lastname = ucwords($this->input->post("lastname"));
		$address = $this->input->post("address");
		$appletree = $this->input->post("appletree");
		$lote = $this->input->post("lote");
		$phone = $this->input->post("phone");

		$this->form_validation->set_rules("ci", "numero de carnet", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("names", "nombres", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("firstname", "primer apellido", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("lastname", "segundo apellido", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("address", "direccion", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("appletree", "manzano", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("lote", "lote", "required|alpha_numeric_spaces");
		$this->form_validation->set_rules("phone", "telefono", "alpha_numeric_spaces");
		
		if ($this->form_validation->run()) {
            $data = array('ci' => $ci,'names' => $names, 'firstname' => $firstname, 'lastname' => $lastname, 'address' => $address, 'appletree' => $appletree, 'lote' => $lote, 'phone' => $phone, 'status' => 1);
            if ($this->Affiliates_model->save($data)) {
                $this->session->set_flashdata("success", " Registro realizado exitosamente.");
                redirect(base_url() . "affiliates");
            }
		} else {
			$this->add();
		}
	}

	public function delete($id)
	{
		$data = array('status' => 0);
		if ($this->Affiliates_model->update($id, $data)) {
			redirect(base_url() . "affiliates");
		}
	}
}
