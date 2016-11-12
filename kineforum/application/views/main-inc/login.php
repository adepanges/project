<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Login Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->item('client_logo') ?>" />  
<link rel="stylesheet" href="<?php echo $this->config->item('url_bootstrap') ?>css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $this->config->item('url_bootstrap') ?>dist/css/AdminLTE.min.css">
<script src="<?php echo $this->config->item('url_plugins') ?>jQuery\jQuery-2.2.3.min.js"></script> 
    <link rel="stylesheet" href="<?php echo $this->config->item('url_media') ?>css/login.css">
<script type="text/javascript" src="<?php echo $this->config->item('url_media') ?>js/login.js"></script>
<script type="text/javascript">
	app = {};
	app.site_url = '<?php echo site_url() ?>';
</script>
        
</head>
<body>
	<div id="lupa_sandi">
		<div class="ct_lupa">
		<div id="close"> x </div>
		<b>Jika anda lupa kata sandi : </b>
		<ol>
		<li>Harap hubungi bagian TU atau administrator</li>
		<li>Sebutkan username anda</li>
		<li>Bagian TU / Administrator akan mengatur ulang kata sandi anda</li>
		<?php if($this->config->item('use_email')){ ?>
		<li>Atau mereset password dengan mengisi email dibawah<br />
			<input type="text" placeholder="email" class="email_reset">
			<input type="button" value="Reset" class="button_reset" style="padding: 3px; margin: 3px; margin-bottom: 10px;"><br >
			<span class="msg_reset"></span>
			<br />
			</li>
		<?php } ?>
		</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 header">
			<table>
				<tr>
					<td><img src="<?php echo $this->config->item('client_logo') ?>"></td>
					<td><span>Instansi</span></td>
				</tr>
			</table>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 form">
			<div class="title">
				<table>
					<tr>
						<td><img src="<?php echo $this->config->item('client_logo') ?>"></td>
						<td><span>Sistem Monitoring Tugas</span></td>
					</tr>
				</table>
			</div>
			<div class="col-md-8 col-md-offset-2 body">
				<form name="login" id="login">
					<div id="form_content">
						<div id="pesan" style="margin-bottom:10px;"></div>
						<div class="form-group">
							<input type="text" placeholder="Nama Pengguna" name="uname" class="form-control" id="username"/>
						</div>
						<div class="form-group">
							<input type="password" placeholder="Kata Sandi" name="pwd" class="form-control" id="password" />
						</div>
						<div class="form-group">
							<table class="captcha">
								<tr>
									<td>
										<span class="img_captcha"></span>
									</td>
									<td style="padding-left:30px;">
										<input name="captcha" type="text" class="input_captcha" id="captcha"/>
									</td>
								</tr>
							</table>
						</div>	
						<div class="form-group">
							<input type="button" name="masuk" id="masuk" value="Masuk" class="btn btn-primary" style="width:100%;"> 
						</div>
						<div class="pull-left">
							<input type="checkbox" id="ingat_saya" name="ingat_saya"> Ingat Saya
						</div>
						<div class="pull-right">
							<span id="lupa"> Lupa Kata Sandi ?</span>	
						</div>
					</div>
				</form>
			</div>
		</div>	
	</div>
</body>
</html>