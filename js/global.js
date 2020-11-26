// JavaScript Document
$.fn.myAlert=function(type,title,text){
		$(".alert-dismissible").remove();
		var str='<div class="alert alert-'+type+' alert-dismissible" role="alert">'+
 				'<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+
				'<span class="fa fa-exclamation-triangle"></span> ';
 		str+='<strong> '+title+' </strong> ';
		str+=text;
		str+='</div>';
		$(this).prepend(str);
		setTimeout(function(){$(".alert-dismissible").fadeOut();},3000);
	};

function htmlAlert(obj,type,title,text,duration)
{
	
	$(obj).hide();
	$(obj).html('<div class="alert alert-'+type+'"><strong>'+title+'</strong> '+text+' <button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button></div>');
	$(obj).fadeIn();
	  if(duration) 
	  {
		  function fout()
		  {
			  $(obj).fadeOut();
			}
	setTimeout(fout,duration);
		
	  }
}

//function rpc(func, params, callbak, usrdata) {
//	if(params==undefined || params==null)
//		params=[];
//	
//	
//	if(callbak!=undefined)
//		 $.xmlrpc({
//			url: '/RPC2',
//			methodName: func,
//			async: true,
//			params: params,
//			error: function (jqXHR, status, error) {
//				console.log(error);
//			},
//			success: function (data){callbak(data[0],usrdata);}
//		});
//	else
//		$.xmlrpc({
//			url: '/RPC2',
//			methodName: func,
//			async: true,
//			params: params,
//			error: function (jqXHR, status, error) {
//				console.log(error);
//			}
//		});
//}
function rpcc(func, params, callbak, usrdata, jsonrpc) {
	if(params==undefined || params==null)
		params=[];	

	if(callbak!=undefined)
		jsonrpc.call(func, params, function(data){callbak(data,usrdata);}, function(res){console.log(res)});
	else
		jsonrpc.call(func, params, function(data){}, function(res){console.log(res)});
}

function rpc(func, params, callbak, usrdata) {
	var jsonrpc = new $.JsonRpcClient({ ajaxUrl: 'http://'+window.location.host+'/RPC' });
	rpcc(func, params, callbak, usrdata, jsonrpc);
}

function rpc2(func, params, callbak, usrdata) {
	var jsonrpc = new $.JsonRpcClient({ ajaxUrl: 'http://'+window.location.host+'/RPC2' });
	rpcc(func, params, callbak, usrdata, jsonrpc);
}

function rpc3(func, params, callbak, usrdata) {
	var jsonrpc = new $.JsonRpcClient({ ajaxUrl: 'http://'+window.location.host+'/RPC3' });
	rpcc(func, params, callbak, usrdata, jsonrpc);
}

function rpc4(func, params, callbak, usrdata) {
	var jsonrpc = new $.JsonRpcClient({ ajaxUrl: 'http://'+window.location.host+'/RPC4' });
	rpcc(func, params, callbak, usrdata, jsonrpc);
}



function func(func, data, callbak)
{
	$.post("/func.php?func="+func,data,callbak,"json");
}

function navIndex(index){
	$("#defaultNavbar1>ul>li").eq(index).addClass("active");
}


function changeLang(lang){
	$("#langcss").attr("href","/css/"+lang+".css");
	$.cookie('lang',lang);
	$("option["+lang+"]").each(function(){
		$(this).text($(this).attr(lang));
	});
	func("saveConfigFile",{path: "/config/lang.json",data:JSON.stringify({"lang":lang},null,2)});
}

$(function(){
	$.ajaxSetup({
	  cache: false
	});
	
	if($.cookie('lang')==undefined)
		changeLang($("#globaljs").attr("defLang"));
	else
		changeLang($.cookie('lang'));

});