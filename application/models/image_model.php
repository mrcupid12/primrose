<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class image_model extends CI_Model {
	
	var $table = 'tbl_hinhanh';
	
	function __construct()
	{
		parent::__construct();
	}
	function select($IdSanPham)
	{
		$this->db->order_by('Id','desc');
		$query = $this->db->get_where($this->table,array('IdSanPham' => $IdSanPham));
		return $query->result();
	}
	
	function insert($IdSanPham,$UrlHinh,$ThuTu)
	{
		//if(strpos($UrlHinh,"/shopus/") !== false)
//		{
//			$UrlHinh = str_replace("/shopus/","",$UrlHinh); 
//		}
		$data = array(
			"IdSanPham" => $IdSanPham,
			"UrlHinh" => $UrlHinh,
			"ThuTu" => $ThuTu,
			"TrangThai" => 1
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}
	
	function status($Id)
	{
		if($this->db->query("SELECT TrangThai FROM ".$this->table." WHERE Id = ?",array($Id))->row()->TrangThai == 1)
		{
			$TrangThai = 0;
		}
		else
		{
			$TrangThai = 1;
		}
		$this->db->where("Id", $Id);
		$this->db->update($this->table, array("TrangThai" => $TrangThai));
		if($this->db->affected_rows() > 0) return $TrangThai;
		return FALSE;
	}
	
	
	function delete($Id)
	{
		$this->db->delete($this->table, array("Id" => $Id));
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}
	
	
	function GetTenSP($IdSanPham)
	{
		$query = $this->db->get_where('tbl_sanpham',array('Id' => $IdSanPham));
		return $query->row()->Ten_vi.'--'.$query->row()->Ten_en;
	}
}