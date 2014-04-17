<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct()
    {       
    parent::__construct();
		session_start();
		$this->data['title_page'] = "Trang chủ";
		$this->load->library(array('admin','ngonngu'));
        $this->load->model(array('counter_model','public_model'));
		$this->data['class_body'] = 'class="withvernav"';
		$this->data['class_topheader'] = "";
		$this->data['SEO'] = '';
		$this->data['lang'] = $this->ngonngu->getLang();
		$this->lang->load("main", $this->data['lang']);
		$this->data['menu'] = $this->public_model->GetMenu($this->data['lang']);
         if (!isset($_SESSION['BO_DEM']))
         { 
              $this->counter_model->them($_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], date('Y-m-d H:i:s'), $_SERVER['REQUEST_URI']);
              $_SESSION['BO_DEM'] = 'OK';
        }
		$this->data['title'] = 'PrimRose USA';	
    }
    public $data;
}
