<div class="photoEdit">
    <form id="editpass" action="<?=base_url()?>adminpanel/changepassword/update.html" method="post" class="stdform quickform2">
    	<h3>Đổi password</h3>
        <br />
        <div class="notifyMessage">Cập nhật thành công</div>
        <p>
            <label style="width:130px">Mật khẩu cũ</label>
           <span class="field" style=" margin-left:150px;"> <input type="password" name="pass" id="pass" value="" /></span>
        </p>
        <p>
            <label style="width:130px">Mật khẩu mới</label>
           <span class="field" style=" margin-left:150px;"> <input type="password" name="newpass" id="newpass" value="" /></span>
        </p>
        <p>
            <label style="width:130px"> Nhập lại mật khẩu mới</label>
           <span class="field" style=" margin-left:150px;"> <input type="password" name="renewpass" id="renewpass" value="" /></span>
        </p>
        <p class="action" style="margin-left:150px;">
        	<button class="submit radius2">Cập nhật</button> &nbsp;
            <button class="cancel radius2" style="height:auto; width:auto;">Hủy bỏ</button>
        </p>
    </form>
</div><!--photoEdit-->