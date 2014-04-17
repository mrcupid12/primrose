<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
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
            <th class="head0">STT</th>
            <th class="head1">Username</th>
            <th class="head0">Họ tên</th>
            <th class="head1">Link</th>
            <th class="head0">Loại tài khoản</th>
            <th class="head0">Ngày tạo</th>
            <th class="head1">Tình trạng</th>
            <th class="head0">Quyền</th>
            <th class="head1">Xử lý</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($result as $i => $item) {?>
          <tr class="gradeX" id="cate_<?=$item->Username?>">
            <td align="center"><span class="center">
              <input type="checkbox" value="<?=$item->Username?>"/>
              </span></td>
            <td><?=$i+1?></td>
            <td><?=$item->Username?>
              </a></td>
            <td><?=$item->FullName?></td>
            <td><a href="<?=$item->Link?>"><?=$item->Link?></a></td>
            <td><?=($item->Type==99)?"Quản trị viên":"Cộng tác viên"?></td>
            <td><?=date('d/m/Y H:i:s',strtotime($item->NgayTao))?></td>
            <td><?=($item->Status==2)?"Bình thường":"Đang khóa"?></td>
            <td><?php if($item->Type==99) {?><a href="<?=base_url()?>adminpanel/quanlyuser/edit.html?un=<?=$item->Username?>">Cập nhật quyền</a> <?php } else {echo "Không";}?></td>
            <td class="center"><a class="btn btn3 btn_pencil" title="Sửa tình trạng" href="<?=base_url('adminpanel/quanlyuser/changestatus.html?un='.$item->Username)?>"></a> &nbsp;<a class="btn btn3 btn_trash ask" title="Xóa" href="javascript:DeleteCate('<?=$item->Username?>','quanlyuser')"  ></a> &nbsp;</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->