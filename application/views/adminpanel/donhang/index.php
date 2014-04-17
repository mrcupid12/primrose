<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
    <ul class="hornav">
      <li class="current"><a href="#basicform">Xem</a></li>
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
            <th>Họ Tên</th>
            <th class="head0">Địa chỉ</th>
            <th class="head1">Số ĐT</th>
            <th class="head0">Email</th>
            <th class="head1">Ngày đặt hàng</th>
            <th class="head0">Tổng Sp</th>
            <th class="head1">Tổng tiền</th>
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
            <td><a class="view" href="<?=base_url('adminpanel/'.$page.'/chitiet.html?id='.$item->Id)?>"><?=$item->HoTen?></a></td>
            <td><?=$item->DiaChi?></td>
            <td><?=$item->SoDT?></td>
            <td><?=$item->Email?></td>
             <td><?=date('d-m-Y H:i',strtotime($item->NgayDatHang))?></td>
              <td><?=$item->TongSP?></td>
               <td><?=number_format($item->TongTien)?></td>
            <td class="center">
            	<select name="TrangThai" onChange="ChangeTrangThai(<?=$item->Id?>,'<?=$page?>')" >
                <option value="1" <?=($item->TrangThai==1)?"selected":""?>>Mới nhận</option>
                <option value="2" <?=($item->TrangThai==2)?"selected":""?>>Đang xử lý</option>
                <option value="3" <?=($item->TrangThai==3)?"selected":""?>>Đã xử lý</option>
                <option value="4" <?=($item->TrangThai==4)?"selected":""?>>Hủy</option>
                </select>
            </td>
            <td class="center"><a class="btn btn3 btn_search view" href="<?=base_url('adminpanel/'.$page.'/chitiet.html?id='.$item->Id)?>" title="Xem chi tiết đơn hàng"></a> &nbsp;<a class="btn btn3 btn_trash ask" title="Xóa" href="javascript:DeleteCate(<?=$item->Id?>,'<?=$page?>')"  ></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--subcontent-->
    
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->