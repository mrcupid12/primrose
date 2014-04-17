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
          <label>Tiêu đề</label>
          <span class="field">
          <input type="text" name="Ten" id="Ten" class="longinput" value="<?=$item->Ten?>" />
          <?=form_error('Ten')?>
          </span> </p>
           <p>
           <?php if(isset($_GET['id']) && ($_GET['id'] == 4)) {?>
          <label>Set giờ </label>
          <span class="field">
           <textarea name="GhiChu" class="mediuminput" style="height:100px;" id="GhiChu"><?=$item->GhiChu?>
</textarea> <a class="btn btn_orange radius50" onclick="TaoTime()"  style=" float:right; margin-right: 193px; cursor:pointer; margin-top: 43px;;"> <span style="margin-left:0">Tạo thời gian</span> </a>
          </span> </p>
          <?php }?>
        <p>
          <label>Nội dung</label>
          <span class="field">
          <textarea name="NoiDung" class="mediuminput" id="NoiDung"><?=$item->NoiDung?>
</textarea>
          <?=form_error('NoiDung')?>
          </span> <?php echo display_ckeditor($editor); ?> </p>
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