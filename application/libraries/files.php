<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class files
{
	var $CI;
	public function checkfile($str)
	{//true: ton tai; false: ko ton tai, null: du lieu nhap vao ko dung
		if(is_file($str)) return TRUE; return FALSE;
	}
	public function checkfolder($str)
	{//true: ton tai; false: ko ton tai, null: du lieu nhap vao ko dung
		if(is_dir($str)) return TRUE; return FALSE;
	}
	public function createfolder($str)
	{//1: tao thu muc thanh cong; 0:ko tao thu muc dc; -1: thu muc da tao roi; null: du lieu dua vao ko dung
		$chk = $this->checkfolder($str);
		if(!$chk)
		{
			mkdir($str,0777); if($this->checkFolder($str)) return 1; return 0;
		}
		elseif($chk)
		{
			return -1;
		}
		else return NULL;
	}
	public function readfilefolderinfolder($dir)
	{
		$arr = array();
		if(is_dir($dir))
		{
			if($handle=opendir("./".$dir))
			{
				while(false!==($file=readdir($handle)))
				{
					if($file[0]==".")continue;
					if($file!="_notes")
					{
						$arr[]=base_url($dir.$file);
					}
				}
				closedir($handle);
			}
		}
		return $arr;
	}
	public function readfileinfolder($dir)
	{
		$arr = array();
		if(is_dir($dir))
		{
			if($handle=opendir("./".$dir))
			{
				while(false!==($file=readdir($handle)))
				{
					if($file[0]==".")continue;
					if(($file!="_notes")&&(is_file($dir.$file)))
					{
						$arr[] = base_url($dir.$file);
					}
				}
				closedir($handle);
			}
		}
		return $arr;
	}
	public function readfolderinfolder($dir)
	{
		$arr = array();
		if(is_dir($dir))
		{
			if($handle=opendir("./".$dir))
			{
				while(false!==($file=readdir($handle)))
				{
					if($file[0]==".")continue;
					if(($file!="_notes")&&(is_dir($dir.$file)))
					{
						$arr[]=base_url($dir.$file);
					}
				}
				closedir($handle);
			}
		}
		return $arr;
	}
	public function deletefile($dir)
	{//1: da xoa; null: thu muc ko dung
		if(is_file($dir))
		{
			unlink('./'.$dir);
			return 1;
		}
		else return -1;
	}
	public function deletefolder($dir)
	{//1: da xoa; null: thu muc ko dung
		if (is_dir($dir)) $dir_handle = opendir($dir);
		else return NULL;
		if (!$dir_handle) return NULL;
		while($file=readdir($dir_handle))
		{
			if ($file != "." && $file != "..")
			{
				if (!is_dir($dir."/".$file)) unlink($dir."/".$file);
				else $this->deletefolder($dir.'/'.$file);
			}
		}
		closedir($dir_handle);
		rmdir($dir);
		return 1;
	}
	public function getext($dir)
	{
		if(is_file($dir))
		{
			$info = pathinfo($filename);
			return $info['extenstion'];
		}
		else return NULL;
	}
	public function upload($arr=array())
	{
		//In: arr('path'=>'upload','type'=>'jpg|jpeg|png|gif','rewrite'=>TRUE,'name'=>'');
		//Out: arr()
		$this->CI=&get_instance();
		if(isset($arr['path'])&&($arr['path']!=NULL))
		{
			$config['upload_path'] = './'.$arr['path'].'/';
		}
		else
		{
			$config['upload_path'] = './upload/';
		}
		if(isset($arr['type'])&&($arr['type']!=NULL))
		{
			$config['allowed_types'] = $arr['type'];
		}
		else
		{
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
		}
		if(isset($arr['rewrite'])&&($arr['rewrite']!=NULL))
		{
			$config['overwrite'] = $arr['rewrite'];
		}
		else
		{
			$config['overwrite'] = TRUE;
		}
		if(isset($arr['name'])&&($arr['name']!=NULL))
		{
			$config['file_name'] = $arr['name'];
		}
		$this->CI->load->library('upload',$config);
		if (!$this->CI->upload->do_upload())
		{
			return $this->CI->upload->display_errors();
		}
		else return $this->CI->upload->data();
	}
}?>