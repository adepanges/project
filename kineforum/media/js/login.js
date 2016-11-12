function setCookie(c_name, value, exdays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name) {
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1) {
		c_start = c_value.indexOf(c_name + "=");
	}
	if (c_start == -1) {
		c_value = null;
	} else {
		c_start = c_value.indexOf("=", c_start) + 1;
		var c_end = c_value.indexOf(";", c_start);
		if (c_end == -1) {
			c_end = c_value.length;
		}
		c_value = unescape(c_value.substring(c_start, c_end));
	}
	return c_value;
}

function do_login() {
	$('#pesan').removeClass()
	$('#pesan').html("Mohon Tunggu, Loading ...");
	$('#pesan').addClass('l_tunggu');
	if ($("#ingat_saya").get()[0].checked) {
		setCookie('username', $("#username").val(), 4);
		setCookie('password', $("#password").val(), 4);
		setCookie('ingat', true, 4);
	} else {
		setCookie('username', '', 4);
		setCookie('password', '', 4);
		setCookie('ingat', false, 4);
	}
	$.post(app.site_url+'/login/do_login', $("#login").serialize(), function(data, status) {
		if (status == 'success') {
			var obj = jQuery.parseJSON(data);
			if (obj.success == true) {
				$('#pesan').addClass('l_sukses');
				$('#pesan').html("Login Sukses, Memasuki Halaman Awal Aplikasi ...");
				document.location.href = app.site_url;
			} else {
				//alert('Username dan Password yang anda masukan tidak sesuai.');
				$('#pesan').addClass('l_gagal');
				$('#pesan').html('Username dan Password yang anda masukan tidak sesuai.');

				console.log(obj);
				if (obj.captcha) {
					$(".captcha").show();
					$(".img_captcha").html(obj.img);
				} else {
					$(".captcha").hide();
					$(".img_captcha").html('');
				}
			}
		} else {
			//alert('Maaf, ada kesalahan dalam pengiriman data.');
			$('#pesan').addClass('l_gagal');
			$('#pesan').html('Maaf, ada kesalahan dalam pengiriman data.');
		}
	});
}

$(document).ready(function() {

	$("#lupa_sandi").click(function() {
		$("#pemberitahuan").toggle();
	});
	$("#username").val(getCookie('username'));
	$("#password").val(getCookie('password'));
	$(".captcha").hide();

	$("#ingat_saya").get()[0].checked = eval(getCookie('ingat'));
	$('#password').bind('keyup', function(event) {
		//console.log(event.keyCode); 
		if (event.keyCode == 13) {
			do_login();
		}
	});

	$('#captcha').bind('keyup', function(event) {
		//console.log(event.keyCode); 
		if (event.keyCode == 13) {
			do_login();
		}
	});

	$("#masuk").click(function() {
		do_login();
	});
	$("#lupa").click(function() {
		$('#lupa_sandi').fadeIn();
		$('#lupa_sandi').animate({
			bottom: $(window).height() / 2
		})
		$('#lupa_sandi').animate({
			left: $(window).width() / 2 - 275
		})
		$('.msg_reset').html('');
		$('.email_reset').focus();
		$(".email_reset").val('');
	});
	$("#close").click(function() {
		$('#lupa_sandi').animate({
			bottom: '0px'
		})
		$('#lupa_sandi').animate({
			left: '0px'
		})
		$('#lupa_sandi').fadeOut();
	});
	//$('#login').fadeIn(3000);
	$('.button_reset').attr('disabled', 'disabled');
	$(".email_reset").keyup(function() {
		value = $(".email_reset").val();
		cek = IsEmail(value)
		if (cek) {
			$(".email_reset").css('border-color', 'green');
			$('.button_reset').removeAttr('disabled');
		} else {
			$(".email_reset").css('border-color', 'red');
			$('.button_reset').attr('disabled', 'disabled');
		}
	});

	$('.email_reset').keydown(function(e) {
		if (e.keyCode == 13) {
			value = $(".email_reset").val();
			cek = IsEmail(value)
			if (cek) {
				sendEmail();
			}
		}
	});

	$('.button_reset').click(function() {
		sendEmail();
	});

	function sendEmail() {
		$('.msg_reset').html('<img src="<?php echo base_url(); ?>/resources/themes/images/default/shared/large-loading.gif" style="width: 20px;"> Tunggu sebentar...');
		email = $(".email_reset").val();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url(); ?>login/sendEmail',
			data: {
				'email': email
			},
			success: function(msg) {
				$(".email_reset").val('');
				$('.button_reset').attr('disabled', 'disabled');
				$('.msg_reset').html(msg);
			}
		});
	}

});

function IsEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}