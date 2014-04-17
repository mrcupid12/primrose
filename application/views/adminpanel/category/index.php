<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
    <ul class="hornav">
      <li class="current"><a href="#basicform">Xem</a></li>
      <li><a href="#validation">Thêm mới</a></li>
    </ul>
  </div>
  <!--pageheader-->
  
  <div id="contentwrapper" class="contentwrapper">
    <div id="basicform" class="subcontent">
      <div class="contenttitle2">
        <h3>
          <?=$title_header?>
        </h3>
      </div>
      <!--contenttitle-->
      <div class="notibar msgalert" style=" display:none;"> <a class="close"></a>
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
        <col class="con1" />
        </colgroup>
        <thead>
          <tr>
            <th class="head0 nosort"><input type="checkbox"  class="checkall" /></th>
            <th class="head1">STT</th>
            <th class="head0">Tiêu đề tiếng Anh</th>
            <th class="head1">Tiêu đề tiếng Việt</th>
            <th class="head1">Nổi bật</th>
            <th class="head1">Thứ tự</th>
            <th class="head0">Trạng thái</th>
            <th class="head1">Xử lý</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($result as $i => $item) {?>
          <tr class="gradeX" id="cate_<?=$item->Id?>">
            <td align="center"><span class="center">
              <input type="checkbox" value="<?=$item->Id?>" />
              </span></td>
            <td><?=$i+1?></td>
            <td><a  href="<?=base_url('adminpanel/'.$page.'/edit.html?id='.$item->Id)?>"><?=$item->Ten_en?></a></td>
            <td><a  href="<?=base_url('adminpanel/'.$page.'/edit.html?id='.$item->Id)?>"><?=$item->Ten_vi?></a></td>
            <td><button class="stdbtn <?=($item->NoiBat==1)?"btn_lime":"btn_red"?>" onclick="NoiBat(<?=$item->Id?>,'<?=$page?>')" id="btnNB_<?=$item->Id?>">
              <?=($item->NoiBat==1)?"Có":"Không"?>
              </button></td>
            <td><?=$item->ThuTu?></td>
            <td class="center"><?php if($item->TrangThai==1) {?>
              <img src="<?=base_url('statics/images/admin/check.png')?>" alt="<?=$item->Id?>" onClick="AnHien(<?=$item->Id?>,'<?=$page?>')" title="Hiện" style="margin:10px;cursor:pointer;"  />
              <?php   }
              else {?>
              <img src="<?=base_url('statics/images/admin/cancel.png')?>" alt="<?=$item->Id?>" onClick="AnHien(<?=$item->Id?>,'<?=$page?>')" title="Ẩn" style="margin:10px;cursor:pointer;" />
              <?php }?></td>
            <td class="center"><a class="btn btn3 btn_pencil" href="<?=base_url('adminpanel/'.$page.'/edit.html?id='.$item->Id)?>"></a> &nbsp;<a class="btn btn3 btn_trash ask" title="Xóa" href="javascript:DeleteCate(<?=$item->Id?>,'<?=$page?>')"  ></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--subcontent-->
   
    <div id="validation" class="subcontent" style="display: none">
      <form id="frm_category" class="stdform" method="post" action="<?=base_url()?>adminpanel/<?=$page?>/insert.html">
             <p>
          <label>Tên tiếng Anh</label>
          <span class="field">
          <input type="text" name="Ten_en"  class="longinput" value="<?=set_value('Ten_en')?>"/>
          <?=form_error('Ten_en')?>
          </span> </p>
        <p>
         <p>
          <label>Tên tiếng Việt</label>
          <span class="field">
          <input type="text" name="Ten_vi"  class="longinput" value="<?=set_value('Ten_vi')?>"/>
          <?=form_error('Ten_vi')?>
          </span> </p>
        
        <p>
          <label>Thứ tự</label>
          <span class="field">
          <input type="text" name="ThuTu" id="ThuTu" class="smallinput" value="<?=set_value('ThuTu')?>" />
          <?=form_error('ThuTu')?>
          </span> </p>
        <br />
        <p class="stdformbutton">
          <button class="submit radius2">Thêm mới</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/<?=$page?>'">
        </p>
      </form>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->