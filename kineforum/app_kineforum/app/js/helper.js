helper = {}

helper.set_form_value = function(frm, data) {
	$.each(data, function(key, value) {
		var $ctrl = $('[name=' + key + ']', frm);
		switch ($ctrl.attr("type")) {
			case "text":
			case "hidden":
				$ctrl.val(value);
				break;
			case "radio":
			case "checkbox":
				$ctrl.each(function() {
					if ($(this).attr('value') == value) {
						$(this).attr("checked", value);
					}
				});
				break;
			default:
				$ctrl.val(value);
		}
	});
};

helper.convert_form = function(param) {
	var out = {};
	for (var i = 0; i < param.length; i++) {
		out[param[i].name] = param[i].value;
	}

	return out;
};

helper.body_mask = function() {
	$('.loader').show();
};

helper.body_unmask = function() {
	$('.loader').hide();
};