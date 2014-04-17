<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sanpham extends MY_Controller { 
	
	public function __construct()
	{
		parent::__construct();
		$this->data['title_page'] = 'Home';        
	}
	
	public function loaisanpham($id)
	{				
		$this->data['TenLoai'] = $this->public_model->GetTenLoai($id, $this->data['lang']);
		$this->data['result'] = $this->public_model->GetSanPhamTheoLoai($id, $this->data['lang']);
		$this->load->view('include/header',$this->data);
		$this->load->view('sanpham/loaisanpham',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	
	public function chitiet($url)
	{
		$arr = explode('-',$url);
		$ma = current($arr);
		$this->data['result'] = $this->public_model->GetChiTietSP($ma,$this->data['lang']);
		if(count($this->data['result']) == 0 ) echo redirect(base_url());
		$this->data['SPCungLoai'] = $this->public_model->GetSanPhamCungLoai($ma,$this->data['result'][0]->IdLoai,$this->data['lang']);
		$this->data['Hinh'] = $this->public_model->GetHinh($ma);
		$this->load->view('include/header',$this->data);
		$this->load->view('sanpham/chitiet',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */