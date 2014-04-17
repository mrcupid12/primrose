
<div class="view_cart" >
<div class="title_cart">Giỏ hàng</div>
<?php 
if(!$this->cart->contents()){
	echo "<div class='empty'>Giỏ hàng rỗng</div>";}
else{
?>

<table class="table" >
    <thead>
        <tr >
            <td>Hình ảnh</td>
            <td>Tên sản phẩm</td>
            <td>Size</td>
            <td>Đơn giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <td>Xóa</td>
        </tr>
    </thead>
    <tbody>
		<?php $i = 1; foreach($this->cart->contents() as $items): ?>
        <tr <?=($i&1)?'class="alt"':''?> id="<?=$items['rowid']?>">
            <td>
            	<img src='<?=$items['options']['hinhanh']?>' width='63px' height='82px' />
            </td>
            <td>
            	<?=$this->public_model->GetTenSP($items['id'])?>
            </td>
            <td><?=$items['options']['size']?></td>
            <td>
            	<?=number_format($items['price'])." VNĐ"?>
            </td>
            <td>        		
            	<input type="text" name="qty" maxlength="3" size="10" value="<?=$items['qty']?>" onchange="update_cart('<?=$items['rowid']?>')"  />
            </td>
            <td>
            	<?=number_format($items['subtotal'])." VNĐ"?>
            </td>
           <td><?=form_hidden('rowid[]', $items['rowid'])?><a href="#" onclick="DeleteItem('<?=$items['rowid']?>')"><img src="<?=base_url()?>statics/images/cancel.png" /></a></td>
        </tr>
            <?php $i++; endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" align="right"><strong>Tổng cộng</strong></td>
            <td colspan="2"><strong id="tong"><?=number_format($this->cart->total())." VNĐ"?></strong></td>
        </tr>
    </tfoot>
</table>
<div class="tool">
 <span class="del_cart"><a href="<?=base_url()?>cart/clear.html">Hủy giỏ hàng</a></span>
  <span class="check_out"> <a href="<?=base_url()?>thanhtoan.html">Xác nhận đơn hàng</a></span>
</div>
<?php  
}
?>
  </div>