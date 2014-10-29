//Updated
//window.onload = respondTable();
$(document).ready(respondTable);

function goright(){
    var use = $(this).parent().find('.content');    
    $(use).stop().animate({scrollLeft:'+=20'}, 100, 'linear', goright);
    assignClasses()
}
function goleft(){
    var use = $(this).parent().find('.content');    
    $(use).stop().animate({scrollLeft:'-=20'}, 100, 'linear', goleft);
    assignClasses()
}
function stop(){
    $('.content').stop();
}
function assignClasses(){
    $('.content').each(function(element,index){
        if($(this).width()< $(this)[0].scrollWidth){
            var fullScroll = ($(this)[0].scrollWidth) - ($(this).scrollLeft());
            if($(this).scrollLeft()==0){
                $(this).parents('.wrap').find('.back').addClass('zero');
                $(this).parents('.wrap').find('.forward').removeClass('zero'); 
            }else if(fullScroll == $(this).width()){
                 $(this).parents('.wrap').find('.forward').addClass('zero');
                $(this).parents('.wrap').find('.back').removeClass('zero');
            }else{
                $(this).parents('.wrap').find('.back').removeClass('zero'); 
                $(this).parents('.wrap').find('.forward').removeClass('zero'); 
            }
        }else{
            $(this).parents('.wrap').find('.back').addClass('zero'); 
            $(this).parents('.wrap').find('.forward').addClass('zero'); 
        }
    });
}

//$(".forward").hover(goright,stop);
//$(".back").hover(goleft,stop);
/*$(".forward").on('click',function(){
      $('.thumbs').animate({scrollLeft:'+=40'}, 200, 'linear');
});
$(".back").on('click',function(){
      $('.thumbs').animate({scrollLeft:'-=40'}, 200, 'linear');
});*/

function shiftForwardBtn(){
	$('.forward').each(function(index, element) {
		var c = $(this).parent().find('.content');
		var newW = $(c).position().left + $(c).width() - $(this).outerWidth();
		$(this).css({left:newW});
    });
}

function respondTable(){
    $('table').each(function(){
        $(this).wrap('<div class="wrap table"></div>');
		$(this).wrap('<div class="content"></div>');
        $(this).parents('.wrap').prepend(' <div class="back control"></div><div class="forward control"></div>')
    });
    assignClasses();
	shiftForwardBtn();
    $(window).resize(assignClasses);
	$(window).resize(shiftForwardBtn);
	
	$(".forward").on('mousedown',goright);
	$(".back").on('mousedown',goleft);	
	$(".forward, .back").on('mouseup',stop);
	
	$(".forward").on('touchstart',goright);
	$(".back").on('touchstart',goleft);
	$(".forward, .back").on('touchend',stop);
	resetTableHeight();	
}
function resetTableHeight(){
	$('.forward, .back').each(function(element,index){
		var padd = $(this).outerHeight() - $(this).height();
		var h = $(this).parent().find('table').height() - padd;
		$(this).height(h);
	});
}
