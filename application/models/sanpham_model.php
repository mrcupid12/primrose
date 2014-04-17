<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sanpham_model extends CI_Model {
	
	var $table = 'tbl_sanpham';
	
	function __construct()
	{
		parent::__construct();
	}
	function select()
	{
		$query = $this->db->query("SELECT B1.*, (SELECT B2.Ten_vi FROM tbl_loaisanpham B2 WHERE B1.IdLoai = B2.Id ) ten_loai FROM `".$this->table."` B1 ORDER BY `IdLoai` DESC ");
		return $query->result();
	}

	function edit($id)
	{
		echo $id;
		$query = $this->db->get_where($this->table,array('ID'=>$id));		
		return $query->result();
	}
	
	function insert($IdLoai,$HinhDaiDien,$Ten_en,$Ten_vi,$TomTat_en,$TomTat_vi,$MoTa_en,$MoTa_vi,$Gia,$ThuTu)
	{
		$data = array(
			"IdLoai" => $IdLoai,
			"HinhDaiDien" => $HinhDaiDien,
			"Ten_en"	=>	$Ten_en,
			"Ten_vi" => $Ten_vi,
			"TomTat_en" => $TomTat_en,
			"TomTat_vi" => $TomTat_vi,
			"MoTa_en" => $MoTa_en,
			"MoTa_vi" => $MoTa_vi,
			"Gia"		=>	$Gia,
			"NoiBat" => 0, // 1 có, 0 không
			"NgayTao" => date('Y-m-d H:i:s'),
			"ThuTu" => $ThuTu,
			"TrangThai" => 1 // 1 hiện,0 ẩn
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}
	
	function update($Id,$IdLoai,$HinhDaiDien,$Ten_en,$Ten_vi,$TomTat_en,$TomTat_vi,$MoTa_en,$MoTa_vi,$Gia,$ThuTu)
	{
		$data = array(
			"IdLoai" => $IdLoai,
			"HinhDaiDien" => $HinhDaiDien,
			"Ten_en"	=>	$Ten_en,
			"Ten_vi" => $Ten_vi,
			"TomTat_en" => $TomTat_en,
			"TomTat_vi" => $TomTat_vi,
			"MoTa_en" => $MoTa_en,
			"MoTa_vi" => $MoTa_vi,
			"Gia"		=>	$Gia,
			"NgayTao" => date('Y-m-d H:i:s'),
			"ThuTu" => $ThuTu
		);
		$this->db->where("Id", $Id);
		$this->db->update($this->table, $data);
		if($this->db->affected_rows() > 0) return TRUE;
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
	
	
	function checkExist($Id)
	{
		return $this->db->get_where('tbl_hinhanh',array('IdSanPham' => $Id))->num_rows();
	}
	
	function delete($Id)
	{
		$this->db->delete($this->table, array("Id" => $Id));
		$this->db->delete('tbl_hinhanh',array('IdSanPham'=>$Id));
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}
}