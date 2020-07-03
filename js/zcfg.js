// JavaScript Document
var templetMap = new Object();

function zctemplet(name, json) {
	var cnt = json.length;
	var templet;
	if (templetMap[name])
		templet = templetMap[name];
	else {
		templet = $(name).html();
		templetMap[name] = templet;
	}

	$(name).html("");
	var html = "";

	for (var i = 0; i < cnt; i++) {
		html += templet.replace(new RegExp("(\\[#\\])", 'g'), "[" + i + "]");
	}
	$(name).html(html);

	zcfg(name, json);
}

function zcfg(name, json) {
	function zcset(arg, val) {
		var jstr = "json." + arg;
		if (arg.indexOf("[") == 0)
			jstr = "json" + arg;

		if ((isNaN(parseInt(val)) || parseInt(val).toString() != val || (val.indexOf(".") != val.lastIndexOf(".")) || (val.lastIndexOf("+") == val.length - 1)) && typeof val != "boolean") {
			val = '"' + val + '"';
		}

		return eval(jstr + "=" + val);
	}

	function zcparse(arg) {
		var jstr = "json." + arg;
		if (arg.indexOf("[") == 0)
			jstr = "json" + arg;
		return eval(jstr);
	}

	$(name + " [zcfg]").each(function (index, element) {
		var name = $(element).attr("zcfg");
		var val = "";
		if (name.indexOf("*") != name.lastIndexOf("*")) {
			var ns = name.split("*");

			for (var i = 0; i < ns.length; i += 2) {
				val += zcparse(ns[i]);
				if (i != ns.length - 1)
					val += ns[i + 1];
			}

		} else {
			val = zcparse(name);

		}
		if ($(element).hasClass("switch")) {
			$(element).bootstrapSwitch('state', val, true);
		} else if ($(element).hasClass("slider")) {
			$(element).slider('setValue', val);
		} else {
			$(element).val(val);
		}

	});


	$(document).off("change switchChange.bootstrapSwitch", name + " [zcfg]");
	$(document).on("change switchChange.bootstrapSwitch", name + " [zcfg]", function (evt) {
		var name = $(this).attr("zcfg");
		var val = $(this).val();
		if ($(this).hasClass("switch")) {
			val = $(this).is(":checked");
		}

		if (name.indexOf("*") != name.lastIndexOf("*")) {
			var ns = name.split("*");
			var vs = val.split(ns[1]);
			for (var i = 0; i < ns.length; i += 2) {
				zcset(ns[i], vs[i / 2]);
			}
		} else {
			zcset(name, val);
		}
	});
}
