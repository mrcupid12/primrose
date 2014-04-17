<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
    <ul class="hornav">
      <li <?=($validate=='loi')?'':'class="current"'?>><a href="#basicform">Thông tin</a></li>
      <li <?=($validate=='loi')?'class="current"':''?>><a href="#validation">Mật khẩu</a></li>
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
      <div class="notibar msgerror" style=" <?=(!isset($_GET['success']))?"display:none;":""?>"> <a class="close"></a>
        <p>Đã xảy ra lỗi xử lý</p>
      </div>
    <div id="basicform" class="subcontent" <?=($validate=='loi')?'style="display:none;"':''?>>
      <!--contenttitle-->
      <form id="frm_info" class="stdform" method="post" action="<?=base_url()?>/adminpanel/edituser/info.html">
      <?php foreach($User as $item) {?>
        <input type="hidden" name="Username" class="mediuminput" value="<?=$username?>" />      
        <p>
          <label>Họ tên</label>
          <span class="field">
          <input type="text" name="FullName" id="FullName" class="mediuminput" value="<?=$item->FullName?>"/><?=form_error('FullName')?>
          </span> </p>
        <p>
          <label>Link </label>
          <span class="field">
          <input type="text" name="Link" id="Link" class="longinput" value="<?=$item->Link?>" /><?=form_error('Link')?>
          </span> </p>      
        <p class="stdformbutton">
          <input type="submit" name="btn_SubInfo" class="submit radius2" value="Cập nhật"/>
          <input class="reset radius2" type="reset" value="Hủy bỏ" >
        </p>
          <?php }?>
      </form>
    </div>
    <!--subcontent-->    
    <div id="validation" class="subcontent" <?=($validate=='loi')?'':'style="display:none;"'?>>
      <form id="editpass" class="stdform" method="post" action="<?=base_url()?>adminpanel/edituser/updatepass.html">
        <input type="hidden" name="username" class="mediuminput" value="<?=$username?>" />
        <p>
          <label>Nhập mật khẩu cũ</label>
          <span class="field">
          <input type="password" name="pass" id="pass" class="smallinput" value=""/>
          </span> </p>
        <p>
          <label>Nhập mật khẩu mới</label>
          <span class="field">
          <input type="password" name="newpass" id="newpass" class="smallinput" value="" />
          </span> </p>
          <p>
          <label>Nhập lại mật khẩu mới</label>
          <span class="field">
          <input type="password" name="renewpass" id="renewpass" class="smallinput" value="" />
          </span> </p>
        <p class="stdformbutton">
          <input type="submit" name="btn_SubPass" class="submit radius2" value="Cập nhật"/>
          <input class="reset radius2" type="reset" value="Hủy bỏ" >
        </p>
      </form>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->