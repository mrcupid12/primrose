<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?=$title_page?> | Admin Panel</title>
<link rel="stylesheet" href="<?=base_url()?>statics/css/admin/style.default.css" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.number.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.alerts.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jconfirmaction.jquery.js'?>"></script>
<script type="text/javascript" src="<?=base_url()?>ckfinder/ckfinder_v1.js'?>"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/highcharts.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/custom/general.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/custom/custom.admin.js"></script>
</head>

<body <?=$class_body?>>

<div class="bodywrapper">
    <div class="topheader <?=$class_topheader?>">
        <div class="left">
            <h1 class="logo"><a target="_blank" href="<?=base_url()?>">PrimRose<span>USA</span></a></h1>
            <span class="slogan">admin panel</span>
            
            <div class="search">
            	<form action="" method="post"><!--
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>-->
                          <input type="hidden" value='<div class="tableoptions"><button onclick="DeleteSelected()" class="deletebutton radius3" title="dyntable2">Delete Selected</button></div>' id='btn_deletene' />
                    <input type="hidden" id="url" value="<?=base_url()?>" />                        
       <input type="hidden" id="page" value="<?=$page?>" />                
              </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">        	
            <div class="userinfo">
            	<img src="<?=base_url()?>statics/images/admin/thumbs/avatar.png" alt="" />
                <span>Xin chào, <?=($Name=="")?$Username:$Name?></span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="<?=base_url()?>statics/images/admin/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	Change theme: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                    <span class="email">Xin chào,</span><br />
                	<h4><?=($Name=="")?$Username:$Name?></h4>
                    <ul>
                    	<li><a href="<?=base_url()?>adminpanel/edituser.html">Cập nhật thông tin</a></li>
                        <li><a href="http://locphu.vn" target="_blank">Giúp đỡ</a></li>
                        <li><a href="<?=base_url()?>adminpanel/logout.html">Thoát</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
   
   
        
    
    

