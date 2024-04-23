<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/myicon.png">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script>

<title>Admin Login</title>

<style>

	body, html{

		width:100%;

		height:100%;

		margin:0;

		padding:0;

		background:#f1f4f6;

	}

	.admin-login{

		width:100%;

		height:100%;

		background:#f1f4f6;		

		display: flex;

		align-items: center;

		justify-content: center;

	}

	.admin-login-box{

		width:330px;

		min-height:320px;

		overflow:auto;

		margin:0 auto;

		background:#FFF;

		box-shadow: 0 0.46875rem 2.1875rem rgba(4,9,20,0.03),0 0.9375rem 1.40625rem rgba(4,9,20,0.03),0 0.25rem 0.53125rem rgba(4,9,20,0.05),0 0.125rem 0.1875rem rgba(4,9,20,0.03);

		border-radius:5px;

	}

	.login-title{

		width:90%;

		min-height:10px;

		overflow:auto;

		border-bottom:1px solid #f1f4f6;

		margin:auto;

	}
	.logobox{

		width:30px;

		height:30px;

		margin-top:8px;

		float:right;		

	}
	.logobox img{

		width:100%;

		height:100%;

		object-fit:contain;

	}

	.login-title-inner{

		width:200px;

		line-height:50px;

		font-family:sans-serif;

		font-size:14px;

		color:#333;

		margin:auto;

		text-transform: uppercase;

		font-weight: bold;

		float:left;

	}

	.login-inner{

		width:100%;

		line-height:50px;

		font-family:sans-serif;

		font-size:14px;

		color:#333;

		margin:auto;

		text-transform: uppercase;

		font-weight: bold;

	}
	.formcontent{

		width:100%;

		min-height:10px;

		overflow:auto;

		margin-top:5px;

	}
	.formcontent label{

		font-family:sans-serif;

		font-size:12px;

		color:#333;

		text-transform:capitalize;

		font-weight: bold;

		line-height:10px;

	}
	.login-but{

		color: #fff;

		background-color: #3f6ad8;

		border:1px solid #3f6ad8;

		line-height:30px;

		width:80px;

		text-align: center;

		font-family:sans-serif;

		text-transform: capitalize;

		border-radius:4px;

		margin-top:20px;

	}
	.form-control{

		display: block;

		width: 95%;

		height: 30px;

		padding: 5px;

		font-size: 14px;

		font-weight: 400;

		color: #495057;

		background-color: #fff;

		background-clip: padding-box;

		border: 1px solid #ced4da;

		border-top-color: rgb(206, 212, 218);

		border-right-color: rgb(206, 212, 218);

		border-bottom-color: rgb(206, 212, 218);

		border-left-color: rgb(206, 212, 218);

		border-radius: 4px;

		transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
		
		outline:none;

	}
	.error-msg{

		width:99%;

		min-height:10px;

		overflow:auto;

		background:rgba(255,0,0,0.7);

		text-align:left;

		text-indent: 10px;

		display:none;

	}
	.error-msg p{

		color:#fff;

		font-family:sans-serif;

		font-size:10px;

		line-height:10px;

		text-transform: capitalize;

	}
</style>

</head>



<body>

	<div class="admin-login">

		<div class="admin-login-box">

			<div class="login-title">

				<div class="login-title-inner">Admin Login</div>

				<div class="logobox"><img src="<?php echo base_url(); ?>assets/img/logo-art.png"</div>

			</div>

				<?php //echo md5('crowther'); ?>

			<div class="login-inner">

				<div class="error-msg">

					<p class="msg-fb" style="color:#fff">Empty Username/Password Field.</p>

				</div>

				<form id="adminLoginForm">

					<div class="formcontent">

						<label>Username</label>

						<input type="text" class="form-control login-txt-f adminUsername" placeholder="e.g email@email.com" id="" name="" />
						
					</div>

					<div class="formcontent">

						<label>Password</label>

						<input type="password" placeholder="Password" class="form-control login-txt-f adminPassword" id="" name="" />

					</div>

					<div class="formcontent">

						<button type="submit" class="login-but" id="login-but">Login</button>

					</div>

				</form>

			</div>

		</div>

	</div>

</body>

</html>