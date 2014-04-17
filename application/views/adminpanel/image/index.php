<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?> - <?=$TenSP?>
    </h1>
    <ul class="hornav">
      <li <?=($validate=='loi')?'':'class="current"'?>><a href="#basicform">Xem</a></li>
      <li <?=($validate=='loi')?'class="current"':''?>><a href="#validation">Thêm mới</a></li>
    </ul>
  </div>
  <!--pageheader-->
  
  <div id="contentwrapper" class="contentwrapper">
    <div class="notibar msgalert" style=" display:none;" > <a class="close"></a>
      <p>Dữ liệu đang được sử dụng. Không thể xóa</p>
    </div>
    <div class="notibar msgsuccess" style=" display:none;"> <a class="close"></a>
      <p>Xử lý thành công</p>
    </div>
    <div class="notibar msgerror" style=" display:none;"> <a class="close"></a>
      <p>Đã xảy ra lỗi xử lý</p>
    </div>
    <div id="basicform" class="subcontent" <?=($validate=='loi')?'style="display:none;"':''?>>
      <div class="contenttitle2">
        <h3>
          <?=$title_header?> - <?=$TenSP?>
        </h3>
      </div>
      <!--contenttitle-->
      <div class="gallerywrapper">
        <ul class="imagelist">
          <?php foreach($result as $item) {?>
          <li id="img_<?=$item->Id?>"> <img src="<?=base_url()?><?=$item->UrlHinh?>" alt=""   /> <span> <a href="#" class="name ajax">Thứ tự
            <?=$item->ThuTu?>
            </a> <a class="edit" style="background:none;">
            <?php if($item->TrangThai==1) {?>
            <img src="<?=base_url('statics/images/admin/check.png')?>" alt="<?=$item->Id?>" onClick="AnHien(<?=$item->Id?>,'<?=$page?>')" title="Hiện" style="cursor:pointer; width:20px;"  />
            <?php   }
              else {?>
            <img src="<?=base_url('statics/images/admin/cancel.png')?>" alt="<?=$item->Id?>" onClick="AnHien(<?=$item->Id?>,'<?=$page?>')" title="Ẩn" style="cursor:pointer; width:20px;" />
            <?php }?>
            </a><a href="<?=base_url()?><?=$item->UrlHinh?>" class="view"></a> <a class="delete" href="javascript:DelImage(<?=$item->Id?>,'<?=$page?>')" ></a> </span> </li>
          <?php }?>
        </ul>
      </div>
      <!--gallerywrapper--> 
    </div>
    <!--subcontent-->
    
    <div id="validation" class="subcontent" <?=($validate=='loi')?'':'style="display:none;"'?>>
      <form id="frm_image" class="stdform" method="post" action="<?=base_url()?>adminpanel/<?=$page?>/insert.html">
        <input type="hidden" name="IdSanPham" class="mediuminput" value="<?=$IdSanPham?>" />
        <p>
          <label>Hình ảnh</label>
          <span class="field"><img src="" id="ViewHinh" alt="" width="140px" height="150px" /><br />
          <input type="text" name="UrlHinh" class="smallinput" id="HinhAnh" onchange="ChangeImage()" value="<?=set_value('Hinh')?>" />
          <a class="btn btn_image" href="javascript:BrowseServer(HinhAnh)" > <span>Chọn hình</span></a> </span><small style="font-size:14px;" class="desc">Click vào nút chọn hình để up hình hoặc dán link hình vào ô trống. Up hình với tỉ lệ width x height: 210x210; 300x300</small>  </p>
        <p>
          <label>Thứ tự</label>
          <span class="field">
          <input type="text" name="ThuTu" class="smallinput" id="ThuTu" value="<?=set_value('ThuTu')?>" />
          <?=form_error('ThuTu')?>
          </span> </p>
        <br />
        <p class="stdformbutton"> 
          <button class="submit radius2">Lưu</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/<?=$page?>.html?IdSanPham=<?=$IdSanPham?>'">
        </p>
      </form>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->