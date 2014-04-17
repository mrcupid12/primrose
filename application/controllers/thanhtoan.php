<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class thanhtoan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('captcha');
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
	
	
	public function index()
	{
		$this->load->view('include/header',$this->data);
		$this->load->view('thanhtoan/index',TRUE);
		$this->load->view('include/footer',TRUE);		
	}
	
	public function xacnhan()
	{
		if(count($this->cart->contents()) == 0) echo redirect(base_url());
		$this->form_validation->set_rules('HoTen','','trim|min_length[5]|xss_clean');
		$this->form_validation->set_rules('SoDT','','trim|min_length[8]|xss_clean');
		$this->form_validation->set_rules('Email','','trim|valid_email|xss_clean');
		$this->form_validation->set_rules('DiaChi','','trim|min_length[5]|xss_clean');
		$this->form_validation->set_rules('captcha','','callback_captcha_check');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE) 
		{				
			$this->data['image'] = $this->captcha();	
			$this->load->view('include/header',$this->data);
			$this->load->view('thanhtoan/xacnhan',$this->data);
			$this->load->view('include/footer',TRUE);	
		}
		else
		{
			$this->load->model('donhang_model');
			$HoTen = $this->input->post('HoTen',TRUE);
			$SoDT = $this->input->post('SoDT',TRUE);
			$Email = $this->input->post('Email',TRUE);
			$DiaChi = $this->input->post('DiaChi',TRUE);
			$GhiChu = $this->input->post('GhiChu',TRUE);
			$kq = $this->donhang_model->insert($HoTen,$DiaChi,$SoDT,$Email,$GhiChu);
			if($kq==1)
			{
				$this->data['thongbao'] = 'Đặt hàng thành công. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.';
				$this->data['url'] = base_url().'thanhtoan/hoantat.html';
			}
			else
			{
				 $this->data['thongbao'] = "Hệ thống bị lỗi. Vui lòng thử lại.";
				$this->data['url'] = base_url().'thanhtoan/xacnhan.html';
			}
			$this->load->view('include/alert',$this->data);		
		}
	}
	
	public function hoantat()
	{
		$this->cart->destroy();
		echo redirect(base_url());
		
	}
	
	private function sendmail($arr, $type)
	{
			$query = $this->db->query("SELECT Security FROM tbl_account WHERE Email = ?", array($arr['email']));
			$mahoa = $query->row()->Security;
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_user'] = 'admin@tidichi.com';
			$config['smtp_pass'] = '123ABC@1363';
			$config['smtp_port'] = '465';
			$config['validate'] = 'TRUE';
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from('admin@tidichi.com', "tidichi.vn");
			$this->email->to($arr['email']);
			if($type=="activeaccount")
			{
				$this->email->subject('Kích hoạt tài khoản');
				$this->email->message('Vui lòng nhấp vào link sau để <a href="'.base_url("taikhoan/kichhoat.html?email=").$arr['email'].'&key='.$mahoa.'">kích hoạt tài khoản</a>');
			}
			elseif($type=="forgotpassword")
			{
				$this->email->subject('Cấp lại mật khẩu');
				$this->email->message('Email: '.$arr['email'].'. Mật khẩu mới của bạn là: '.$arr['password']);
			}
			else return FALSE;
			if(!$this->email->send())
			{
				return FALSE;
			}
			else return TRUE;
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
}