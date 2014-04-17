<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
    <span class="pagedesc"></span> </div>
  <!--pageheader-->
  <div class="line-soild"></div>
    <script type="application/javascript">
  	<?php if($_GET['status']=='success') {?>
		jQuery(document).ready(function(e) {            
			jQuery('.msgsuccess').fadeIn();
        });
	<?php }?>
  </script>
  <div id="contentwrapper" class="contentwrapper">
    <div class="notibar msgsuccess" style=" display:none;"> <a class="close"></a>
      <p>Xử lý thành công</p>
    </div>
    <div id="validation" class="subcontent" >
      <?php foreach($result as $item) {?>
      <form id="fr_baiviet1" class="stdform" method="post" action="">
        <?=form_hidden("Id", $item->Id)?>
        <p>
          <label>Tiêu đề tiếng Anh</label>
          <span class="field">
          <input type="text" name="Ten_en" id="Ten_en" class="longinput" value="<?=$item->Ten_en?>" />
          <?=form_error('Ten_en')?>
          </span> </p>
          <p>
          <label>Tiêu đề tiếng Việt</label>
          <span class="field">
          <input type="text" name="Ten_vi" id="Ten_vi" class="longinput" value="<?=$item->Ten_vi?>" />
          <?=form_error('Ten_vi')?>
          </span> </p>
        <p>
          <label>Nội dung tiếng Anh</label>
          <span class="field">
          <textarea cols="80" rows="5" class="longinput" name="NoiDung_en" id="NoiDung_en"><?=$item->NoiDung_en?>
</textarea>
          </span> </p><p>
          <label>Nội dung tiếng Việt</label>
          <span class="field">
          <textarea cols="80" rows="5" class="longinput" name="NoiDung_vi" id="NoiDung_vi"><?=$item->NoiDung_vi?>
</textarea>
          </span> </p>
        <p class="stdformbutton">
          <button class="submit radius2">Cập nhật</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('adminpanel/baiviet.html?id='.$item->Id)?>'">
        </p>
      </form>
      <?php }?>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->