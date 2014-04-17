      <?php foreach($result as $item) {?>
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
      <form id="frm_game" class="stdform" method="post" action="">
        <?=form_hidden("Id", $item->Id)?>
    <p>
          <label>Hình đại diện</label>
          <span class="field"><img src="<?=base_url()?><?=$item->HinhDaiDien?>" id="ViewHinh" alt="" width="140px" height="181px" /><br />
          <input type="text" name="HinhDaiDien" class="smallinput" id="HinhAnh" onchange="ChangeImage()"  value="<?=$item->HinhDaiDien?>" />
          <a class="btn btn_image" href="javascript:BrowseServer(HinhAnh)" > <span>Chọn hình</span></a> </span><small style="font-size:14px;" class="desc">Click vào nút chọn hình để up hình hoặc dán link hình vào ô trống. Up hình với tỉ lệ width x height: 210x210; 300x300</small> </p>
         <p>
          <label>Tên sản phẩm tiếng Anh</label>
          <span class="field">
          <input type="text" name="Ten_en"  class="longinput" value="<?=$item->Ten_en?>"/>
          <?=form_error('Ten_en')?>
          </span> </p>
          <p>
          <label>Tên sản phẩm tiếng Việt</label>
          <span class="field">
          <input type="text" name="Ten_vi" class="longinput" value="<?=$item->Ten_vi?>"/>
          <?=form_error('Ten_vi')?>
          </span> </p>
        <p>
          <label>Thuộc về</label>
          <span class="formwrapper">
          <select  name="MaLoaiCha" class="chzn-select" style="width:350px;" tabindex="2" id="MaLoaiCha">
            <option value="0">--------------NO PARENT--------------</option>
           <?php foreach($loai_san_pham as $itemloai) {?>
           <option value="<?=$itemloai->Id?>" <?=($item->IdLoai==$itemloai->Id)?"selected":""?>><?=$itemloai->Ten_en?>-----<?=$itemloai->Ten_vi?></option>
           <?php }?>
          </select>
          </span> </p>
        <p>
          <label>Giá</label>
          <span class="field">
          <input type="text" name="Price" id="Price" class="smallinput" value="<?=$item->Gia?>" onchange="Change()"/> VNĐ
          <input  type="hidden" name="Gia" id="Gia" value="<?=$item->Gia?>" />
          <?=form_error('Gia')?>
          </span> </p>
          <p>
            <label>Tóm tắt tiếng Anh</label>
            <span class="field">
            <textarea class="longinput" name="TomTat_en" rows="5" cols="80" ><?=$item->TomTat_en?></textarea>
            </span> 
            </p>
             <p>
            <label>Tóm tắt tiếng Việt</label>
            <span class="field">
            <textarea class="longinput" name="TomTat_vi" rows="5" cols="80" ><?=$item->TomTat_vi?></textarea>
            </span> 
            </p>
           <p>
            <label>Mô tả tiếng Anh</label>
            <span class="field">
            <textarea class="longinput" name="MoTa_en" rows="5" cols="80" id="NoiDung_en"><?=$item->MoTa_en?></textarea>
            </span> <?php echo display_ckeditor($editor_en); ?>
            </p>
             <p>
            <label>Mô tả tiếng Việt</label>
            <span class="field">
            <textarea class="longinput" name="MoTa_vi" rows="5" cols="80" id="NoiDung_vi"><?=$item->MoTa_vi?></textarea>
            </span> <?php echo display_ckeditor($editor_vi); ?>
            </p>
        <p>
          <label>Thứ tự</label>
          <span class="field">
          <input type="text" name="ThuTu" id="ThuTu" class="smallinput" value="<?=$item->ThuTu?>" />
          <?=form_error('ThuTu')?>
          </span> </p>
        <br />
        <p class="stdformbutton">
          <button class="submit radius2">Cập nhật</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/<?=$page?>.html'">
        </p>
      </form>
      <?php }?>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->