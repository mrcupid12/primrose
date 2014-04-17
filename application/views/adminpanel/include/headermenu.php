 <div class="header">
    	<ul class="headermenu">
        	<li <?=($title_page=='Trang chủ')?'class="current"':''?>><a href="<?=base_url('adminpanel/home.html')?>"><span class="icon icon-flatscreen"></span>Trang chủ</a></li>
        </ul>          
           <?php 
		 $mang=array(
			 'Sun'=>'Chủ nhật',
			 'Mon'=>'Thứ hai',
			 'Tue'=>'Thứ ba',
			 'Wed'=>'Thứ tư',
			 'Thu'=>'Thứ năm',
			 'Fri'=>'Thứ sáu',
			 'Sat'=>'Thứ bảy'			 
			 );			 	
			 ?>
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>Hôm nay là</h4>
                    <h2><?=$mang[date('D')]?>, <?=date('d/m/Y')?></h2>
                </div><!--one_half-->
            </div><!--earnings-->
        </div><!--headerwidget-->
             
    </div><!--header-->   
    
 