<style type="text/css">
.photoEdit { width:750px !important;}
.photoEdit h3 { font-size: 26px; margin-top:5px; color:#FB9337;}
.photoEdit .info_donhang { width:450px; margin-bottom:10px; margin-top:10px;}
.photoEdit .info_donhang .content { width:100%;}
.photoEdit .info_donhang .content tr {}
.photoEdit .info_donhang .content tr td { padding:3px 0;}
.photoEdit .info_donhang .content tr td.title { width:100px;}
.photoEdit .info_chitiet { width:730px; margin-top:10px;}
.photoEdit .info_chitiet .content { width:100%; border:1px solid #ddd; border-collapse:collapse;}
.photoEdit .info_chitiet .content thead th { padding:7px 10px;border:1px solid #ddd;}
.photoEdit .info_chitiet .content tr {}
.photoEdit .info_chitiet .content tr td { text-align:center; padding:8px 10px; vertical-align:middle;border:1px solid #ddd;}
</style>
<div class="photoEdit">
	<div id="editphoto"  class="stdform quickform2">
    	<h3>Thông tin đơn hàng</h3>
        <div class="info_donhang">
        	<table class="content">
            	<tr>
                	<td class="title">Họ Tên</td>
                    <td><?=$donhang->HoTen?></td>
                </tr>
            	<tr>
                	<td class="title">Địa chỉ</td>
                    <td><?=$donhang->DiaChi?></td>
                </tr>
            	<tr>
                	<td class="title">Số điện thoại</td>
                    <td><?=$donhang->SoDT?></td>
                </tr>
            	<tr>
                	<td class="title">Email</td>
                    <td><?=$donhang->Email?></td>
                </tr>
            	<tr>
                	<td class="title">Ngày đặt hàng</td>
                    <td><?=date('d-m-Y H:i',strtotime($donhang->NgayDatHang))?></td>
                </tr>
            	<tr>
                	<td class="title">Tổng sản phẩm</td>
                    <td ><?=$donhang->TongSP?></td>
                </tr>
            	<tr>
                	<td class="title">Tổng tiền</td>
                    <td><?=number_format($donhang->TongTien)?> VNĐ</td>
                </tr>
            	<tr>
                	<td class="title">Trạng thái</td>
                    <td> 
                    <?php switch($donhang->TrangThai)
							{
								case 1: echo "Mới nhận";break;
								case 2: echo "Đang xử lý"; break;
								case 3: echo "Đã xử lý"; break;
								case 4: echo "Hủy"; break;
							}
					?>
                    </td>
                </tr>
            </table>
        </div>
         	<h3>Chi tiết đơn hàng</h3>
        <div class="info_chitiet">
        	<table class="content">
            	<thead>
                	<th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <tH>Đơn giá</tH>
                    <th>Thành Tiền</th>
                 <?php if(count($result) > 1) {?>      <th>Xử lý</th><?php }?>
                </thead>
                <?php foreach($result as $i => $item) {?>
                <tr id="hang_<?=$item->IdChiTiet?>">
                	<td><?=$i+1?></td>
                    <td><?=$item->IdDonHang?></td>
                    <td><a class="view" href="<?=$item->HinhDaiDien?>"><img src="<?=$item->HinhDaiDien?>" width="50" height="65"></a></td>
                    <td><?=$item->Ten_vi?></td>
                    <td><?=$item->SoLuong?></td>
                    <td><?=number_format($item->DonGia)?></td>
                    <td><?=number_format($item->ThanhTien)?></td>
                  <?php if(count($result) > 1) {?>  <td>&nbsp;<a class="btn btn3 btn_trash ask" title="Xóa" href="javascript:Delete(<?=$item->IdChiTiet?>)"  ></a></td> <?php }?>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div><!--photoEdit-->