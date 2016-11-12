<?php

$config['base_url'] = "http://".$_SERVER['HTTP_HOST'].preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])=="\\"?"":dirname($_SERVER['SCRIPT_NAME'])).'/';

$config['app_name']	= "KineApp";
$config['app_longname']	= "Sistem Manajeman Kineforum";
$config['client_name'] = "Kineforum DKJ";

$config['client_alamat'] = 'Cikini';
$config['lokasi_pemda'] = 'Jakarta Pusat';
$config['nama_aplikasi'] = 'eSeat';
$config['app_footer']	= "&copy; ".date('Y')." All Rights reserved. ";
$config['welcome_text'] = 'Selamat Datang di Aplikasi '.$config['app_name'];
$config['client_logo'] = $config['base_url'].'client/logo.png';

$config['use_captcha'] = true;
$config['limit_login'] = 3;

$config['base_url'] = "http://".$_SERVER['HTTP_HOST'];
$config['base_url'] .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])=="\\"?"":dirname($_SERVER['SCRIPT_NAME'])).'/';

$config['url_media'] = $config['base_url'].'media/';
$config['url_bootstrap'] = $config['url_media'].'bootstrap/';
$config['url_css'] = $config['url_media'].'css/';
$config['url_js'] = $config['url_media'].'js/';
$config['url_plugins'] = $config['url_media'].'plugins/';
$config['url_images'] = $config['url_media'].'images/';


$config['url_client'] = $config['base_url'].'client/';
$config['url_client_images'] = $config['url_client'].'images/';
$config['url_client_uploads'] = $config['url_client'].'uploads/';
$config['url_client_tpl'] = $config['url_client'].'template/';

$config['path_client'] = FCPATH2."client/";
$config['path_client_tpl'] = $config['path_client']."templates/";
$config['path_client_upload'] = $config['path_client']."uploads/";

$config['limit'] = 25;
$config['pagesize'] = $config['limit'];

/* ------------------------- config modul ------------------------- */
$cfg_modul[] = array(1,'kineforum','Siman Kineforum');

$upload_url = $config['url_client_uploads'];
$upload_path = $config['path_client_upload'];

foreach($cfg_modul as $row){
	$modul=$row[1];
	$nama_var='cfg_'.$modul;
	
	$temp['modulid']					= $row[0];
	$temp['modul_name']					= $modul;
	$temp['modul_long_name']			= $row[2];
	$config['url_'.$modul]				= $config['base_url'].$modul.'.php';		
	$temp['view_'.$modul]				= $config['base_url'].'app_'.$modul.'/'.$modul.'/';
	$temp['url_app_'.$modul]				= $config['base_url'].'app_'.$modul.'/app/';
	$temp['component_'.$modul]			= $config['base_url'].'app_'.$modul.'/'.$modul.'/component/';
	$temp[$modul.'_upload_foto_path']	= $upload_path.$modul.'/foto/';
	$temp[$modul.'_upload_dok_path']	= $upload_path.$modul.'/dokumen/';
	$temp[$modul.'_tpl_path']			= $config['path_client_tpl'].$modul.'/';
	$temp[$modul.'_upload_foto_url']	= $upload_url.$modul.'/foto/';
	$temp[$modul.'_upload_dok_url']		= $upload_url.$modul.'/dokumen/';
	$temp[$modul.'_download_dok_url']	= $upload_url.$modul.'/dokumen/';
	$temp[$modul.'_tpl_url']			= $config['url_client_tpl'].$modul.'/';
	// $temp[$modul.'_ftp_upload_dok_url']	=$config['ftp_url'].$modul.'/dokumen/';
	
	$temp['index_page'] 		= $modul.'.php';
	$temp['subclass_prefix'] 	= $modul.'_';

	$$nama_var=$temp;
}