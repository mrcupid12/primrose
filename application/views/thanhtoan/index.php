<div id="body_wrapper">
  <div class="body_content">
    <div class="content border">
      <div class="title">
        <h4>Xác nhận đơn hàng</h4>
      </div>
      <div class="information">
        <div class="view_cart" >
          <div>Danh sách đơn hàng của bạn gồm:</div>
          <table class="table" >
            <thead>
              <tr >
                <td>Hình ảnh</td>
                <td>Tên sản phẩm</td>
                <td>Size</td>
                <td>Đơn giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach($this->cart->contents() as $items): ?>
              <tr <?=($i&1)?'class="alt"':''?> id="<?=$items['rowid']?>">
                <td><img src='<?=$items['options']['hinhanh']?>' width='63px' height='82px' /></td>
                <td><?=$this->public_model->GetTenSP($items['id'])?></td>
                <td><?=$items['options']['size']?></td>
                <td><?=number_format($items['price'])." VNĐ"?></td>
                <td><?=$items['qty']?></td>
                <td><?=number_format($items['subtotal'])." VNĐ"?></td>
              </tr>
              <?php $i++; endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" align="right"><strong>Tổng cộng</strong></td>
                <td colspan="1"><strong id="tong">
                  <?=number_format($this->cart->total())." VNĐ"?>
                  </strong></td>
              </tr>
            </tfoot>
          </table>
          <div class="confirm"><a href="<?=base_url()?>thanhtoan/xacnhan.html">Xác nhận</a></div>
        </div>
        <div class="Info_DatHang">  <?=$ThanhToan->NoiDung?></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
