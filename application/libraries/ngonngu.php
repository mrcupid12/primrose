<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ngonngu
{
	public function getLang()
	{
		$lang = "vi";
		if(isset($_SESSION["lang"])&&($_SESSION["lang"]=="en"))
		{
			$lang = "en";
		}
		return $lang;
	}
}
?>