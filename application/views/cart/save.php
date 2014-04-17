<div class="right">
<?=form_open(base_url("cart/save.html"))?>
<div>
	<div>
    	<div><?=lang('HoTen')?> <?=form_error('hoten')?>:</div>
    	<div><input name="hoten" type="text" value="<?=set_value('hoten')?>" /></div>
    </div>
	<div>
    	<div><?=lang('DienThoai')?>  <?=form_error('phone')?>:</div>
    	<div><input name="phone" type="text value="<?=set_value('phone')?>"" /></div>
    </div>
	<div>
    	<div>Email <?=form_error('email')?>:</div>
    	<div><input name="email" type="email" value="<?=set_value('email')?>" /></div>
    </div>
	<div>
    	<div><?=lang('DiaChi')?>  <?=form_error('diachi')?>:</div>
    	<div><input name="diachi" type="text" value="<?=set_value('diachi')?>" /></div>
    </div>
    <div>
    	<div><?=lang('GhiChu')?> <?=form_error('ghichu')?>:</div>
    	<div>
    	  <textarea name="ghichu" cols="40" id="textarea" ></textarea>
    	</div>
    </div>
    <div>
    	<div><?=lang('MXN')?></div>
    	<div><?=$image?></div>
    </div>
	<div>
    	<div><?=lang('NMXN')?> <?=form_error('captcha')?>:</div>
    	<div><input name="captcha" type="text" /></div>
    </div>
	<div>
    	<div><input type="submit" value="<?=lang('DKsub')?>" width="70px" /></div>
    </div>
</div>
<?=form_close()?>
      </div>
    </div>
  </div>