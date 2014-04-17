<div class="vernav2 iconmenu">
  <ul>
    <?php $arrpage = array(1,2,3,4,5);?>
    <li <?=(in_array($page,$arrpage)==TRUE)?'class="current"':''?>  ><a href="#formsub" class="editor">Quản lý nội dung trang</a> <span class="arrow"></span>
      <ul id="formsub">
        <li <?=($page==1)?'class="current"':''?>><a href="<?=base_url('adminpanel/baiviet.html?id=1')?>">Giới thiệu</a></li>
        <li <?=($page==2)?'class="current"':''?>><a href="<?=base_url('adminpanel/baiviet.html?id=2')?>">Text trên trang chủ</a></li>
        <li <?=($page==3)?'class="current"':''?>><a href="<?=base_url('adminpanel/baiviet.html?id=3')?>">Hướng dẫn thanh toán</a></li>
        <li <?=($page==4)?'class="current"':''?>><a href="<?=base_url('adminpanel/baiviet.html?id=4')?>">Chính sách</a></li>
          <li <?=($page==5)?'class="current"':''?>><a href="<?=base_url('adminpanel/baiviet.html?id=5')?>">Điều khoản</a></li>
      </ul>
    </li>
    <li <?=($title_page=='Quản lý loại sản phẩm')?'class="current"':''?>><a href="<?=base_url('adminpanel/quanlyloaisanpham.html')?>" class="addons">Quản lý loại sản phẩm</a></li>
    <li <?=($title_page=='Quản lý sản phẩm')?'class="current"':''?>><a href="<?=base_url('adminpanel/quanlysanpham.html')?>" class="Widgets">Quản lý Sản phẩm</a></li>
    <li <?=($title_page=='Quản lý đơn hàng')?'class="current"':''?>><a href="<?=base_url('adminpanel/quanlydonhang.html')?>" class="elements">Quản lý Đơn hàng</a></li>
  </ul>
  <a class="togglemenu"></a> <br />
  <br />
</div>
<!--leftmenu-->