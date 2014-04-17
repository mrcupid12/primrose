<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_model extends CI_Model {
		
	function __construct()
	{
		parent::__construct();
	}
	public function GetMenu($lang)
	{
		$query =  $this->db->query('Select Id, Ten_'.$lang.' as Ten From tbl_loaisanpham Where TrangThai = 1');
		return $query->result();
	}
	public function GetTenLoai($Id,$lang)
	{
		$query =  $this->db->query('Select Id, Ten_'.$lang.' as Ten From tbl_loaisanpham Where Id = ? AND TrangThai = 1',array($Id));
		return $query->row()->Ten;
	}
	public function LoaiNoiBat($lang)
	{
		$query = $this->db->query('Select Id, Ten_'.$lang.' as Ten From tbl_loaisanpham Where NoiBat = 1 AND TrangThai = 1 order by ThuTu');
		return $query->result();
	}
	public function GetSanPhamNoiBat($IdLoai,$lang)
	{
		$query =  $this->db->query('Select Ten_'.$lang.' as TenSP, Id, Gia, HinhDaiDien From tbl_sanpham  Where NoiBat = 1 AND TrangThai = 1 AND IdLoai = ? order by ThuTu ',array($IdLoai));
		return $query->result();
	}
	public function GetSanPhamTheoLoai($IdLoai,$lang)
	{
		$query =  $this->db->query('Select Ten_'.$lang.' as TenSP, Id, Gia, HinhDaiDien From tbl_sanpham  Where TrangThai = 1 AND IdLoai = ? order by ThuTu ',array($IdLoai));
		return $query->result();
	}
	
	public function GetChiTietSP($ma,$lang)
	{
		$query =  $this->db->query('Select Ten_'.$lang.' as TenSP, Id, Gia, IdLoai, HinhDaiDien, TomTat_'.$lang.' as TomTat, MoTa_'.$lang.' as MoTa From tbl_sanpham  Where TrangThai = 1 AND Id = ? order by ThuTu ',array($ma));
		return $query->result();
	}
	public function GetHinh($ma)
	{
		$query = $this->db->get_where('tbl_hinhanh',array('IdSanPham' => $ma,'TrangThai' => 1));
		return $query->result();
	}
	public function GetSanPhamCungLoai($Id,$IdLoai,$lang)
	{
		$query =  $this->db->query('Select Ten_'.$lang.' as TenSP, Id, Gia, HinhDaiDien From tbl_sanpham  Where TrangThai = 1 AND IdLoai = ? AND Id <> ? order by ThuTu ',array($IdLoai,$Id));
		return $query->result();
	}
	/// ham su dung cho trang home -> bai viet ///
	public function GetBaiViet($Id,$lang)
	{
		$query =  $this->db->query('Select Ten_'.$lang.' as TieuDe, NoiDung_'.$lang.' as NoiDung From tbl_baiviet Where Id = ?',array($Id));
		return $query->row();
	}

	function cut($str, $len) {
	    $str = trim($str);
	    if (strlen($str) <= $len) return $str;
	    $str = substr($str, 0, $len);
	    if ($str != "") {
	        if (!substr_count($str, " ")) return $str." ...";
	        while (strlen($str) && ($str[strlen($str) - 1] != " ")) $str = substr($str, 0, -1);
	        $str = substr($str, 0, -1)." ...";
	    }
	    return $str;
	}

}