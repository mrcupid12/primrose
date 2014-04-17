<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class donhang_model extends CI_Model {
	
	var $table = 'tbl_donhang';
	
	function __construct()
	{
		parent::__construct();
	}
	function select()
	{
		$this->db->order_by('Id','desc');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	function insert($HoTen,$DiaChi,$SoDT,$Email,$GhiChu)
	{
		$TongTien = $this->cart->total();
		$TongSP = $this->cart->total_items();
		$data = array(
			"HoTen"	=>	$HoTen,
			"DiaChi"		=>	$DiaChi,
			"SoDT"		=>	$SoDT,
			"Email"		=>	$Email,
			"NgayDatHang"		=>	date('Y-m-d H:i:s'),
			"TongSP"		=>	$TongSP,
			"TongTien"		=>	$TongTien,
			"TrangThai"	=>	1 ,// 1 mới nhận, 2 Đang xử lý, 3 Đã xử lý, 4 Hủy
			"GhiChu" => $GhiChu
		);
		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		if($id > 0) 
		{
			$this->insertchitiet($id);
			return 1;
		}
		else
			return -1;
	}
	public function GetDonHang($Id)
	{
		$query = $this->db->query("SELECT * FROM tbl_donhang WHERE Id = ?", array($Id));
		return $query->row();
	}
	public function GetChiTietDonHang($Id)
	{
		$query = $this->db->query("SELECT a.*, a.Id as IdChiTiet, HinhDaiDien, Ten_vi FROM tbl_chitietdonhang as a, tbl_sanpham as b WHERE a.IdSanPham = b.Id AND IdDonHang  = ?", array($Id));
		return $query->result();
	}
	public function insertchitiet($id)
	{
		$cart = $this->cart->contents();
		foreach($cart as $item)
		{
			$data = array(
				"IdDonHang" => $id,
				"IdSanPham" => $item['id'],
				"Size" => $item['options']['size'],
				"SoLuong" => $item['qty'],
				"DonGia" => $item['price'],
				"ThanhTien" => $item['subtotal'],
			);
			$this->db->insert('tbl_chitietdonhang',$data);
		}
	}
	
	function TrangThai($Id,$TrangThai)
	{
		
		$this->db->where("Id", $Id);
		$this->db->update($this->table, array("TrangThai" => $TrangThai));
		$query = $this->db->query('Select Id From tbl_donhang Where Id = ? AND TrangThai = ?',array($Id,$TrangThai));
		if($query->num_rows() > 0 ) return FALSE;
		return TRUE;
	}
	
	function delete($Id)
	{
		$this->db->query("DELETE FROM tbl_chitietdonhang WHERE IdDonHang  = ?", array($Id));
		$this->db->query("DELETE FROM tbl_donhang WHERE Id  = ?", array($Id));
		$query = $this->db->query("SELECT Id  FROM tbl_donhang WHERE Id  = ?",array($Id));
		if($query->num_rows()>0) return FALSE; return TRUE;
	}
	
	function xoahang($Id)
	{
		$this->db->query("DELETE FROM tbl_chitietdonhang WHERE Id  = ?", array($Id));
		$query = $this->db->query("SELECT Id  FROM tbl_chitietdonhang WHERE Id  = ?",array($Id));
		if($query->num_rows()>0) return FALSE; return TRUE;
	}
	
	function checkExist($Id)
	{
		return $this->db->get_where('tbl_chitietdonhang',array('IdDonHang' => $Id))->num_rows();
	}
}