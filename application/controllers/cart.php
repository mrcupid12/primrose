<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
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
	public function dathang()
	{
		$this->form_validation->set_rules('HoTen','','trim|min_length[5]|xss_clean');
		$this->form_validation->set_rules('SoDT','','trim|min_length[8]|xss_clean');
		$this->form_validation->set_rules('Email','','trim|valid_email|xss_clean');
		$this->form_validation->set_rules('DiaChi','','trim|min_length[5]|xss_clean');
		$this->form_validation->set_rules('captcha','','callback_captcha_check');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->data['dathang'] = $this->public_model->GetBaiViet(2);
		if ($this->form_validation->run() == FALSE) 
		{				
			$this->data['image'] = $this->captcha();	
			$this->load->view('include/header',$this->data);
			$this->load->view('cart/dathang',$this->data);
			$this->load->view('include/footer',TRUE);	
		}
		else
		{
			$this->load->model('dathang_model');
			$HoTen = $this->input->post('HoTen',TRUE);
			$SoDT = $this->input->post('SoDT',TRUE);
			$Email = $this->input->post('Email',TRUE);
			$DiaChi = $this->input->post('DiaChi',TRUE);
			$YeuCau = $this->input->post('YeuCau',TRUE);
			$Link = $this->input->post('Link',TRUE);
			$kq = $this->dathang_model->insert($HoTen,$DiaChi,$SoDT,$Email,$Link,$YeuCau);
			if($kq==1)
			{
				$this->data['thongbao'] = 'Đặt hàng thành công. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.';
			}
			else
			{
				 $this->data['thongbao'] = "Hệ thống bị lỗi. Vui lòng thử lại.";
			}
			$this->data['url'] = base_url();
			$this->load->view('include/alert',$this->data);		
		}
	}
	
	public function add()
	{		
			$id = $this->input->post('product_id');
			$qty = $this->input->post('quantity');
			$size = $this->input->post('size');
			if($this->cart_model->validate_add_cart_item($id,$qty,$size))
			{
				echo 1;
			}
			else
			{
				echo -1;
			}
	}
	public function viewcart()
	{
		$this->load->model('public_model');
		$this->load->view('cart/index');
	}
	
	public function delete()
	{
		$del = $this->input->post('id');
		if($this->cart_model->delete_item($del))
		{
			echo number_format($this->cart->total())." VNĐ";
		}
		else echo -1;
		
	}
	
	public function TongSP()
	{
		echo "(".count($this->cart->contents())." sp)";
	}
	
	
	public function update()
	{
		$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
	    $qty = $this->input->post('qty');
		if($this->cart_model->validate_update_cart($total,$item,$qty))
		{
			echo 1;
		}
		else echo -1;		
	}
	
	public function clear()
	{
		$this->cart->destroy();
		redirect(base_url());
	}
}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */