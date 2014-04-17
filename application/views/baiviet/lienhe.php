<script type="application/javascript">
$(document).ready(function(e) {
	$("#form_contact").validate({
		rules: {
			HoTen: "required",
			Email: { required:true, email:true},
			DienThoai: {required:true,minlength:8, number:true},
			TieuDe: "required",
			Captcha: "required",
			NoiDung: "required"
		},
		messages: {
			HoTen: "<?=lang('tbHoTen')?>",
			Email:{required:"<?=lang('tbEmail')?>", email:"<?=lang('tbEmailFormat')?>"},
			DienThoai: "<?=lang('tbDienThoai')?>",
			TieuDe: "<?=lang('tbTieuDe')?>",
			Captcha: "<?=lang('tbMaBaoVe')?>",
			NoiDung: "<?=lang('tbNoiDung')?>"			
		}
	});
});
</script>
<div class="content_right">
    <div class="info">
      <div class="text_header article"><?=lang('contact')?></div>
      <div class="content article">
      <article class="form_contact">
      <form method="post" action="" id="form_contact">
      	<table> 
        	<tr>
            	<td class="left"><?=lang('HoTen')?></td>
                <td> <input type="text" name="HoTen" value="<?=set_value('HoTen')?>" /> <?=form_error('HoTen')?></td>
            </tr>
            <tr>
            	<td class="left">Email</td>
                <td> <input type="text" name="Email" value="<?=set_value('Email')?>" /><?=form_error('Email')?></td>
            </tr>
            <tr>
            	<td class="left"><?=lang('DienThoai')?></td>
                <td > <input type="text" name="DienThoai" value="<?=set_value('DienThoai')?>" /><?=form_error('DienThoai')?></td>
            </tr>
            <tr>
            	<td class="left"><?=lang('TieuDe')?></td>
                <td> <input type="text" name="TieuDe" value="<?=set_value('TieuDe')?>" /><?=form_error('TieuDe')?></td>
            </tr>
            <tr>
            	<td class="left"><?=lang('NoiDung')?></td>
                <td> <textarea name="NoiDung"><?=set_value('NoiDung')?></textarea><?=form_error('NoiDung')?></td>
            </tr>
            <tr>
            	<td class="left"><?=lang('MaBaoVe')?></td>
                <td> <input type="text" name="Captcha" value="" class="captcha" /><?=form_error('Captcha')?> <div class="img_captcha"><?=$image?></div> </td>
            </tr>
            <tr>
            	<td colspan="2" align="center"> <input type="submit" value="<?=lang('Gui')?>" name="btn_Gui" /></td>
            </tr>
        </table>
        </form>
        </article>
       </div>
    </div>    
  </div>