<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price_model extends CI_Model {


	public function getPrices(){
		$resultado = $this->db->get("prices");
		return $resultado->row();
	}

    public function update($data){
		$this->db->where("id", 1);
		return $this->db->update("prices", $data);
	}
	

}