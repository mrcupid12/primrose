<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Prime Rose</title>
<link rel="stylesheet" href="<?=base_url()?>statics/css/main.css" type="text/css" />
<link href="<?=base_url()?>statics/css/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<script type="application/javascript" src="<?=base_url()?>statics/js/plugin/jquery-1.9.1.min.js"></script>
<script type="application/javascript" src="<?=base_url()?>statics/js/plugin/jquery.validate.min.js"></script>
<script type="application/javascript" src="<?=base_url()?>statics/js/colorbox/jquery.colorbox-min.js"></script>
<script type="application/javascript" src="<?=base_url()?>statics/js/custom_pulic.js"></script>
</head>
<body>
<div class="header">
  <div class="img_head"><input type="hidden" name="url" id="url" value="<?=base_url()?>"/> </div>
  <div id="navigation">
    <div>
      <div class="left">
        <ul>
          <li class="selected"><a href="<?=base_url()?>"><?=lang('TC')?></a></li>
          <li><a href="<?=base_url()?>gioi-thieu.html"><?=lang('GT')?></a></li>
          <li><a href="<?=base_url()?>huong-dan-thanh-toan.html"><?=lang('HDTT')?></a></li>
          <li><a href="<?=base_url()?>lien-he.html"><?=lang('LH')?></a></li>
        </ul>
      </div>
      <div class="right">
        <ul>
          <li><a href="javascript:setlang('vi');">Vietnamese</a></li>
          <li><a href="javascript:setlang('en');">English</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="body">
  <div class="content_left">
    <div class="menu">
      <div class="header_title">
        <h4><?=lang('SP')?></h4>
      </div>
      <ul>
      <?php foreach($menu as $itemMenu) {?>
        <li><a href="<?=base_url()?>sanpham/loaisanpham/<?=$itemMenu->Id?>-<?=$this->unicode->change($itemMenu->Ten)?>.html"><?=$itemMenu->Ten?></a></li>
        <?php }?>
      </ul>
    </div>
    <!--<div class="menu">
      <div class="header_title">
        <div class="cart"> </div>
        <h4 class="itcart">Giỏ hàng của bạn</h4>
      </div>
      <ul>
        <div class="info_cart">Giỏ hàng có: 1 sản phẩm <br />
          Tổng cộng: 50,000 vnđ</div>
      </ul>
    </div>-->
    <div class="menu support">
      <div class="header_title">
        <h4 ><?=lang('HTTT')?></h4>
      </div>
      <ul>
        <li class="no_line"><a href="#" class="hotro">Hỗ trợ 1</a></li>
        <li class="no_line"><a href="#" class="hotro">Hỗ trợ 2</a></li>
      </ul>
    </div>
    <div class="menu ads">
      <div class="img_ads"> <a href="#"><img src="statics/images/ads1.jpg" alt=""/> </a></div>
      <div class="img_ads"><a href="#"> <img src="statics/images/ads2.png" alt=""/> </a></div>
    </div>
  </div>