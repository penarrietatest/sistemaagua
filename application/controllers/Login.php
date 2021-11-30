<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Login_model");
	}
	public function index() {
		if ($this->session->userdata("login")) {
			redirect(base_url()."home");
		}
		else{
			$this->load->view("content/login");
		}
	}

	public function login() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$res = $this->Login_model->login($username, sha1($password));

		if (!$res) {
			$this->session->set_flashdata("error"," The user and/or password are incorrect");
			redirect(base_url());
		}
		else{
			$data  = array(
				'id' => $res->id, 
				'names' => $res->names,
				'firstname' => $res->firstname,
				'lastname' => $res->lastname,
				'username' => $res->username,
				'rol' => $res->id_roles,
				'image' => $res->image,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."home");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}