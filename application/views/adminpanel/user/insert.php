<div class="centercontent">
  <div class="pageheader">
    <h1 class="pagetitle">
      <?=$title?>
    </h1>
  </div>
  <!--pageheader-->
  
  <div id="contentwrapper" class="contentwrapper">
    <div id="validation" class="subcontent" >
      <form id="frm_user" class="stdform" method="post" action="<?=base_url()?>adminpanel/quanlyuser/insert.html">
        <p>
          <label>Họ tên</label>
          <span class="field">
          <input type="text" name="FullName" id="FullName" class="mediuminput" value="<?=set_value('FullName')?>"/>
          <?=form_error('FullName')?>
          </span> </p>
        <p>
          <label>Username</label>
          <span class="field">
          <input type="text" name="Username" id="Username" class="mediuminput" value="<?=set_value('Username')?>"/>
          <?=form_error('Username')?>
          </span> </p>
        <p>
          <label>Password</label>
          <span class="field">
          <input type="password" name="Password" id="Password" class="mediuminput" value="<?=set_value('Password')?>"/>
          <?=form_error('Password')?>
          </span> </p>
        <p>
          <label>Re-Password</label>
          <span class="field">
          <input type="password" name="RePassword" id="RePassword" class="mediuminput" value="<?=set_value('RePassword')?>"/>
          <?=form_error('RePassword')?>
          </span> </p>
        <p>
          <label>Loại quản trị</label>
          <span class="field">
          <select name="Type" class="uniformselect">
            <option value="1">Quản trị viên</option>
            <option value="2">Cộng tác viên</option>
          </select>
          </span> </p>
        <p class="stdformbutton"> <!--<a class="btn btn_orange btn_book radius50" href="javascript:LuuBlog()"> <span>Lưu & Thêm mới</span> </a>-->
          <button class="submit radius2">Lưu</button>
          <input class="reset radius2" type="reset" value="Hủy bỏ" onclick="parent.location='<?=base_url('')?>adminpanel/quanlyuser.html'">
        </p>
      </form>
    </div>
    <!--subcontent--> 
    
  </div>
  <!--contentwrapper--> 
  
</div>
<!-- centercontent -->