<?php

function generate_menu($menu=array()){
	$ci =& get_instance();

	$link = implode('/',$ci->uri->segment_array());

	$out = '';
	foreach ($menu as $key => $value) {
		$a = '';
		if($link==$value->link){
			$a = 'active';
		}

		if(count($value->CHILD)==0){
			$out .= '<li class="'.$a.'"><a href="'.site_url().'/'.$value->link.'"><i class="fa '.$value->icon.'"></i> <span>'.$value->menu.'</span></a></li>';
		} else {
			$out .= '<li class="treeview active">';
			$out .= '	<a href="'.site_url().'/'.$value->link.'"><i class="fa '.$value->icon.'"></i> <span>'.$value->menu.'</span>';
			$out .= '	  <span class="pull-right-container">';
			$out .= '	    <i class="fa fa-angle-left pull-right"></i>';
			$out .= '	  </span>';
			$out .= '	<ul class="treeview-menu">';
			$out .= '	'.generate_menu($value->CHILD);
			$out .= '	</ul>';
			$out .= '	</a>';
			$out .= '</li>';
		}
	}
	return $out;
}