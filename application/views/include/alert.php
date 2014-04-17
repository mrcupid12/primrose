<link type="text/css" href="<?=base_url()?>statics/css/admin/style.default.css" rel="stylesheet" />
<script src="<?=base_url()?>statics/script/admin/plugins/jquery-1.7.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>statics/script/admin/plugins/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>statics/script/admin/plugins/jquery.alerts.js" type="text/javascript">
</script>

<script type="application/javascript">
$(document).ready(function(e) {
	<?php if($thongbao!='123') {?>
    jAlert('<?=$thongbao?>', '<?=lang('TBHT')?>');
	$('#popup_ok').click(function(){
		window.location.href = '<?=$url?>';
	});
	<?php } else {?>
	<?php }?>
});

 
</script>
