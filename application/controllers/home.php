<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->data['title_page'] = 'Home';       
		$this->load->library('captcha'); 
	}
	
	public function index()
	{
		$this->data['text'] = $this->public_model->GetBaiViet(2,$this->data['lang']);
		$this->data['result'] = $this->public_model->LoaiNoiBat($this->data['lang']);
		$this->load->view('include/header',$this->data);
		$this->load->view('home/index',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	public function gioithieu()
	{
		$this->data['result'] = $this->public_model->GetBaiViet(1,$this->data['lang']);
		$this->load->view('include/header',$this->data);
		$this->load->view('baiviet/index',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	public function huongdanthanhtoan()
	{
		$this->data['result'] = $this->public_model->GetBaiViet(3,$this->data['lang']);
		$this->load->view('include/header',$this->data);
		$this->load->view('baiviet/index',$this->data);
		$this->load->view('include/footer',$this->data);
	}
		public function chinhsach()
	{
		$this->data['result'] = $this->public_model->GetBaiViet(4,$this->data['lang']);
		$this->load->view('include/header',$this->data);
		$this->load->view('baiviet/index',$this->data);
		$this->load->view('include/footer',$this->data);
	}
		public function dieukhoan()
	{
		$this->data['result'] = $this->public_model->GetBaiViet(5,$this->data['lang']);
		$this->load->view('include/header',$this->data);
		$this->load->view('baiviet/index',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	public function captcha()
	{
		$expiration = time() - 300;
		$this->db->query("DELETE FROM bb_captchas WHERE captcha_time < ".$expiration);
		$vals = array (
			'img_path' => './statics/captcha/',
			'img_url' => base_url().'statics/captcha/',
			'font_path' => './statics/font/texb.ttf',
			'img_width' => '150',
			'img_height' => '27',
			'expiration' => '3600');
		$cap = $this->captcha->create_captcha($vals); 
		$data = array(
			'captcha_id' => '',
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']);
		$query = $this->db->insert_string('bb_captchas',$data);
		$this->db->query($query);		
		return $cap['image'];
	}
	
	public function lienhe()
	{
		
		$this->form_validation->set_rules('HoTen','','trim|xss_clean');
		$this->form_validation->set_rules('DienThoai','','trim|xss_clean');
		$this->form_validation->set_rules('Email','','trim|valid_email|xss_clean');
		$this->form_validation->set_rules('TieuDe','','trim|xss_clean');
		$this->form_validation->set_rules('NoiDung','','trim|xss_clean');
		$this->form_validation->set_rules('Captcha','','callback_captcha_check');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE) 
		{				
			$this->data['image'] = $this->captcha();	
			$this->load->view('include/header',$this->data);
			$this->load->view('baiviet/lienhe',$this->data);
			$this->load->view('include/footer',TRUE);	
		}
		else
		{
			$this->load->model('lienhe_model');
			$Name = $this->input->post('HoTen',TRUE);
			$Phone = $this->input->post('DienThoai',TRUE);
			$Email = $this->input->post('Email',TRUE);
			$TieuDe = $this->input->post('TieuDe',TRUE);
			$NoiDung = $this->input->post('NoiDung',TRUE);
			$kq = $this->lienhe_model->insert($Name,$Phone,$Email,$TieuDe,$NoiDung);
			if($kq==1)
			{
				$this->data['thongbao'] = lang('tbTC');
				$this->data['url'] = base_url();
			}
			else
			{
				 $this->data['thongbao'] = lang('tbTB');
				$this->data['url'] = base_url().'lien-he.html';
			}
			$this->load->view('include/alert',$this->data);		
		}
	}
	function captcha_check($captcha)
	{
		$exp = time() - 600;
		$sql = "SELECT COUNT(*) AS count FROM bb_captchas WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array ($this->input->post('captcha'), $this->input->ip_address(), $exp);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0)
		{
			$this->form_validation->set_message('captcha_check','Captcha is wrong!');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function setlang()
	{
		$flang='vi';
		$lang = $this->input->post("lang");
		/*$lang_arr=array("vi","en");	
		if (in_array($lang,$lang_arr) == true) $flang = $lang;*/
		if($lang =='en')
		 $flang='en';
		
		$_SESSION['lang']=$flang;
		echo $flang;
	}
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */