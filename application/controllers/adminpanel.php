<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminpanel extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->data['Username'] = $this->admin->getLoginUsername();  
		$this->data['Name'] = $this->admin->GetName();      
		$this->data['loi'] = "";
		$this->data['page'] = '';        
	}
	
	public function loadeditor($id, $toolbar, $width, $height)
	{
		if($toolbar=='Normal')
		{
			$toolbar = "
    [
        { name: 'document', items: ['NewPage', 'Preview'] },
		{ name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
		{ name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
		{ name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
		{ name: 'tools', items: ['Maximize'] },
		{ name: 'insert', items: ['Image', 'Flash', 'Youtube'] },
		{ name: 'tools', items: ['Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'] },
                '/',
		{ name: 'styles', items: ['Styles', 'Format'] },
		{ name: 'basicstyles', items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat'] },
		{ name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] }
    ]";
		}
        $this->load->helper('ckeditor');
		return array(
			'id' 	=> 	$id,
			'path'	=>	'ckeditor',
			'config' => array(
				'toolbar' 	=> 	$toolbar,
				'width' 	=> 	$width,
				'height' 	=> 	$height, 
			),
			'styles' => array(
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);		
	}
	public function error($trang='pagemissing')
	{
	   $chk = $this->admin->checkLogin();
		if($chk==1||$chk==2)
		{			
			$this->data['title_page'] = 'Lỗi';
			$this->data['class_body'] = '';
			$this->data['class_topheader'] = "orangeborderbottom5";
			$this->load->view('adminpanel/include/header',$this->data);
			switch($trang)
			{
				case 'pagemissing':
				$this->load->view('adminpanel/error/error404');break;
				case 'update':
				$this->load->view('adminpanel/error/errorupdate');break;
				case 'delete':
				$this->load->view('adminpanel/error/errordelete');break;
				case 'insert':
				$this->load->view('adminpanel/error/errorinsert');break;
				default:$this->load->view('adminpanel/error/error404');break;
			}
			$this->load->view('adminpanel/include/footer');
		}
		else return redirect(base_url('adminpanel/home.html'));
	}
	
	public function index()
	{		
		$chk = $this->admin->checkLogin();
		if($chk==1||$chk==2)
		{
				return redirect(base_url('adminpanel/home.html'));
		}
		if(isset($_POST['username'])&&($_POST['username']!=NULL)&&isset($_POST['password'])&&($_POST['password']!=NULL))
		{
			$remember = FALSE;
			if(isset($_POST['remember'])&&($_POST['remember']==1)) $remember = TRUE;
			$arr = array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));
			$tmp = $this->admin->login($arr, $remember);
			if($tmp==1)
			{
					return redirect(base_url('adminpanel/home.html')); 
			}
			else
			{
				switch($tmp)
				{
					case -3 : $loi = 'Username hoặc Password không đúng'; break;
					case -7 : $loi = 'Tình trạng tài khoản không hoạt động'; break;
					case -4 : $loi = 'Bạn không có quyền truy cập vào trang này'; break;
					case -6 : $loi = 'Username hoặc Password không đúng'; break;
					default: $loi = ''; break;
				}
				$this->data['loi'] = 	$loi;
				$this->load->view('adminpanel/index',$this->data);
			}
		}
		else $this->load->view("adminpanel/index",$this->data);
	}
	
	public function logout()
	{
		$this->admin->logout();
		return redirect('adminpanel/index');
	}
	public function home()
	{
		$check = $this->admin->checkLogin();
		if($check == 1 || $check == 2 )
		{
			$role = $this->admin->getLoginRole($this->admin->getLoginUsername());
			if($role!=77&&$role!=99) return redirect(base_url());
			$this->load->model(array('counter_model'));
			$this->data['hom_nay'] = $this->counter_model->so_luong_hom_nay();
			$this->data['hom_qua'] = $this->counter_model->so_luong_hom_qua();
			$this->data['tuan_nay'] = $this->counter_model->so_luong_tuan_nay();
			$this->data['thang_nay'] = $this->counter_model->so_luong_thang_nay();
			//$this->data['result'] = $this->donhang_model->getTopnew();
			$this->load->view('adminpanel/include/header',$this->data);
			$this->load->view('adminpanel/include/headermenu');
			$this->load->view('adminpanel/include/menuleft');
			$this->load->view('adminpanel/home/dashboard');
			$this->load->view('adminpanel/home/index',$this->data);
			$this->load->view('adminpanel/include/footer');
		}
		else
			return redirect(base_url('adminpanel/index.html'));
	}
    
	public function baiviet()
      {
          $check = $this->admin->checkLogin();
          if($check == 1 || $check == 2 )
  		 {
			$arr['username'] = $this->data['Username'];
			$checkpage = $this->admin->checkPage($arr,'Setting');
			if($checkpage != 1 || $checkpage != TRUE) redirect(base_url('adminpanel'));
  			$this->load->model('baiviet_model');
  			$this->form_validation->set_rules('Id','Id','trim|required|alpha_numeric|xss_clean');
            $this->form_validation->set_rules('Ten_en','Ten_en','trim|required|max_length[50000]|xss_clean');            
  			$this->form_validation->set_rules('NoiDung_en','NoiDung_en','trim|max_length[50000]');
  			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');			
  			$Id = $this->input->get('id');
  			if ($this->form_validation->run() == FALSE)
  			{				
				switch($Id)
				{
					case 1 : 
						$this->data['title_page'] = 'Quản lý nội dung trang Giới thiệu';break;
					case 2 :
						$this->data['title_page'] = 'Quản lý nội dung trên trang chủ';break;
					case 3 :
						$this->data['title_page'] = 'Quản lý nội dung trang Hướng dẫn mua hàng';break;
					case 4 :
						$this->data['title_page'] = 'Quản lý nội dung trang chính sách';break;
					case 5 :
						$this->data['title_page'] = 'Quản lý nội dung trang điều khoản';break;
					default:break;
						
				}
				$this->data['page'] = $Id;
				$this->load->view('adminpanel/include/header',$this->data);
				$this->load->view('adminpanel/include/headermenu');
				$this->load->view('adminpanel/include/menuleft',$this->data);				
  				$this->data['result'] = $this->baiviet_model->edit($Id);
				$this->data['editor_en'] = $this->loadeditor('NoiDung_en','Full','95%','500px');
				$this->data['editor_vi'] = $this->loadeditor('NoiDung_vi','Full','95%','500px');
  				switch ($Id)
  				{
  					case 1:
					{
  						$this->data["title"] = "CẬP NHẬT NỘI DUNG TRANG GIỚI THIỆU";
						$this->load->view('adminpanel/baiviet/baiviet1',$this->data);
					}; break;
					case 2:
					{
  						$this->data["title"] = "CẬP NHẬT NỘI DUNG TRANG CHỦ";			
						$this->load->view('adminpanel/baiviet/baiviet2',$this->data);
					}; break;
					case 3:
					{
  						$this->data["title"] = "CẬP NHẬT NỘI DUNG TRANG HƯỚNG DẪN MUA HÀNG ";
						$this->load->view('adminpanel/baiviet/baiviet1',$this->data);
					}; break;
					case 4:
					{
  						$this->data["title"] = "CẬP NHẬT NỘI DUNG TRANG CHÍNH SÁCH";				
						$this->load->view('adminpanel/baiviet/baiviet1',$this->data);
					}; break;
					case 5:
					{
  						$this->data["title"] = "CẬP NHẬT NỘI DUNG TRANG ĐIỀU KHOẢN";				
						$this->load->view('adminpanel/baiviet/baiviet1',$this->data);
					}; break;
  					default:
  						return redirect(base_url('adminpanel/home.html'));
  						break;
  				}
  				$this->load->view('adminpanel/include/footer');
  			}
  			else
  			{
  				$Id = $this->input->post('Id',TRUE); settype($Id,'int');
				$Ten_en = $this->input->post('Ten_en',TRUE);
  				$NoiDung_en = $this->input->post('NoiDung_en',FALSE);
				$Ten_vi = $this->input->post('Ten_vi',TRUE);
  				$NoiDung_vi = $this->input->post('NoiDung_vi',FALSE);
  				$tmp = $this->baiviet_model->update($Id,$Ten_en,$Ten_vi,$NoiDung_en,$NoiDung_vi);
  				if($tmp) echo redirect(base_url('adminpanel/baiviet.html?status=success&id='.$Id));
  				else echo redirect(base_url('adminpanel/error/update.html'));
  			}
          }
          else
  			return redirect(base_url('adminpanel/index.html'));
          
      }
	  
      
	  
      public function quanlyloaisanpham($chucnang="view")
	  {
		  	$chk = $this->admin->checkLogin();
			if(($chk==1)||$chk==2)
			{
				$arr['username'] = $this->data['Username'];
				$this->data['title_page'] = 'Quản lý loại sản phẩm'; 				
				$this->data['page'] = 'quanlyloaisanpham';
				$this->load->model('loaisanpham_model');
				if($chucnang=="view")
				{
					$this->data['title'] = 'QUẢN LÝ LOẠI SẢN PHẨM';
					$this->data['title_header'] = 'Danh sách loại sản phẩm';
					$this->data['result'] = $this->loaisanpham_model->select();
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');
					$this->load->view('adminpanel/include/menuleft',$this->data);
					$this->load->view('adminpanel/category/index',$this->data);
					$this->load->view('adminpanel/include/footer');
				}
				elseif($chucnang=="insert")
				{				
					$this->form_validation->set_rules('Ten_en','','trim|required|max_length[255]|xss_clean');
					$this->form_validation->set_rules('Ten_vi','','trim|required|max_length[255]|xss_clean');
					$this->form_validation->set_rules('ThuTu','','trim|alpha_numeric|xss_clean');
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('adminpanel/include/header',$this->data);
						$this->load->view('adminpanel/include/headermenu');
						$this->load->view('adminpanel/include/menuleft',$this->data);
						$this->load->view('adminpanel/category/index',$this->data);
						$this->load->view('adminpanel/include/footer');
					}
					else
					{
						$Ten_en = $this->input->post('Ten_en',TRUE);						
						$Ten_vi = $this->input->post('Ten_vi',TRUE);
						$ThuTu = $this->input->post('ThuTu',TRUE); settype($ThuTu, "int");
						$tmp = $this->loaisanpham_model->insert( $Ten_en,$Ten_vi,$ThuTu);
						if($tmp) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html'));
						else echo redirect(base_url('adminpanel/error/insert.html'));
					}
				}
				elseif($chucnang=="edit")
				{
					$this->form_validation->set_rules('Ten_en','','trim|required|max_length[255]|xss_clean');
					$this->form_validation->set_rules('Ten_vi','','trim|required|max_length[255]|xss_clean');
					$this->form_validation->set_rules('ThuTu','','trim|alpha_numeric|xss_clean');
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
					if ($this->form_validation->run() == FALSE)
					{
						$id = 0;
						$Idg = $this->input->get("id");
						if(is_numeric($Idg)) $id = $Idg;
						if($id==0) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html'));
						else
						{
							$this->data["title"] = "CẬP NHẬT LOẠI SẢN PHẨM";
							$this->data['result'] = $this->loaisanpham_model->edit($id);
							$this->load->view('adminpanel/include/header',$this->data);
							$this->load->view('adminpanel/include/headermenu');
							$this->load->view('adminpanel/include/menuleft',$this->data);
							$this->load->view("adminpanel/category/edit",$this->data);
							$this->load->view('adminpanel/include/footer');
						}
					}
					else
					{
						$Id = $this->input->post('Id',TRUE); settype($id,"int");
						$Ten_en = $this->input->post('Ten_en',TRUE);						
						$Ten_vi = $this->input->post('Ten_vi',TRUE);
						$ThuTu = $this->input->post("ThuTu",TRUE); settype($ThuTu, "int");
						$tmp = $this->loaisanpham_model->update($Id, $Ten_en,$Ten_vi, $ThuTu);
						if($tmp) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html'));
						else echo redirect(base_url('adminpanel/error/edit.html'));
					}
				}
				elseif($chucnang=="noibat")
				{
					 $Id = $this->input->post("id", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->loaisanpham_model->NoiBat($Id);
						 if($tmp==0) echo 0;
						 else echo 1;
					 }
					 else
					 {
						 echo "";
					 }
					
				}	
				elseif($chucnang=="trangthai")
				{
					 $Id = $this->input->post("id", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->loaisanpham_model->status($Id);
						 if($tmp==0) echo base_url('statics/images/admin/cancel.png');
						 else echo base_url('statics/images/admin/check.png');
					 }
					 else
					 {
						 echo "";
					 }
					
				}				
				elseif($chucnang=="delete")
				{
					$Id = $this->input->post("id", TRUE);
					if(is_numeric($Id)) settype($Id,"int");
					else echo -1;
					$tmp = $this->loaisanpham_model->delete($Id);
					if($tmp) echo 1;
					else echo -1;
				}
				elseif($chucnang=="deleteall")
				{
					$arr = $this->input->post('id'); 
					for($i=0;$i < count($arr); $i++)
					{						
						if(!$this->loaisanpham_model->delete($arr[$i])) echo -1;
					}
					echo 1;
				}
			} else echo redirect(base_url('adminpanel.html'));
	  }
	  
	   public function quanlysanpham($chucnang="view")
	  {
		  	$chk = $this->admin->checkLogin();
			if(($chk==1)||$chk==2)
			{
				$arr['username'] = $this->data['Username'];
				$this->data['title_page'] = 'Quản lý sản phẩm'; 				
				$this->data['page'] = 'quanlysanpham';
				$this->load->model(array('sanpham_model','loaisanpham_model'));
				$this->data['loai_san_pham'] = $this->loaisanpham_model->select();
				$this->data['validate'] ='';
				$this->data['editor_en'] = $this->loadeditor('NoiDung_en','Full','95%','200px');
				$this->data['editor_vi'] = $this->loadeditor('NoiDung_vi','Full','95%','200px');
				if($chucnang=="view")
				{
					$this->data['title'] = 'QUẢN LÝ SẢN PHẨM';
					$this->data['title_header'] = 'Danh sách  sản phẩm';
					$this->data['result'] = $this->sanpham_model->select();
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');
					$this->load->view('adminpanel/include/menuleft',$this->data);
					$this->load->view('adminpanel/sanpham/index',$this->data);
					$this->load->view('adminpanel/include/footer');
				}
				elseif($chucnang=="insert")
				{				
					$this->form_validation->set_rules('Ten_en','','trim|required|max_length[255]|xss_clean');
					$this->form_validation->set_rules('ThuTu','','trim|alpha_numeric|xss_clean');
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
					if ($this->form_validation->run() == FALSE)
					{
						$this->data['validate'] ='loi';
						$this->load->view('adminpanel/include/header',$this->data);
						$this->load->view('adminpanel/include/headermenu');
						$this->load->view('adminpanel/include/menuleft',$this->data);
						$this->load->view('adminpanel/sanpham/index',$this->data);
						$this->load->view('adminpanel/include/footer');
					}
					else
					{
						$HinhDaiDien = $this->input->post('HinhDaiDien',TRUE);
						$Ten_en = $this->input->post('Ten_en',TRUE);
						$MoTa_en = $this->input->post('MoTa_en',FALSE);
						$Ten_vi = $this->input->post('Ten_vi',TRUE);
						$MoTa_vi = $this->input->post('MoTa_vi',TRUE);
						$TomTat_en = $this->input->post('TomTat_en',TRUE);
						$TomTat_vi = $this->input->post('TomTat_vi',TRUE);
						$IdLoai = $this->input->post('MaLoaiCha',TRUE);
						$Gia = $this->input->post('Gia',TRUE);
						$ThuTu = $this->input->post('ThuTu',TRUE); settype($ThuTu, "int");
						$tmp = $this->sanpham_model->insert($IdLoai,$HinhDaiDien,$Ten_en,$Ten_vi,$TomTat_en,$TomTat_vi,$MoTa_en,$MoTa_vi,$Gia,$ThuTu);
						if($tmp) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html'));
						else echo redirect(base_url('adminpanel/error/insert.html'));
					}
				}
				elseif($chucnang=="edit")
				{
					$this->form_validation->set_rules('Ten_en','','trim|required|max_length[255]|xss_clean');
					$this->form_validation->set_rules('ThuTu','','trim|alpha_numeric|xss_clean');
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
					if ($this->form_validation->run() == FALSE)
					{
						$id = 0;
						$Idg = $this->input->get("id");
						if(is_numeric($Idg)) $id = $Idg;
						if($id < 0) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html'));
						else
						{
							$this->data["title"] = "CẬP NHẬT SẢN PHẨM";
							$this->data['result'] = $this->sanpham_model->edit($id);
							$this->load->view('adminpanel/include/header',$this->data);
							$this->load->view('adminpanel/include/headermenu');
							$this->load->view('adminpanel/include/menuleft',$this->data);
							$this->load->view("adminpanel/sanpham/edit",$this->data);
							$this->load->view('adminpanel/include/footer');
						}
					}
					else
					{
						$Id = $this->input->post('Id',TRUE); settype($id,"int");
						$HinhDaiDien = $this->input->post('HinhDaiDien',TRUE);
						$Ten_en = $this->input->post('Ten_en',TRUE);
						$MoTa_en = $this->input->post('MoTa_en',FALSE);
						$Ten_vi = $this->input->post('Ten_vi',TRUE);
						$MoTa_vi = $this->input->post('MoTa_vi',TRUE);
						$TomTat_en = $this->input->post('TomTat_en',TRUE);
						$TomTat_vi = $this->input->post('TomTat_vi',TRUE);
						$IdLoai = $this->input->post('MaLoaiCha',TRUE);
						$Gia = $this->input->post('Gia',TRUE);		
						$ThuTu = $this->input->post("ThuTu",TRUE); settype($ThuTu, "int");
						$tmp = $this->sanpham_model->update($Id,$IdLoai,$HinhDaiDien,$Ten_en,$Ten_vi,$TomTat_en,$TomTat_vi,$MoTa_en,$MoTa_vi,$Gia,$ThuTu);
						if($tmp) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html'));
						else echo redirect(base_url('adminpanel/error/edit.html'));
					}
				}
				elseif($chucnang=="trangthai")
				{
					 $Id = $this->input->post("id", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->sanpham_model->status($Id);
						 if($tmp==0) echo base_url('statics/images/admin/cancel.png');
						 else echo base_url('statics/images/admin/check.png');
					 }
					 else
					 {
						 echo "";
					 }
					
				}
				elseif($chucnang=="noibat")
				{
					 $Id = $this->input->post("id", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->sanpham_model->NoiBat($Id);
						 if($tmp==0) echo 0;
						 else echo 1;
					 }
					 else
					 {
						 echo "";
					 }
					
				}		
				elseif($chucnang=="delete")
				{
					$Id = $this->input->post("id", TRUE);
					if(is_numeric($Id)) settype($Id,"int");
					else echo -1;
					$tmp = $this->sanpham_model->delete($Id);
					if($tmp) echo 1;
					else echo -1;
				}
				elseif($chucnang=="deleteall")
				{
					$arr = $this->input->post('id'); 
					for($i=0;$i < count($arr); $i++)
					{						
						if(!$this->sanpham_model->delete($arr[$i])) echo -1;
					}
					echo 1;
				}
			} else echo redirect(base_url('adminpanel.html'));
	  }
	  
	   public function quanlyhinhanh($chucnang="view")
	  {
		  	$chk = $this->admin->checkLogin();
			if(($chk==1)||$chk==2)
			{
				$arr['username'] = $this->data['Username'];
				$this->data['title_page'] = 'Quản lý Hình ảnh'; 				
				$this->data['page'] = 'quanlyhinhanh';
				$this->load->model(array('image_model'));						
				$this->data['IdSanPham']  = $this->input->get('IdSanPham',TRUE);
				$this->data['validate'] ='';
				if($chucnang=="view")
				{							
					$this->data['title'] = 'QUẢN LÝ HÌNH ẢNH SP';
					$this->data['TenSP']  = $this->image_model->GetTenSP($this->data['IdSanPham']);
					$this->data['title_header'] = 'Danh sách hình ảnh SP';	
					$this->data['result'] = $this->image_model->select($this->data['IdSanPham']);
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');
					$this->load->view('adminpanel/include/menuleft',$this->data);					
					$this->load->view('adminpanel/image/index',$this->data);
					$this->load->view("adminpanel/include/footer");
				}
				elseif($chucnang=="insert")
				{
					$this->form_validation->set_rules('UrlHinh','','trim|max_length[255]|xss_clean');	
					$this->form_validation->set_rules('IdSanPham','','trim|alpha_numeric|xss_clean');
					$this->form_validation->set_rules('ThuTu','','trim|alpha_numeric|xss_clean');
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
					if ($this->form_validation->run() == FALSE)
					{
						$this->data['title'] = 'QUẢN LÝ HÌNH ẢNH SP';						
						$this->data['TenSP']  = $this->image_model->GetTenSP($this->data['IdSanPham']);
						$this->data['title_header'] = 'Danh sách hình ảnh SP';	
						$this->data['result'] = $this->image_model->select($this->data['IdSanPham']);
						$this->load->view('adminpanel/include/header',$this->data);
						$this->load->view('adminpanel/include/headermenu');
						$this->load->view('adminpanel/include/menuleft',$this->data);					
						$this->load->view('adminpanel/image/index',$this->data);
						$this->load->view("adminpanel/include/footer");
					}
					else
					{
						$IdSanPham = $this->input->post('IdSanPham',TRUE); settype($IdSanPham, "int");
						$UrlHinh = $this->input->post('UrlHinh',TRUE);
						$ThuTu = $this->input->post('ThuTu',TRUE); settype($ThuTu, "int");
						$tmp = $this->image_model->insert($IdSanPham,$UrlHinh,$ThuTu);
						if($tmp > 0) echo redirect(base_url('adminpanel/'.$this->data['page'].'.html?IdSanPham='.$IdSanPham));
						else echo redirect(base_url('adminpanel/error/insert.html'));
					}
				}
				elseif($chucnang=="insertmoi")
				{
					$IdGame = $this->input->post('IdGame',TRUE); settype($IdGame, "int");
					$UrlHinh = $this->input->post('UrlHinh',TRUE); 
					$ThuTu = $this->input->post('ThuTu',TRUE); settype($ThuTu, "int");
					$tmp = $this->image_model->insert($IdGame,$UrlHinh,$ThuTu);
					if($tmp > 0) echo 1;
					else echo -1;
				}
				elseif($chucnang=="trangthai")
				{
					 $Id = $this->input->post("id", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->image_model->status($Id);
						 if($tmp==0) echo base_url('statics/images/admin/cancel.png');
						 else echo base_url('statics/images/admin/check.png');
					 }
					 else
					 {
						 echo "";
					 }					
				}		
				elseif($chucnang=="delete")
				{
					$Id = $this->input->post("id", TRUE);
					if(is_numeric($Id))
					{
						 settype($Id,"int");
						 $tmp = $this->image_model->delete($Id);
						 if($tmp) echo 1;
						 else echo -1;
					}
					else echo -1;
				}
			} else echo redirect(base_url('adminpanel.html'));
	  }	  
	  
	public function quanlyuser($chucnang='view')
	{
		$chk = $this->admin->checkLogin();
		if(($chk==1)||$chk==2)
		{
			$arr['username'] = $this->data['Username'];
			$checkpage = $this->admin->checkPage($arr,'NguoiDung');
			if($checkpage != 1 || $checkpage != TRUE) redirect(base_url('adminpanel'));			
			$this->data['title_page'] = 'Quản lý User';
			if($chucnang=="view")
			{				
				$this->data['page'] = 'quanlyuser';
				$this->data['title'] = 'QUẢN LÝ TÀI KHOẢN';
				$this->data['title_header'] = 'Danh sách User';
				$this->data['result'] = $this->admin->getAdminGrid();
				$this->load->view('adminpanel/include/header',$this->data);
				$this->load->view('adminpanel/include/headermenu');
				$this->load->view('adminpanel/user/menuleft',$this->data);					
				$this->load->view('adminpanel/user/index',$this->data);
				$this->load->view("adminpanel/include/footer");
			}
			elseif($chucnang=="insert")
			{
				$this->form_validation->set_rules('Username','','trim|required|min_length[5]|max_length[32]|xss_clean');
				$this->form_validation->set_rules('FullName','','trim|min_length[5]|max_length[255]|xss_clean');
				$this->form_validation->set_rules('Password','','trim|required|xss_clean');
				$this->form_validation->set_rules('RePassword','','trim|required|xss_clean|matches[Password]');
				$this->form_validation->set_rules('Type','','trim|alpha_numeric|xss_clean');										
				$this->form_validation->set_error_delimiters('<lable class="error">', '</lable>');
				if ($this->form_validation->run() == FALSE)
				{
					$this->data['title'] = 'THÊM TÀI KHOẢN QUẢN TRỊ';
					$this->data['page'] = 'themuser';
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');
					$this->load->view('adminpanel/user/menuleft',$this->data);					
					$this->load->view('adminpanel/user/insert',$this->data);
					$this->load->view("adminpanel/include/footer");
				}
				else
				{
					$FullName = $this->input->post('FullName',TRUE);
					$Username = $this->input->post('Username',TRUE);
					$Password = $this->input->post('Password',TRUE);
					$Type = $this->input->post('Type',TRUE);
					if($Type==1) 
						$Type=99; 
					else 
						$Type=88;
					if($this->admin->create(array('username'=>$Username,'password'=>$Password,'fullname'=>$FullName), $Type))
						return redirect(base_url('adminpanel/quanlyuser.html'));
					else return redirect(base_url('adminpanel/error/insert.html'));
				}
			}
			elseif($chucnang=="changestatus")
			{
				$arr['username'] = $this->input->get('un',TRUE);
				if($this->admin->checkUsername($arr))
				{
					$arr['status'] = $this->admin->checkStatus($arr);
					$tmp = $this->admin->changeStatus($arr);
					if($tmp==1) echo redirect(base_url('adminpanel/quanlyuser/view.html'));
					else echo redirect(base_url('adminpanel/error/edit.html'));
				}
			}
			elseif($chucnang=="delete")
			{
				$user = $this->input->post("id", TRUE);
				$tmp = $this->admin->deleteuser($user);
				if($tmp) echo 1;
				else echo -1;
			}
			else echo redirect(base_url('adminpanel.html'));
		}
		else echo redirect(base_url('adminpanel.html'));
	}
	
	public function edituser($page='info')
	{
		$chk = $this->admin->checkLogin();		
		if($chk==1 || $chk==2)
		{
			if($chk==1) $arr['username'] = $this->session->userdata('un',TRUE);
			else $arr['username'] = $this->input->cookie('un',TRUE);
			if ($page=="info")
			{
				if(!isset($_POST['btn_SubInfo']))
				{
					$this->data['validate'] ='';
					$this->data['title'] = 'CẬP NHẬT TÀI KHOẢN';
					$this->data['username'] = $arr['username'];
					$this->data['User'] = $this->db->query('Select * From tbl_admin Where Username = ?',array($arr['username']))->result();
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');	
					$this->load->view('adminpanel/user/changeuser',$this->data);
					$this->load->view("adminpanel/include/footer");
				}
				else
				{
					$arr['fullname'] = $this->input->post("FullName",TRUE);
					$arr['link'] = $this->input->post('Link',TRUE);
					$tmp = $this->admin->updateInfo($arr);
					if($tmp==1)
					{
						if($role!=88)
						{
							return redirect(base_url('adminpanel.html'));
						}
						else
						{
							return redirect(base_url('writearticle.html'));
						}
					}
					else
					{
						return redirect(base_url('adminpanel/edituser.html?success=false'));
					}
				}
			}
			elseif($page=='updatepass')
			{
				if(isset($_POST['btn_SubPass']))
				{
					$arr['password'] = $this->input->post("pass",TRUE);
					$arr['newpassword'] = $this->input->post("newpass",TRUE);
					$tmp = $this->admin->updatePassword($arr);
					if($tmp==1)
					{
						if($role!=88)
						{
							return redirect(base_url('adminpanel.html'));
						}
						else
						{
							return redirect(base_url('writearticle.html'));
						}
					}
					else
					{
						return redirect(base_url('adminpanel/edituser.html?success=false'));
					}
				}
				else
				{
					if($role!=88)
						{
							return redirect(base_url('adminpanel.html'));
						}
						else
						{
							return redirect(base_url('writearticle.html'));
						}
				}
			}
		}
		else echo "Bạn không có quyền truy cập trang này";
	}	
	
	public function quanlydonhang($chucnang="view")
	{
		  	$chk = $this->admin->checkLogin();
			if(($chk==1)||$chk==2)
			{
				$arr['username'] = $this->data['Username'];
				$this->data['title_page'] = 'Quản lý đơn hàng'; 				
				$this->data['page'] = 'quanlydonhang';
				$this->load->model('donhang_model');
				if($chucnang=="view")
				{
					$this->data['title'] = 'QUẢN LÝ ĐƠN HÀNG';
					$this->data['title_header'] = 'Danh sách đơn hàng';
					$this->data['result'] = $this->donhang_model->select();
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');
					$this->load->view('adminpanel/include/menuleft',$this->data);
					$this->load->view('adminpanel/donhang/index',$this->data);
					$this->load->view('adminpanel/include/footer');
				}
				elseif($chucnang=="chitiet")
				{
					$Id = $this->input->get("id", TRUE); settype($Id,'int');
					$this->data['donhang'] = $this->donhang_model->GetDonHang($Id);
					$this->data['result'] = $this->donhang_model->GetChiTietDonHang($Id);
					$this->load->view('adminpanel/donhang/chitiet',$this->data);
					
				}	
				elseif($chucnang=="trangthai")
				{
					 $Id = $this->input->post("id", TRUE);
					 $TrangThai = $this->input->post("trangthai", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->donhang_model->TrangThai($Id,$TrangThai);
						 if(!$tmp) echo 1;
						 else echo -1;
					 }
					 else
					 {
						 echo "";
					 }
					
				}	
				elseif($chucnang=="xoahang")
				{
					 $Id = $this->input->post("id", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->donhang_model->xoahang($Id);
						 if(!$tmp) echo 1;
						 else echo -1;
					 }
					 else
					 {
						 echo "";
					 }
					
				}				
				elseif($chucnang=="delete")
				{
					$Id = $this->input->post("id", TRUE);
					if(is_numeric($Id)) settype($Id,"int");
					else echo -1;
					$tmp = $this->donhang_model->delete($Id);
					if(!$tmp) echo 1;
					else echo -1;
				}
				elseif($chucnang=="deleteall")
				{
					$arr = $this->input->post('id'); 
					for($i=0;$i < count($arr); $i++)
					{						
						if($this->donhang_model->delete($arr[$i])) echo -1;
					}
					echo 1;
				}
			} else echo redirect(base_url('adminpanel.html'));
	  }
	  
	  public function quanlydathang($chucnang="view")
	{
		  	$chk = $this->admin->checkLogin();
			if(($chk==1)||$chk==2)
			{
				$arr['username'] = $this->data['Username'];
				$this->data['title_page'] = 'Quản lý đặt hàng'; 				
				$this->data['page'] = 'quanlydathang';
				$this->load->model('dathang_model');
				if($chucnang=="view")
				{
					$this->data['title'] = 'QUẢN LÝ ĐẶT HÀNG';
					$this->data['title_header'] = 'Danh sách đơn đặt hàng';
					$this->data['result'] = $this->dathang_model->select();
					$this->load->view('adminpanel/include/header',$this->data);
					$this->load->view('adminpanel/include/headermenu');
					$this->load->view('adminpanel/include/menuleft',$this->data);
					$this->load->view('adminpanel/dathang/index',$this->data);
					$this->load->view('adminpanel/include/footer');
				}	
				elseif($chucnang=="trangthai")
				{
					 $Id = $this->input->post("id", TRUE);
					 $TrangThai = $this->input->post("trangthai", TRUE);
					 if(is_numeric($Id))
					 {
						 $tmp = $this->dathang_model->TrangThai($Id,$TrangThai);
						 if(!$tmp) echo 1;
						 else echo -1;
					 }
					 else
					 {
						 echo "";
					 }
					
				}	
				elseif($chucnang=="chitiet")
				{
					$Id = $this->input->get("id", TRUE); settype($Id,'int');
					echo "<p style='min-width:200px; min-height:200px; padding:20px;'>".$this->dathang_model->chitiet($Id)."</p>";
					
				}			
				elseif($chucnang=="delete")
				{
					$Id = $this->input->post("id", TRUE);
					if(is_numeric($Id)) settype($Id,"int");
					else echo -1;
					$tmp = $this->dathang_model->delete($Id);
					if($tmp) echo 1;
					else echo -1;
				}
				elseif($chucnang=="deleteall")
				{
					$arr = $this->input->post('id'); 
					for($i=0;$i < count($arr); $i++)
					{						
						if(!$this->dathang_model->delete($arr[$i])) echo -1;
					}
					echo 1;
				}
			} else echo redirect(base_url('adminpanel.html'));
	  }


	
	public function ktrauser()
	{
		if (array_key_exists('username',$_POST)) 
		{
			$arr['username'] = $this->input->post('username');
			if( $this->admin->checkUsername($arr)) 
			{
		  		echo json_encode(FALSE);
			} 
			else 
			{
		  		echo json_encode(TRUE);
			}
	  	}
	}

	   public function ktradulieu($page)
	  {
		  $chk = $this->admin->checkLogin();
		  $this->load->model(array('loaisanpham_model','sanpham_model'));
		  if(($chk==1)||$chk==2)
		  {
		      $Id = $this->input->post("id", TRUE);
              if(is_numeric($Id)) 
              {
                switch($page)
                {
                    case 'quanlyloaisanpham' : $tmp = $this->loaisanpham_model->checkExist($Id);break;
                    default:$tmp = 0;break;
                }
              }
			  else
			  {				
			  	$tmp = 0;
                switch($page)
                {
                    case 'quanlyloaisanpham' : 
					{
						for($i=0; $i < count($Id) ; $i++)
						{
							$tmp += $this->loaisanpham_model->checkExist($Id[$i]);
						}
					};break;
                    default:$tmp = 0;break;
                } 
			  }	
				if($tmp > 0) echo $tmp;
				else echo 0;			  		  
		  } else echo 1;
	  }
	  
	 

	  
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */