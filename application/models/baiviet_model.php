<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class baiviet_model extends CI_Model
{
	var $table = 'tbl_baiviet';
	
	function __construct()
	{
		parent::__construct();
	}
    
    function select()
    {
        $query = $this->db->get($this->table);
		return $query->result();
    }
	
	function edit($Id)
	{
		$query = $this->db->get_where($this->table,array('Id'=>$Id));
		return $query->result();
	}
	function update($Id, $Ten_en, $Ten_vi, $NoiDung_en,$NoiDung_vi)
	{		
		$data = array(
			"Ten_en"	=>	$Ten_en,
			"Ten_vi"	=>	$Ten_vi,
			"NoiDung_en"	=>	$NoiDung_en,
			"NoiDung_vi"	=>	$NoiDung_vi
		);
		$this->db->where("Id", $Id);
		$this->db->update($this->table, $data);
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