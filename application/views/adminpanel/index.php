<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Page | Amanda Admin Template</title>
<link rel="stylesheet" href="<?=base_url()?>statics/css/admin/style.default.css" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/custom/general.js"></script>
<script type="text/javascript" src="<?=base_url()?>statics/script/admin/custom/index.js"></script>
</head>

<body class="loginpage">

	<div class="loginbox">
    	<div class="loginboxinner">
        	
            <div class="logo">
            	<h1><span>Primrose</span>USA</h1>
                <p>Adminstrator Tools</p>
            </div><!--logo-->
            
            <br clear="all" />
            
            <div class="nousername">
				<div class="loginmsg">Bạn chưa nhập username</div>
            </div><!--nousername-->
            
            <div class="nopassword" <?=($loi=='')?'':'style="display:block;"'?>>
				<div class="loginmsg"  ><?=$loi?></div>
            </div><!--nopassword-->
            
            <form id="login" action="" method="post">
            	
                <div class="username">
                	<div class="usernameinner">
                    	<input type="text" name="username" id="username" />
                    </div>
                </div>
                
                <div class="password">
                	<div class="passwordinner">
                    	<input type="password" name="password" id="password" />
                    </div>
                </div>
                
                <button>Sign In</button>
                
                <div class="keep"><input type="checkbox" name="remember" value="1" /> Keep me logged in</div>
            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
