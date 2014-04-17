<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lienhe_model extends CI_Model {
	
	var $table = 'tbl_lienhe';
	
	function __construct()
	{
		parent::__construct();
	}
	function select()
	{
		$this->db->order_by('NgayTao','desc');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	function edit($Id)
	{
		$query = $this->db->get_where($this->table,array('Id'=>$Id));
		return $query->result();
	}
	function insert($Name,$Phone,$Email,$TieuDe,$NoiDung)
	{
		$data = array(
			"Name"	=>	$Name,
			"Phone" =>	$Phone,
			"Email"	=>	$Email,
			"TieuDe" => $TieuDe,
			"NoiDung" => $NoiDung,
			"NgayTao" => date('Y-m-d H:i:s'),
			"TinhTrang" => 0
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return 1;
		return -1;
	}
	
	
	function status($Id)
	{
		if($this->db->query("SELECT TinhTrang FROM ".$this->table." WHERE Id = ?",array($Id))->row()->TinhTrang == 1)
		{
			$TinhTrang = 0;
		}
		else
		{
			$TinhTrang = 1;
		}
		$this->db->where("Id", $Id);
		$this->db->update($this->table, array("TinhTrang" => $TinhTrang));
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}
	
	function delete($Id)
	{
		$this->db->delete($this->table, array("Id" => $Id));
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}
}