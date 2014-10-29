jQuery(document).ready(function(e){
 	set_cookiesession(); 
});
/*  SET COOKIES SESSION
	 *  author: Adam Taylor
	 *  date: 27/11/2012
 */
function set_cookiesession(){
	if(getCookie('accepted')!='true'){
		$('.cookiebar').css('display','block');
		$('#continuebutton').on('click',function(el){
			el.preventDefault();
			$('.cookiebar').hide();
			setCookie('accepted','true',30);
		});
	}
}
function setCookie(name, value, days){
  if (days){
    var date = new Date();
    date.setTime(date.getTime()+days*24*60*60*1000);
    var expires = "; expires=" + date.toGMTString();
  }  else
    var expires = "";
  document.cookie = name+"=" + value+expires + ";path=/"; 
}
	
function getCookie(c_name){
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++){
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
	 	x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name){
			return unescape(y);
		}
	}
}