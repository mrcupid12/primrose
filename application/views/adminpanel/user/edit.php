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
      <form id="frm_user1" class="stdform" method="post" action="<?=base_url()?>adminpanel/quanlyuser/edit.html">
         <p>
          <label>Username</label>
          <span class="field">
          <input type="text" name="Username" id="Username" readonly="readonly" class="smallinput" value="<?=$item->Username?>"/>
          <?=form_error('Username')?>
          </span> </p>
          <p><table width="100%" style="border: 1px solid #CCC; text-align:center">
                <thead><tr>
                  <td>Loại game<?=form_error('GioiThieu')?></td>
                  <td>Store<?=form_error('DoanThe')?></td>
                  <td>Platform <?=form_error('HoTro')?></td>
                  <td>Game <?=form_error('LienHe')?></td>
                  <td>Sản phẩm <?=form_error('LienKet')?></td>
                  <td>Trang nội dung <?=form_error('Setting')?></td>
                  <td>Blog <?=form_error('PhuHuynh')?></td>
                  <td>Support <?=form_error('Slider')?></td>
                  <td>Promotioncode <?=form_error('TaiLieu')?></td>
                  <td>FreeStuff <?=form_error('ThongBao')?></td>
                  <td>Image <?=form_error('ThuGian')?></td>
                  <td>Email <?=form_error('TinAnh')?></td>
                  <td>Library <?=form_error('Library')?></td>
                  <td>Viết blog <?=form_error('VietBlog')?></td>
                  <td>Người dùng</td>
                </tr></thead>
                <tbody><tr>
                  <td><input type="checkbox" name="LoaiGame" value="7" <?=($item->LoaiGame==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Store" value="7" <?=($item->Store==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Platform" value="7" <?=($item->Platform==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Game" value="7" <?=($item->Game==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="SanPham" value="7" <?=($item->SanPham==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Setting" value="7" <?=($item->Setting==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Blog" value="7" <?=($item->Blog==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Support" value="7" <?=($item->Support==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="PromotionCode" value="7" <?=($item->PromotionCode==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="FreeStuff" value="7" <?=($item->FreeStuff==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Image" value="7" <?=($item->Image==7)?"checked='checked'":""?>  /></td>
                  <td><input type="checkbox" name="Email" value="7" <?=($item->Email==7)?"checked='checked'":""?>  /></td>      
                  <td><input type="checkbox" name="Library" value="7" <?=($item->Library==7)?"checked='checked'":""?>  /></td>                   
                  <td><input type="checkbox" name="VietBlog" value="7" <?=($item->VietBlog==7)?"checked='checked'":""?>  /></td>
                   <td><input type="checkbox" name="NguoiDung" value="7" <?=($item->NguoiDung==7)?"checked='checked'":""?>  /></td>                   
                </tr></tbody>
              </table></p>
        <br />
        <p class="stdformbutton">
          <button class="submit radius2">Cập nhật</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/quanlyuser.html'">
        </p>
      </form>
      <?php }?>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->