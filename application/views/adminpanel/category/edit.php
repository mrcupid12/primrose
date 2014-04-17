<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
    <span class="pagedesc"></span> </div>
  <!--pageheader-->
  <div class="line-soild"></div>
  
  <div id="contentwrapper" class="contentwrapper">
    <div id="validation" class="subcontent" >
      <?php foreach($result as $item) {?>
      <form id="frm_category" class="stdform" method="post" action="">
        <?=form_hidden("Id", $item->Id)?>
        
        <p>
          <label>Tên tiếng Anh</label>
          <span class="field">
          <input type="text" name="Ten_en"  class="longinput" value="<?=$item->Ten_en?>" />
          <?=form_error('Ten_en')?>
          </span> </p>
           <p>
          <label>Tên tiếng Việt</label>
          <span class="field">
          <input type="text" name="Ten_vi"  class="longinput" value="<?=$item->Ten_vi?>" />
          <?=form_error('Ten_vi')?>
          </span> </p>
        <p>
          <label>Thứ tự</label>
          <span class="field">
          <input type="text" name="ThuTu" id="ThuTu" class="smallinput" value="<?=$item->ThuTu?>" />
          <?=form_error('ThuTu')?>
          </span> </p>
        <br />
        <p class="stdformbutton">
          <button class="submit radius2">Cập nhật</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/<?=$page?>'">
        </p>
      </form>
      <?php }?>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->