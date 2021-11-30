<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Users_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array('users' => $this->Users_model->getUsers());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/users/users", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{
		$data = array('roles' => $this->Users_model->getRoles());
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/users/useradd", $data);
		$this->load->view("layouts/footer");
	}

	public function register()
	{
		$names = ucwords($this->input->post("names"));
		$firstname = ucwords($this->input->post("firstname"));
		$lastname = ucwords($this->input->post("lastname"));
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$rpassword = $this->input->post("rpassword");
		$id_roles = $this->input->post("id_roles");

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';

		$config['file_name'] = uniqid() . str_replace(' ', '', $_FILES['image']['name']);
		$this->load->library('upload', $config);

		$this->form_validation->set_rules("names", "nombres", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("firstname", "primer apellido", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("lastname", "segundo apellido", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("username", "usuario", "required|is_unique[users.username]|min_length[4]");
		$this->form_validation->set_rules("password", "constraseña", "required|min_length[4]|matches[rpassword]");
		$this->form_validation->set_rules("rpassword", "repetir contraseña", "required|min_length[4]");
		$this->form_validation->set_rules("id_roles", "rol", "required");

		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules("image", "imagen", "required");
		}
		
		if ($this->form_validation->run()) {

			if ($this->upload->do_upload('image')) {
				$data = array('names' => $names, 'firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'password' => sha1($password), 'id_roles' => $id_roles, 'image' => $config['file_name'], 'status' => 1);
				if ($this->Users_model->save($data)) {
					$this->session->set_flashdata("success", " Registro realizado exitosamente.");
					redirect(base_url() . "users");
				}
			} 
		} else {
			$this->add();
		}
	}

	public function edit($id){
		$data = array(
					'roles' => $this->Users_model->getRoles(), 
					'user' => $this->Users_model->getUser($id),);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("content/users/useredit", $data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$userId = $this->input->post("userId");
		$names = ucwords($this->input->post("names"));
		$firstname = ucwords($this->input->post("firstname"));
		$lastname = ucwords($this->input->post("lastname"));
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$id_roles = $this->input->post("id_roles");
		$pass = $this->input->post("pass");
		if ($pass == 1) {
			$password = $this->input->post("password");
			$rpassword = $this->input->post("rpassword");
		}

		$currentUser = $this->Users_model->getUser($userId);
		if ($username == $currentUser->username) {
			$is_unique = '';
		}else{
			$is_unique = '|is_unique[users.username]';
		}
		$this->form_validation->set_rules("names", "nombres", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("firstname", "primer apellido", "required|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("lastname", "segundo apellido", "regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]");
		$this->form_validation->set_rules("username", "usuario", "required".$is_unique);
		if ($pass == 1) {
			$this->form_validation->set_rules("password", "constraseña", "required|min_length[4]|matches[rpassword]");
			$this->form_validation->set_rules("rpassword", "repetir contraseña", "required|min_length[4]");
		}
		$this->form_validation->set_rules("id_roles", "rol", "required");

		if ($this->form_validation->run()) {
			if ($pass == 1) {
				$data = array('names' => $names, 'firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'password' => sha1($password), 'id_roles' => $id_roles, 'status' => 1);
			} else {
				$data = array('names' => $names, 'firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'id_roles' => $id_roles, 'status' => 1);
			}
			if ($this->Users_model->update($userId, $data)) {
				$this->session->set_flashdata("success"," Modificacion realizado exitosamente.");
				redirect(base_url()."Users");
			}
		}else{
			$this->edit($userId);
		}
	}

	public function delete($id)
	{
		$data = array('status' => 0);
		if ($this->Users_model->update($id, $data)) {
			redirect(base_url() . "users");
		}
	}
}
