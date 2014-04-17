<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loaisanpham_model extends CI_Model {
	
	var $table = 'tbl_loaisanpham';
	
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
	function insert($Ten_en,$Ten_vi,$ThuTu)
	{
	//	if(strpos($HinhDaiDien,"/shopus/") !== false)
//		{
//			$HinhDaiDien = str_replace("/shopus/","",$HinhDaiDien); 
//		}
		$data = array(
			"Ten_en"	=>	$Ten_en,
			"Ten_vi" => $Ten_vi,
			"MaLoaiCha"		=>	0,
			"ThuTu"	=>	$ThuTu,
			"TrangThai" => 1
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}
	
	function update($Id, $Ten_en,$Ten_vi, $ThuTu)
	{
		$data = array(
			"Ten_en"	=>	$Ten_en,
			"Ten_vi"	=>	$Ten_vi,
			"ThuTu"	=>	$ThuTu
		);
		$this->db->where("Id", $Id);
		$this->db->update($this->table, $data);
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}
	function NoiBat($Id)
	{
		if($this->db->query("SELECT NoiBat FROM ".$this->table." WHERE Id = ?",array($Id))->row()->NoiBat == 1)
		{
			$NoiBat = 0;
		}
		else
		{
			$NoiBat = 1;
		}
		$this->db->where("Id", $Id);
		$this->db->update($this->table, array("NoiBat" => $NoiBat));
		if($this->db->affected_rows() > 0) return $NoiBat;
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
	
	function checkExist($Id)
	{
		$so_con = $this->db->get_where('tbl_loaisanpham',array('MaLoaiCha'=>$Id))->num_rows();
		$so_sp =  $this->db->get_where('tbl_sanpham',array('IdLoai' => $Id))->num_rows();
		return $so_con + $so_sp;
	}
}