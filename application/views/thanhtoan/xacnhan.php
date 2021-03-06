<div id="body_wrapper">
  <div class="body_content">
    <div class="content border">
      <div class="title">
        <h4>Thông tin đơn hàng</h4>
      </div>
      <div class="information">
      <div class="form_info">
        <div class="content">
      	<div class="acc_info">Vui lòng điền đầy đủ thông tin vào form bên dưới. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.</div>
       	<span class="error">(*)</span> là bắt buộc
        <form action="<?=base_url()?>thanhtoan/xacnhan.html" method="post" id="form_xacnhan">
        	<table>
            	<tr>
                	<td align="right">Họ tên <span class="error">(*)</span></td>
                    <td><input type="text" name="HoTen" value="<?=set_value('HoTen')?>" /><?=form_error('HoTen')?></td>
            	</tr>
            	<tr>
                	<td align="right">Số điện thoại <span class="error">(*)</span></td>
                    <td><input type="text" name="SoDT" value="<?=set_value('SoDT')?>" /><?=form_error('SoDT')?></td>
            	</tr>
            	<tr>
                	<td align="right">Email <span class="error">(*)</span></td>
                    <td><input type="text" name="Email" value="<?=set_value('Email')?>" /><?=form_error('Email')?></td>
            	</tr>
            	<tr>
                	<td align="right">Địa chỉ</td>
                    <td><input type="text" name="DiaChi" value="<?=set_value('DiaChi')?>" /><?=form_error('DiaChi')?></td>
            	</tr>
                <tr>
                	<td align="right">Ghi chú</td>
                    <td><textarea name="GhiChu"><?=set_value('GhiChu')?></textarea></td>
            	</tr>
                <tr>
                	<td align="right">Mã bảo vệ <span class="error">(*)</span></td>
                    <td><input type="text" name="captcha" value="" style="width:150px;"/><?=form_error('captcha')?><div class="captcha"><?=$image?></div></td>
            	</tr>
            	<tr>
                	<td align="right">Tổng sản phẩm</td>
                    <td><span><?=count($this->cart->contents())?></span></td>
            	</tr>
            	<tr>
                	<td align="right">Tổng tiền phải thanh toán</td>
                    <td><span><?=number_format($this->cart->total())." VNĐ"?></span></td>
            	</tr>
                <tr>
                	<td align="center" colspan="2"> <a href="<?=base_url()?>cart/clear.html" class="cancel">Hủy đặt hàng</a><button class="send">Đặt hàng</button></td>
                </tr>
            </table>
            </form>
        </div>
      </div>
        
        <div class="Info_DatHang right"> <?=$ThanhToan->NoiDung?></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
