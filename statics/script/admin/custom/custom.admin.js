jQuery(document).ready(function(){	
	///// FORM TRANSFORMATION /////
	jQuery('input:checkbox, input:radio, select.uniformselect, input:file').uniform();

	///// FORM VALIDATION /////
	jQuery("#editpass").validate({
		rules: {
			pass: "required",
			newpass: "required",
			renewpass: {
			  equalTo: "#newpass",
			  required:true
			}
		},
		messages: {
			pass: "Vui lòng nhập mật khẩu cũ",
			newpass: "Vui lòng nhập mật khâu mới",
			renewpass: { required: "Vui lòng nhập lại mật khẩu mới", equalTo: "Mật khẩu mới nhập lại không khớp"}
		}
	});		
	jQuery("#fr_baiviet1").validate({
		rules: {
			Ten_en: "required",
			Ten_vi: "required",
			NoiDung_en: "required",
			NoiDung_vi: "required"
		},
		messages: {
			Ten_en: "Vui lòng nhập tiêu đề",
			Ten_vi: "Vui lòng nhập tiêu đề",
			NoiDung_en: "Vui lòng nhập nội dung",
			NoiDung_vi: "Vui lòng nhập nội dung"
		}
	});
	jQuery("#frm_category").validate({
		rules: {
			Ten_en: {required:true, maxlength:255},
			Ten_vi: {required:true, maxlength:255},
			ThuTu: {required:true, number:true}
		},
		messages: {
			Ten_en: { required: "Vui lòng nhập tên", maxlength: "Độ dài không được vượt quá 255 kí tự"},
			Ten_vi: { required: "Vui lòng nhập tên", maxlength: "Độ dài không được vượt quá 255 kí tự"},
			ThuTu: { required: "Vui lòng nhập thứ tự", number: "Thứ tự phải là số"}
		}
	});
    jQuery("#frm_sanpham").validate({
		rules: {
			IdLoai: "required",
			HinhDaiDien: "required",
			Ten_en: {required:true, maxlength:255},
			Ten_vi: {required:true, maxlength:255},
			Price: "required",
			ThuTu: {required:true, number:true}
		},
		messages: {
			IdLoai: "Vui lòng chọn store",
			HinhDaiDien: "Vui lòng chọn hình",
			Ten_en: { required: "Vui lòng nhập tên", maxlength: "Độ dài không được vượt quá 255 kí tự"},
			Ten_vi: { required: "Vui lòng nhập tên", maxlength: "Độ dài không được vượt quá 255 kí tự"},
			Price: "Vui lòng nhập giá",
			ThuTu: { required: "Vui lòng nhập thứ tự", number: "Thứ tự phải là số"}
		}
	});
	jQuery("#frm_info").validate({
		rules: {
			FullName: "required",
			Link: {required:true, maxlength: 255  }
		},
		messages: {
			FullName: "Vui lòng nhập họ tên",
			Link: {required:"Vui lòng nhập link", maxlength:"Độ dài không vượt quá 255 kí tự"}
		}
	});

	jQuery("#frm_user").validate({
		rules: {
			Username: {
				required:true,
				remote: {
					url: jQuery('#url').val() + "adminpanel/ktrauser.html",
					type: "POST",
					data: {
					  username: function() { return jQuery("input[name=Username]").val();}
					}
				  }
			},
			Password: "required",
			RePassword: {
			  equalTo: "#Password",
			  required:true
			}
		},
		messages: {
			Username: { remote: 'Username đã tồn tại. Vui lòng chọn username khác.'},
			Password: "Vui lòng nhập mật khẩu",
			RePassword: { required: "Vui lòng nhập lại mật khẩu", equalTo: "Mật khẩu nhập lại không khớp"}
		}
	});	
	jQuery("#frm_image").validate({
		rules: {
			UrlHinh: "required",
			ThuTu: {required:true, number:true}
		},
		messages: {
			UrlHinh: "Vui lòng chọn hình",
			ThuTu: { required: "Vui lòng nhập thứ tự", number: "Thứ tự phải là số"},
		}
	});
    //comfirm delete//
    jQuery('.ask').jConfirmAction();	
    
    //checkall//
	jQuery('.stdtablecb .checkall').click(function(){
		var parentTable = jQuery(this).parents('table');										   
		var ch = parentTable.find('tbody input[type=checkbox]');										 
		if(jQuery(this).is(':checked')) {
		
			//check all rows in table
			ch.each(function(){ 
				jQuery(this).attr('checked',true);
				jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
				jQuery(this).parents('tr').addClass('selected');
			});
						
			//check both table header and footer
			parentTable.find('.checkall').each(function(){ jQuery(this).attr('checked',true); });
		
		} else {
			
			//uncheck all rows in table
			ch.each(function(){ 
				jQuery(this).attr('checked',false); 
				jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
				jQuery(this).parents('tr').removeClass('selected');
			});	
			
			//uncheck both table header and footer
			parentTable.find('.checkall').each(function(){ jQuery(this).attr('checked',false); });
		}
	});
	
    //Datatable//
    jQuery('#dyntable2').dataTable({
		"sPaginationType": "full_numbers",
		"aaSortingFixed": [[0,'asc']],
		"fnDrawCallback": function(oSettings) {
            jQuery('input:checkbox,input:radio').uniform();
			//jQuery.uniform.update();
        }
	});
	///// TAG INPUT /////
	
	jQuery('#Size').tagsInput();
	
	// Set up the number formatting.
	//jQuery('#show_gia').number( true);
	
	///// PERFORMS CHECK/UNCHECK BOX /////
	jQuery('.stdtablecb tbody input[type=checkbox]').click(function(){
		if(jQuery(this).is(':checked')) {
			jQuery(this).parents('tr').addClass('selected');	
		} else {
			jQuery(this).parents('tr').removeClass('selected');
		}
	});
	
    	///// SELECT WITH SEARCH /////
	jQuery(".chzn-select").chosen();
	
    //delete button//
    jQuery('.dataTables_length label').after(jQuery('#btn_deletene').val());
	
	//GALLARY PHOTO///
	
	//a little image effectts
	jQuery('.imagelist img').hover(function(){
		jQuery(this).stop().animate({opacity: 0.75});
	},function(){
		jQuery(this).stop().animate({opacity: 1});
	});
	
	//image view
	jQuery('.view').colorbox();	
	
	
	//delete image in table list
	jQuery('.mediatable .delete').click(function(){
		var c = confirm("Continue delete?");
		if(c) jQuery(this).parents('tr').fadeOut();
		return false; //to prevent page reload
	});
	
	jQuery('#togglemenuleft a').trigger('click')

});

function AnHien(id, page)
{
	jQuery.ajax({
		url: "" + jQuery('#url').val() + "adminpanel/" + page + "/trangthai.html",
		type: "POST",
		data: {id: id},
		cache: false
	}).done(function(data) {
		jQuery("img[alt='"+id+"']").attr('src', data);
		var title = jQuery("img[alt='"+id+"']").attr('title');
		if(title=="Ẩn") jQuery("img[alt='"+id+"']").attr('title', "Hiện");
		else jQuery("img[alt='"+id+"']").attr('title', "Ẩn");
	});
}

function Change()
{
	var val = jQuery('#Price').val();
	jQuery('#Gia').val(val);
}

function NoiBat(id,page)
{
	jQuery.ajax({
		url: "" + jQuery('#url').val() + "adminpanel/" + page + "/noibat.html",
		type: "POST",
		data: {id: id},
		cache: false
	}).done(function(data) {
		if(data == 1)
		{
			jQuery('#btnNB_'+id).removeClass('btn_red');
			jQuery('#btnNB_'+id).addClass('btn_lime');
			jQuery('#btnNB_'+id).text('');
			jQuery('#btnNB_'+id).text('Có');
		}
		else
		{
			jQuery('#btnNB_'+id).removeClass('btn_lime');
			jQuery('#btnNB_'+id).addClass('btn_red');
			jQuery('#btnNB_'+id).text('');
			jQuery('#btnNB_'+id).text('Không');
		}
	});
}
function TinhTrang(id,page)
{
	jQuery.ajax({
		url: "" + jQuery('#url').val() + "adminpanel/" + page + "/tinhtrang.html",
		type: "POST",
		data: {id: id},
		cache: false
	}).done(function(data) {
		if(data == 1)
		{
			jQuery('#btnTT_'+id).removeClass('btn_red');
			jQuery('#btnTT_'+id).addClass('btn_lime');
			jQuery('#btnTT_'+id).text('');
			jQuery('#btnTT_'+id).text('Còn hàng');
		}
		else
		{
			jQuery('#btnTT_'+id).removeClass('btn_lime');
			jQuery('#btnTT_'+id).addClass('btn_red');
			jQuery('#btnTT_'+id).text('');
			jQuery('#btnTT_'+id).text('Hết hàng');
		}
	});
}
//delete image in grid list	
function DelImage(id,page)
{
	jConfirm('Bạn có muốn thực hiện thao tác này?', 'Thông báo', function(r) {
		if(r) 
		{
				jQuery.ajax({
				url: jQuery('#url').val() + "adminpanel/" + page + "/delete.html",
				type: "POST",
				data: {id: id},
				cache: false
			}).done(function(data) {
				if(data==1)
				{
					jQuery('.msgsuccess').fadeIn();
					jQuery('#img_'+ id).hide('explode',500);
				}
				else
				{
					jQuery('.msgerror').fadeIn();
				}
			});
		}
	});
}
	
function DeleteCate(id,page)
{
	jQuery.ajax({
		url: "" + jQuery('#url').val() + "adminpanel/ktradulieu/" + page + ".html",
		type: "POST",
		data: {id: id},
		cache: false
	}).done(function(data) {
		if(data > 0)
		{
			jQuery('.msgalert').fadeIn();
			jQuery('.question').fadeOut(300, function() {
						jQuery(this).remove();
					});	
		}
		else
		{
			jQuery.ajax({
				url: "" + jQuery('#url').val() + "adminpanel/" + page + "/delete.html",
				type: "POST",
				data: {id: id},
				cache: false
			}).done(function(data) {
				if(data==1)
				{
					jQuery('.msgsuccess').fadeIn();
					jQuery('#cate_'+id).fadeOut(function()
					{
						jQuery(this).remove();
					});
				}
				else
				{
					jQuery('.msgerror').fadeIn();
				}
			});
		}
		
	});
}
function Delete(id)
{
	jQuery.ajax({
				url: "" + jQuery('#url').val() + "adminpanel/quanlydonhang/xoahang.html",
				type: "POST",
				data: {id: id},
				cache: false
			}).done(function(data) {
				if(data!=-1)
				{
					jQuery('#hang_'+id).fadeOut(function()
					{
						jQuery(this).remove();
					});
				}
				else
				{
					  jAlert('Đã xảy ra lỗi. Vui lòng thử lại.', 'Thông báo từ hệ thống');
				}
			});
}
function BrowseServer(inputData) {
        var finder = new CKFinder();
        finder.BasePath = jQuery('#url').val() + 'ckfinder/';
        finder.SelectFunction = SetFileField;
        finder.SelectFunctionData = inputData;
        finder.Popup();
    }
function SetFileField(fileUrl, data) {
	jQuery("#HinhAnh").attr('value',  fileUrl);
	jQuery("#ViewHinh").attr('src',  fileUrl);
}


	
	///// DELETE SELECTED ROW IN A TABLE /////
function DeleteSelected()
{
		var tb = jQuery('.deletebutton').attr('title');							// get target id of table								   
		var sel = false;	
		var page = jQuery('#page').val();
		var arr = new Array();											//initialize to false as no selected row
		var ch = jQuery('#'+tb).find('tbody input[type=checkbox]');		//get each checkbox in a table
		//check if there is/are selected row in table
		ch.each(function(){
			if(jQuery(this).is(':checked')) {
				sel = true;
				arr.push(jQuery(this).val());				
			}
		});
		if(arr.length !=0)
		{
			jQuery.ajax({
				url: "" + jQuery('#url').val() + "adminpanel/ktradulieu/" + page + ".html",
				type: "POST",
				data: {id: arr},
				cache: false
			}).done(function(data) {
				if(data > 0)
				{
					jQuery('.msgalert').fadeIn();
				}
				else
				{
					jQuery.ajax({
						url: "" + jQuery('#url').val() + "adminpanel/" + page + "/deleteall.html",
						type: "POST",
						data: {id: arr},
						cache: false
					}).done(function(data) {
						if(data==1)
						{
							jQuery('.msgsuccess').fadeIn();
							for(var i=0; i< arr.length; i++)
							{
								jQuery('#cate_'+arr[i]).fadeOut(function(){
									jQuery(this).remove();	
								});	
							}						
							setInterval(function(){location.reload();},700);
						}
						else
						{
							jQuery('.msgerror').fadeIn();
							setInterval(function(){location.reload();},700);
						}
					});
				}					
			});	
		}
		
		if(!sel) jAlert('Vui lòng chọn ít nhất một trường', 'Thông báo');								//alert to no data selected
}
function LuuAnh()
{
	var IdGame = jQuery('input[name=IdGame]').val();
	var UrlHinh = jQuery('input[name=UrlHinh]').val();
	var ThuTu = jQuery('input[name=ThuTu]').val();
	if(UrlHinh!='' && IdGame!='' && ThuTu!='')
	{
		jQuery.ajax({
			url: "" + jQuery('#url').val() + "adminpanel/quanlyhinhanh/insertmoi.html",
			type: "POST",
			data: {IdGame: IdGame, UrlHinh: UrlHinh, ThuTu: ThuTu},
			cache: false
		}).done(function(data) {
			if(data==1)
			{
				jQuery('.msgsuccess').fadeIn();
				document.getElementById('frm_image').reset();
				setInterval(function(){jQuery('.msgsuccess').fadeOut();},2000);
			}
			else
			{
				jQuery('.msgerror').fadeIn();
			}
		});
	}
	else
	{
		jQuery('.msgerror').fadeIn();
		jQuery('.msgerror p').text('');
		jQuery('.msgerror p').text('Chưa nhập đủ dữ liệu');
		setInterval(function(){jQuery('.msgerror').fadeOut();},2000);
	}
}

function ChangeImage()
{
	var val = jQuery('#HinhAnh').val();
	jQuery('#ViewHinh').attr('src',val);
}

function GetTrangThai() {
	return jQuery('select[name=TrangThai]').val();
}
function ChangeTrangThai(id,page)
{
	var trangthai = GetTrangThai();
	jQuery.post( jQuery('#url').val() + 'adminpanel/'+ page+'/trangthai.html',{id:id, trangthai: trangthai }, function(data){
		location.reload();
	});
}