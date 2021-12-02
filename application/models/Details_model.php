<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details_model extends CI_Model {

	public function save($data){
		return $this->db->insert("details", $data);
	}

	public function getDetails(){
		$this->db->select("d.*, CONCAT(names,' ',firstname,' ',lastname) as names, m.meter as meter");
		$this->db->from("details d");
		$this->db->join("affiliates a", "d.id_affiliate=a.id");
		$this->db->join("meters m", "d.id_meter=m.id");
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getAffiliate($appletree, $lote){
		$this->db->where("appletree", $appletree);
		$this->db->where("lote", $lote);
		$this->db->where("status", 1);
		$resultados = $this->db->get("affiliates");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function getPayAffiliate($appletree, $lote){
		$this->db->select("d.*, CONCAT(a.names,' ',a.firstname,' ',a.lastname) as names, m.meter as meter, a.ci as ci, a.address as address, a.appletree as appletree, a.lote as lote");
		$this->db->from("details d");
		$this->db->join("affiliates a", "d.id_affiliate=a.id");
		$this->db->join("meters m", "d.id_meter=m.id");
		$this->db->where("a.appletree", $appletree);
		$this->db->where("a.lote", $lote);
		$this->db->where("d.status", 0);
		$resultados =$this->db->get();
		return $resultados->result();
	}

	public function getMeter($appletree, $lote){
		$this->db->select("m.*, a.*");
		$this->db->from("meters m");
		$this->db->join("affiliates a", "m.id_affiliate=a.id");
		$this->db->where("a.appletree", $appletree);
		$this->db->where("a.lote", $lote);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function update($id, $data){
		$this->db->where("id", $id);
		return $this->db->update("details", $data);
	}

	public function getPay($id){
		$this->db->select("d.*, CONCAT(a.names,' ',a.firstname,' ',a.lastname) as names, m.meter as meter, a.ci as ci, a.appletree as appletree, a.lote as lote, a.address as address");
		$this->db->from("details d");
		$this->db->join("affiliates a", "d.id_affiliate=a.id");
		$this->db->join("meters m", "d.id_meter=m.id");
		$this->db->where("d.id", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

}