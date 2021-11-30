<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function getUsers() {
		$this->db->select("u.*, r.name as rol");
		$this->db->from("users u");
		$this->db->join("roles r", "u.id_roles=r.id");
		$this->db->where("u.status", 1);
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getRoles() {
		$resultados =$this->db->get("roles");
		return $resultados->result();
	}
	
	public function save($data){
		return $this->db->insert("users", $data);
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("users", $data);
	}

	public function getUser($id){
		$this->db->select("u.*");
		$this->db->from("users u");
		$this->db->where("u.id", $id);
		$this->db->where("u.status", 1);
		$resultado =$this->db->get();
		return $resultado->row();
	}
    



}