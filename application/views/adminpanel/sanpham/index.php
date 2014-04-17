<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
    <ul class="hornav">
      <li <?=($validate=='loi')?'':'class="current"'?>><a href="#basicform">Xem</a></li>
      <li <?=($validate=='loi')?'class="current"':''?>><a href="#validation">Thêm mới</a></li>
    </ul>
  </div>
  <!--pageheader-->
  
  <div id="contentwrapper" class="contentwrapper">
    <div id="basicform" class="subcontent" <?=($validate=='loi')?'style="display:none;"':''?>>
      <div class="contenttitle2">
        <h3>
          <?=$title_header?>
        </h3>
      </div>
      <!--contenttitle-->
      <div class="notibar msgalert" style=" display:none;" > <a class="close"></a>
        <p>Dữ liệu đang được sử dụng. Không thể xóa</p>
      </div>
      <div class="notibar msgsuccess" style=" display:none;"> <a class="close"></a>
        <p>Xử lý thành công</p>
      </div>
      <div class="notibar msgerror" style=" display:none;"> <a class="close"></a>
        <p>Đã xảy ra lỗi xử lý</p>
      </div>
      <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb" id="dyntable2">
        <colgroup>
        <col class="con0" style="width: 4%" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
        </colgroup>
        <thead>
          <tr>
            <th class="head0 nosort"><input type="checkbox"  class="checkall" /></th>
            <th class="head1">Hình đại diện</th>
            <th class="head0">Tên SP tiếng Anh</th>
            <th class="head0">Tên SP tiếng Việt</th>
            <th class="head1">thuộc về</th>
            <th class="head0">Giá</th>
            <th class="head1">SP Nổi bật</th>
            <th class="head0">Ngày tạo</th>
            <th class="head1">Thứ tự</th>
            <th class="head0">Trạng thái</th>
            <th class="head1">Xử lý</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($result as  $item) {?>
          <tr class="gradeX" id="cate_<?=$item->Id?>">
            <td align="center"><span class="center">
              <input type="checkbox" value="<?=$item->Id?>" />
              </span></td>
            <td><a class="view" href="<?=base_url()?><?=$item->HinhDaiDien?>"><img src="<?=base_url()?><?=$item->HinhDaiDien?>" width="50" height="65"  /></a></td>
            <td><a  href="<?=base_url('adminpanel/'.$page.'/edit.html?id='.$item->Id)?>"><?=$item->Ten_en?></a></td>
            <td><a  href="<?=base_url('adminpanel/'.$page.'/edit.html?id='.$item->Id)?>"><?=$item->Ten_vi?></a></td>
            <td><?=$item->ten_loai?></td>
            <td><?=number_format($item->Gia)?></td>
            <td><button class="stdbtn <?=($item->NoiBat==1)?"btn_lime":"btn_red"?>" onclick="NoiBat(<?=$item->Id?>,'<?=$page?>')" id="btnNB_<?=$item->Id?>">
              <?=($item->NoiBat==1)?"Có":"Không"?>
              </button></td>
            <td><?=date('d-m-Y H:i:s',strtotime($item->NgayTao))?></td>
            <td><?=$item->ThuTu?></td>
            <td class="center"><?php if($item->TrangThai==1) {?>
              <img src="<?=base_url('statics/images/admin/check.png')?>" alt="<?=$item->Id?>" onClick="AnHien(<?=$item->Id?>,'<?=$page?>')" title="Hiện" style="margin:10px;cursor:pointer;"  />
              <?php   }
              else {?>
              <img src="<?=base_url('statics/images/admin/cancel.png')?>" alt="<?=$item->Id?>" onClick="AnHien(<?=$item->Id?>,'<?=$page?>')" title="Ẩn" style="margin:10px;cursor:pointer;" />
              <?php }?></td>
            <td class="center"><a class="btn btn3 btn_pencil" href="<?=base_url('adminpanel/'.$page.'/edit.html?id='.$item->Id)?>"></a>&nbsp;<a class="btn btn3 btn_image2" title="DS hình" href="<?=base_url()?>adminpanel/quanlyhinhanh.html?IdSanPham=<?=$item->Id?>"></a> &nbsp;<a class="btn btn3 btn_trash ask" title="Xóa" href="javascript:DeleteCate(<?=$item->Id?>,'<?=$page?>')"  ></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--subcontent-->
    <div id="validation" class="subcontent" <?=($validate=='loi')?'':'style="display:none;"'?>>
      <form id="frm_sanpham" class="stdform" method="post" action="<?=base_url()?>adminpanel/<?=$page?>/insert.html">
        <p>
          <label>Hình đại diện</label>
          <span class="field"><img src="" id="ViewHinh" alt="" width="140px" height="181px" /><br />
          <input type="text" name="HinhDaiDien" class="smallinput" id="HinhAnh" onchange="ChangeImage()"  value="<?=set_value('HinhDaiDien')?>" />
          <a class="btn btn_image" href="javascript:BrowseServer(HinhAnh)" > <span>Chọn hình</span></a> </span><small style="font-size:14px;" class="desc">Click vào nút chọn hình để up hình hoặc dán link hình vào ô trống. Up hình với tỉ lệ width x height: 210x210; 300x300</small> </p>
        <p>
          <label>Tên sản phẩm tiếng Anh</label>
          <span class="field">
          <input type="text" name="Ten_en"  class="longinput" value="<?=set_value('Ten_en')?>"/>
          <?=form_error('Ten_en')?>
          </span> </p>
          <p>
          <label>Tên sản phẩm tiếng Việt</label>
          <span class="field">
          <input type="text" name="Ten_vi" class="longinput" value="<?=set_value('Ten_vi')?>"/>
          <?=form_error('Ten_vi')?>
          </span> </p>
        <p>
          <label>Thuộc về</label>
          <span class="formwrapper">
          <select  name="MaLoaiCha" class="chzn-select" style="width:350px;" tabindex="2" id="MaLoaiCha">
            <option value="0">--------------NO PARENT--------------</option>
           <?php foreach($loai_san_pham as $item) {?>
           <option value="<?=$item->Id?>"><?=$item->Ten_en?>-----<?=$item->Ten_vi?></option>
           <?php }?>
          </select>
          </span> </p>
        <p>
          <label>Giá</label>
          <span class="field">
          <input type="text" name="Price" id="Price" class="smallinput" value="<?=set_value('Gia')?>" onchange="Change()"/> VNĐ
          <input  type="hidden" name="Gia" id="Gia" value="<?=set_value('Gia')?>" />
          <?=form_error('Gia')?>
          </span> </p>
          <p>
            <label>Tóm tắt tiếng Anh</label>
            <span class="field">
            <textarea class="longinput" name="TomTat_en" rows="5" cols="80" ><?=set_value('TomTat_en')?></textarea>
            </span> 
            </p>
             <p>
            <label>Tóm tắt tiếng Việt</label>
            <span class="field">
            <textarea class="longinput" name="TomTat_vi" rows="5" cols="80" ><?=set_value('TomTat_vi')?></textarea>
            </span> 
            </p>
           <p>
            <label>Mô tả tiếng Anh</label>
            <span class="field">
            <textarea class="longinput" name="MoTa_en" rows="5" cols="80" id="NoiDung_en"><?=set_value('MoTa_en')?></textarea>
            </span> <?php echo display_ckeditor($editor_en); ?>
            </p>
             <p>
            <label>Mô tả tiếng Việt</label>
            <span class="field">
            <textarea class="longinput" name="MoTa_vi" rows="5" cols="80" id="NoiDung_vi"><?=set_value('MoTa_vi')?></textarea>
            </span> <?php echo display_ckeditor($editor_vi); ?>
            </p>
        <p>
          <label>Thứ tự</label>
          <span class="field">
          <input type="text" name="ThuTu" id="ThuTu" class="smallinput" value="<?=set_value('ThuTu')?>" />
          <?=form_error('ThuTu')?>
          </span> </p>
        <br />
        <p class="stdformbutton">
          <button class="submit radius2">Thêm mới</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/<?=$page?>.html'">
        </p>
      </form>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->
