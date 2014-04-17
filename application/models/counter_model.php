<?php

class counter_model  extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    var $ma;
    var $trinh_duyet;
    var $ip;
    var $thoi_gian;
    var $link;
	function danh_sach($vi_tri, $so_luong)
	{
		$vi_tri = intval($vi_tri);
		$so_luong = intval($so_luong);
		$sql = "select * from bo_dem limit $vi_tri, $so_luong";
		return $this->db->query($sql)->result_array();
	}
	
	function so_luong()
	{
		$sql = "select count(*) as number from bo_dem";
		  $arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}

	function so_luong_theo_ngay($ngay)
	{		
		$sql = "select count(*) as number from bo_dem where '$ngay 0:0:0' <= thoi_gian and thoi_gian <= '$ngay 23:59:59'";
		  $arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}
	
	function blog_theo_ngay($ngay)
	{		
		$sql = "select count(*) as number from tbl_blog where '$ngay 0:0:0' <= NgayTao and NgayTao <= '$ngay 23:59:59'";
		  $arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}
		
	function so_luong_hom_nay()
	{
		$from = date('Y-m-d 0:0:0');
		$to = date('Y-m-d 23:59:59');
		
		$sql = "select count(*) as number from bo_dem where '$from' <= thoi_gian and thoi_gian <= '$to'";
        $arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}

	function so_luong_hom_qua()
	{		
		$from = date('Y-m-d 0:0:0', strtotime('-1 days'));
		$to = date('Y-m-d 23:59:59', strtotime('-1 days'));
		
		$sql = "select count(*) as number from bo_dem where '$from' <= thoi_gian and thoi_gian <= '$to'";
     	$arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}

	function so_luong_tuan_nay()	
	{		
		$x = date('N') - 1;						 
		$from = date('Y-m-d 0:0:0', strtotime("-$x days"));
		
		$to = date('Y-m-d 23:59:59');
		
		$sql = "select count(*) as number from bo_dem where '$from' <= thoi_gian and thoi_gian <= '$to'";
			$arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}
	function so_luong_tuan_truoc()	
	{		
		$x = (date('N') - 1)*2;						 
		$from = date('Y-m-d 0:0:0', strtotime("-$x days"));
		
		$to = date('Y-m-d 23:59:59');
		
		$sql = "select count(*) as number from bo_dem where '$from' <= thoi_gian and thoi_gian <= '$to'";
			$arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}

	function so_luong_thang_nay()	
	{					 
		$from = date('Y-m-1 0:0:0');		
		$to = date('Y-m-d 23:59:59');
		
		$sql = "select count(*) as number from bo_dem where '$from' <= thoi_gian and thoi_gian <= '$to'";
		$arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}
	function so_luong_thang_truoc()	
	{					 
		$from = date('Y-m-d 0:0:0',strtotime("-30 days"));		
		$to = date('Y-m-d 23:59:59',strtotime("-30 days"));
		
		$sql = "select count(*) as number from bo_dem where '$from' <= thoi_gian and thoi_gian <= '$to'";
		$arr= current($this->db->query($sql)->result_array());
		return $arr['number'];
	}
	
		
	function xem($ma)
	{
		$ma = intval($ma);

		$sql = "select * from bo_dem where ma = '$ma'";
		return current($this->db->query($sql)->result_array());
	}
	function xoa($ma)
	{
		$ma = intval($ma);

		$sql = "delete from bo_dem where ma = '$ma'";
		
        return $this->db->query($sql);
	}
	function them($trinh_duyet, $ip, $thoi_gian, $link)
	{
		$trinh_duyet = addslashes($trinh_duyet);
		$ip = addslashes($ip);
		$link = addslashes($link);

		$sql = "INSERT INTO bo_dem(trinh_duyet,ip,thoi_gian,link) VALUES ('$trinh_duyet','$ip','$thoi_gian','$link')";
		return $this->db->query($sql);
	}
	function cap_nhat($ma, $trinh_duyet, $ip, $thoi_gian, $link)
	{
		$ma = intval($ma);
		$trinh_duyet = addslashes($trinh_duyet);
		$ip = addslashes($ip);
		$link = addslashes($link);

		$sql ="UPDATE bo_dem SET trinh_duyet= '$trinh_duyet', ip= '$ip', thoi_gian= '$thoi_gian', link= '$link' WHERE ma = '$ma'";
			return $this->db->query($sql)->result();
	}
   
 }