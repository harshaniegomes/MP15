<?php
/**
* The Header for our theme
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" /> 
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/normalize.css?version=1.0" />
    
    <script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.masonry.min.js"></script>
	
        
	<?php wp_head(); ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script> 
    <script src="<?php echo get_template_directory_uri(); ?>/js/agenda_tabs.js"></script>   
	<!--[if (lt IE 10)]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style_ie.css" /> 
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>    
        <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>         
	<![endif]-->
    <!--[if (gte IE 6)&(lte IE 8)]>
    	<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>   
    <![endif]--> 
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.selectbox-0.2.min.js"></script>   	
	<script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>

<!-- script for PODs -->	
<script src="http://www.gsma.com/aboutus/wp-content/themes/GSMA2013/js/bootstrap.js"></script>
<script>
(function($){ 
  $(document).ready(function(){	     
			
	$(".mod").on("click", function () {	
	     var fresh_title = $(this).find("h3").text();
		 var fresh_image = $(this).find("img").prop("src");
		 var fresh_img_alt = $(this).find("img").prop("alt");
		 var fresh_img_title = $(this).find("img").prop("title");
		 var fresh_cont = $(this).find(".full_desc").text();
		 
		 $(".modal-header h3").text(fresh_title);
		 $(".modal-body").find("img").prop("src",fresh_image);
		 $(".modal-body").find("img").prop("alt",fresh_img_alt);
		 $(".modal-body").find("img").prop("title",fresh_img_title);
		 $("#mod_cont").text(fresh_cont);
		 
		 $('#membermodal').modal();
		 
		 $('#membermodal .hide').css('display', 'block');
	 });	
	
	$('.modal-header .close').on("click", function() {
	    $('#bgwrap').css('overflow', 'hidden');
	});

  });

})(jQuery);

</script> 
<!-- END of script for PODs -->
    
</head>
<script> 
if(navigator.userAgent.match(/(iPad|iPhone|iPod)/g))
{
	(function(doc) {
  	var metas = doc.querySelectorAll('meta[name="viewport"]'),
    forEach = [].forEach;
  	function fixMetas(isFirstTime) {
   		var scales = isFirstTime === true ? ['1.0', '1.0'] : ['0.25', '1.6'];
   		forEach.call(metas, function(el) {
    		el.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
   		});
  	}
  	fixMetas(true);
  	doc.addEventListener('gesturestart', fixMetas, false);
	}(document));
}

function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}



jQuery(document).ready(function($) {




$(window).resize(function(){     
	$(".width-value").text(viewport().width);	
});
    
	 
	
	$('.has_child > a').on('click',function(event) {
		    event.preventDefault();
			var holder = $(this).next('ul');
			var parent_li = $(this).parent('li');
			if(holder.hasClass('expanded'))
			{
				holder.removeClass('expanded');
				parent_li.removeClass('slided');
			}
			else
			{				
				parent_li.addClass('slided');
				holder.addClass('expanded');				
			}
		
    });  
  


			// mobile menu 
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeft = document.getElementById( 'showLeft' ),	
				mask =  document.getElementById( 'mask' ),
				mobform = document.getElementById( 'mobile-form-holder' ),				
				desk_menu_item = $('.has_desk_child'),										
				body = document.body;
			
			showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( mask, 'active-mask' );				
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				classie.toggle( mobform, 'form-push' );
			};
			
			mask.onclick = function() {
				classie.toggle( showLeft, 'active' );
				classie.toggle( this, 'active-mask' );				
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				classie.toggle( mobform, 'form-push' );
			};
				
			$( '#primary-nav > ul > .has_desk_child > a').on('mouseenter',function(event) {	
				$('.has_desk_child').not($(this).parent('.has_desk_child')).removeClass('desk_item_open');					 
				$(this).parent('.has_desk_child').addClass( 'desk_item_open' );					  
			});	
			
			$( '#primary-nav > ul > .has_desk_child').on('mouseleave',function(event) {	
				$('.has_desk_child').removeClass('desk_item_open');	
			});
			  
			
			
			$('html,body').click(function() {
               $('.has_desk_child').removeClass('desk_item_open');		         
			});

			$('#primary-nav').click(function(event){
   				 event.stopPropagation();
			}); 
			
			
			
			$('.expandable:not(".inactive") > a').on('click',function(event) {
				event.preventDefault();	
				$('.expandable').not($(this).parent('.expandable')).removeClass('is_expanded');				 
				$(this).parent('.expandable').toggleClass('is_expanded');				 
			});	
			
			
			if( $('.alphabet').length > 0)
			{
				$('.alphabet > a').on('click',function(event) {
					event.preventDefault();					
					
					if($(this).hasClass('last'))
					{
						$('.list-exhibitors').removeClass('hide_list');		
					}
					else
					{
					var pressed_letter =  $(this).text();				    
					$('.list-exhibitors').each(function(){				
						if($(this).find('h5').text() == pressed_letter)
						{
						   $('.list-exhibitors').not($(this)).addClass('hide_list');
						   $(this).removeClass('hide_list');						  
						}
					});	 
					}
				});	
			}
			
			
			
			//set id by h3 to enable hash scroll
			$('.hashes').each(function(){				
				if($(this).find('h3').length > 0)
				{
				   $(this).attr('id',$(this).find('h3').text().replace(' ','_'));	  
				}
			});	 
			
			
			//scroll to hash if hash exists
			 if(window.location.hash) 
			 {
       			 var hashTag = $(window.location.hash);
    			 $('html,body').animate({scrollTop: hashTag.offset().top-20},'slow');	 
    		 }
			 
			 
			//tweets roll
			if($('.tweets-time').length > 0)
			{			
				$('.tweets-time').text($('.tweets-holder ul li:first').find('.posted_at').text());		 
			}
			
			$(".next_tweet").on('click',function(event){
					event.preventDefault(); 
					var items =  $(this).parent().find("li").length-1;
					
					if($(this).parent().find(".active_tweet").index() < items)
					{ 	
					 	
						$(this).parent().find(".active_tweet").fadeOut(function(){	
							$(this).removeClass("active_tweet");
							$(this).next("li").addClass("active_tweet").show();
							$('.tweets-time').text($(this).next("li").find('.posted_at').text());
						});
					}
			 });
			 $(".prev_tweet").on('click',function(event){
					event.preventDefault(); 
					if($(this).parent().find(".active_tweet").index() > 0)
					{
						$(this).parent().find(".active_tweet").fadeOut(function(){
					    	$(this).removeClass("active_tweet");
							$(this).prev("li").addClass("active_tweet").show();
							$('.tweets-time').text($(this).prev("li").find('.posted_at').text());
						});
					}
			 });
			 
			 
			 //home slider
			  $(".slider-box:not('.close_unfolded')").on('click',function(event){					
				if(!$(this).hasClass('unfold'))
				{
					$(".slider-box").not($(this)).removeClass('unfold').addClass('disabled_box');
					$(this).toggleClass('unfold');
					$(this).removeClass('disabled_box'); 
				}				
			 });
			 
			  
			 $(".close_unfolded").on('click',function(event){				 
				  event.stopPropagation();
				 $(this).parent().parent().parent().parent().parent().find('.slider-box').removeClass('unfold').removeClass('disabled_box');
				 
			 });
			
			
			//faqs search
			 
			$('#qaplus_searchform #qaplus_searchsubmit').click(function(event){
				event.preventDefault();
				$('.left-content').find('.final').remove();
				$('.qa-category').find('.faq-catname').hide();
				$('.qa-category').find('.qa-faq').hide();
    			var txt = $('#qasearch').val();
    			
				if(txt != "")
				{
				$('.qa-faq').each(function(){
					var s_title = $(this).find('.qa-faq-title').text();
					var s_cont = $(this).find('.qa-faq-answer p').text();
       				if((s_title.toUpperCase().indexOf(txt.toUpperCase()) != -1)  || (s_title.toUpperCase().indexOf(txt.replace('2','²').toUpperCase()) != -1) || (s_cont.toUpperCase().indexOf(txt.toUpperCase()) != -1)  || (s_cont.toUpperCase().indexOf(txt.replace('2','²').toUpperCase()) != -1) )
					{
           				$(this).parent().find('.faq-catname').show();
						$(this).show();
       				}	   
    			});
				if($('.left-content').find('.qa-faq:visible').length < 1)
				{		
					$('<h3 class="final">Selected criteria did not match any result.</h3>').insertBefore('.qa-category:first');
				}
				
				
				}
			    else
				{
					$('.left-content').find('.final').remove();
					$('.qa-category').find('.faq-catname').show();
				    $('.qa-category').find('.qa-faq').show();
				}
				
			});
			
			
			
//validations
$('.form_container .select').selectbox({effect: "fade",onOpen: function () {}, onClose: function () {} }); 
 	
$('.reset').on('click',function(){ $(this).parentsUntil('.form_container').find('.field').removeClass('invalid'); 
	$('input').parentsUntil('form').prop("checked",false);	   
	$('.select option').each(function(){
		    $(this).removeAttr('selected');
	}); 	
	$('.sbSelector').text($('.select option:first').text());	   
	$('.validJs').remove();
}); 
	

$('.browse').parent().children('input[type=file]').change(function(){		
	var file = $(this).val();
    var fileName = file.split("\\");
    $('.file_text').val(fileName[fileName.length-1]);
});
	
	
$('.browse').on('click',function(event){
   $(this).parent().children('input[type=file]').click();
   event.preventDefault();
});


   	
function validateSel(selector){
   $(".form_container").find(selector).each(function(){
	   
		
     if($(this).hasClass('mandatory'))	
     {
   		if($(this).val()=="")
   	 	{   
   	  	$(this).closest('.field').addClass('invalid');	 	   
   	  	$(this).parent().find('.validJs').remove();
   	  	$(this).parent().append("<div class='validJs errorJs errorSelect'></div>");	
   	  	var validForm = false;
   	 	}
   		else
   		{	
   	  	$(this).closest('.field').removeClass('invalid');	 
   	  	$(this).parent().find('.validJs').remove();
   	  	$(this).parent().append("<div class='validJs errorSelect'></div>");	
   		}		
   	
   		$(this).parent().find('.sbSelector').click(function(){	
   	    	$(this).parent().parent().find('.validJs').fadeOut(500,function(){
                $(this).parent().find('.validJs').remove();
   		 	});	   		
        });	
     }
   });	
}
   
function validateText(selector){		
   $(".form_container").find(selector).each(function(){	
     
     if($(this).hasClass('mandatory'))
     {	
   		if($(this).val()=="")
   	 	{
   	   
   	   	$(this).closest('.field').addClass('invalid');	 
   	   	$(this).parent().find('.validJs').remove();
   	   	$(this).parent().append("<div class='validJs errorJs'></div>");	
   	  	var validForm = false;
   	 	}
   		else
   		{ 	 
   	  	$(this).closest('.field').removeClass('invalid');	 
   	  	$(this).parent().find('.validJs').remove();
   	  	$(this).parent().append("<div class='validJs'></div>");	
   		}
   	
   	 	$(this).focus(function(){	
   	    	$(this).parent().find('.validJs').fadeOut(500,function(){
                $(this).parent().find('.validJs').remove();
   		 	});	   		
        });	
     }
   });	
}
   
function validateEmail(selector){
   $(".form_container").find(selector).each(function(){	
       if($(this).hasClass('mandatory'))
   	   {	
   	   	  if($(this).val()!="")
   	      {   			
             var pattern = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);                 
   			 if(pattern.test($(this).val())!=true)
   			 {
   			    $(this).closest('.field').addClass('invalid');	 
   	   			$(this).parent().find('.validJs').remove();
   	   			$(this).parent().append("<div class='validJs errorJs'></div>");	
   	  			var validForm = false;	
   			 }
   			 else
   			 {			
   			 	$(this).closest('.field').removeClass('invalid');	 
   			    $(this).parent().find('.validJs').remove();
   	  		    $(this).parent().append("<div class='validJs'></div>");
   			 }	
   		  }	
   			
   		  $(this).focus(function(){	
   	      	 $(this).parent().find('.validJs').fadeOut(500,function(){
          		  $(this).parent().find('.validJs').remove();
   		 	  });			
          });
       }   			
   });		
}
   
   
$(".form_container form").submit(function(event){
	
   	var validForm = false;
   		
   	validateSel('.select');
   	validateText('.answer input[type=text],.answer textarea');
   	validateEmail('.email');
	 var chkd = document.MPContactForm.eligible.checked || document.MPContactForm.nongovt.checked || document.MPContactForm.press.checked || document.MPContactForm.password.checked || document.MPContactForm.speaker.checked || document.MPContactForm.other.checked  ;
		
   	      
   	if( $(".invalid").length < 1 && chkd)
   	{
   	   validForm  = true;		
   	}
	
   	 
   	return validForm;	
});
			
			
         
});
</script>

<body <?php body_class(); ?>>


<h1 class="width-value" style="position: absolute; right: 0px; top: 0px; color:#666; display:none;"></h1>
<div class="form-holder" id="mobile-form-holder">
 
    <div class="search-holder-mobile">        
   
        <input class="search-field-mobile" value="MENU" readonly />       
    </div>
 
 <button id="showLeft" class="trigger-mobile"></button>	
</div>
<div class="mobile_nav cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
<!--<ul>
	<li><a href="#">About</a></li>
		<li><a href="#">See and do</a></li>
		<li class="has_child"><a href="#">Learn</a>
		<ul>
           <li class="has_child"><a href="#">Conference</a>
           	   <ul>
               	   <li><a href="#">Conference 1</a></li>
                   <li><a href="#">Conference 2</a></li>
                   <li><a href="#">Conference 3</a></li>
                   <li><a href="#">Conference 4</a></li>
                   <li><a href="#">Conference 5</a></li>
               </ul>	
           </li>
           <li><a href="#">GSMA Seminars</a></li>
           <li><a href="#">Industry news</a></li>
           <li><a href="#">Partner programmes</a></li>
       	</ul>
    </li>
    <li class="has_child"><a href="#">Attend</a>
    	<ul>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 1</a></li>
           <li><a href="#">Conference 2</a></li>
           <li><a href="#">Conference 2</a></li>           
       	</ul>
    </li>    
	<li><a href="#">Register</a></li>
  	<li><a href="#">Download the App</a></li>
   	<li><a href="#">My MWC</a></li>
</ul>-->
<?php
class Mobile_Walker extends Walker_Nav_Menu
{
   
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
 
       
        $parent_li = 'menu-item-has-children';
		if(in_array($parent_li,$element->classes))
		{
			$element->classes[] = "has_child";
		}
				 
        parent::display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output );
    } 
}

 
	
$menu_args = array(
	'theme_location'  => '',
	'menu'            => 'menu-primary-nav',
	'container'       => '',
	'container_class' => 'sub',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new Mobile_Walker()
  
);
wp_nav_menu( $menu_args );

?> 
<div class="nav-bottom"></div>
</div>

<div id="page" class="<?php echo get_bloginfo("language"); ?>">	
    <div id="header">    	
        	<div class="header-top">
            	<div class="container">
                	<div class="above-links">
                    	<?php do_action('icl_language_selector'); ?>
                        <div class="left-corner"></div>
                        <div class="right-corner"></div>
                        
                           
                        
                    </div>
                    
                    <h1 class="logo"><span><?php bloginfo( 'name' ); ?></span>
                    	<a href="<?php echo home_url(); ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" href=""></a>
                    </h1>
                    
                    <div class="header-map"></div>
                    <div class="innovation-splash">                    	
                        <div class="innovation-deco"></div>
                    	<div class="deco1"></div>
                    	<div class="deco2"></div>
                    	<div class="deco3"></div>
                    </div>
                </div>
            </div>
            
            <div class="main-nav">
            	<div class="container" id="primary-nav">
                	<!--<ul>
                    	<li><a href="#">ABOUT</a>  </li>
                        <li><a href="#">SEE & DO</a></li>
                        <li class="has_desk_child"><a href="#">LEARN</a>
                       		<ul>
                            	<li><a href="#">Conference</a>
                                	<ul>
                    					<li><a href="#">Conference Overview</a></li>
                       					<li><a href="#">Keynote Speakers</a></li>
                        				<li><a href="#">Industry Learning</a></li>
                                        <li><a href="#">Agenda</a></li>
                                        <li><a href="#">Call for Papers</a></li>
                                        <li><a href="#">Conference Presentations</a></li>                                        
                                
                                		<li class="desk_parent"><a href="#">GSMA Seminar</a></li>
                                		<li class="desk_parent"><a href="#">Industry New</a></li>
                                	 
                    					<li><a href="#">Mobile World Daily</a></li>
                       					<li><a href="#">Mobile World Live TV</a></li> 
                                    </ul>                                
                                </li>
                                
                                <li><a href="#">Partner Programmes</a>
                                	<ul>
                    					<li><a href="#">Acision</a></li>
                       					<li><a href="#">AirWatch</a></li>
                        				<li><a href="#">CA Technologies</a></li>
                                        <li><a href="#">Car Connectivity Consortium</a></li>
                                        <li><a href="#">ClickSoftware</a></li>
                                        <li><a href="#">Dolby</a></li>    
                                        <li><a href="#">ECHAlliance</a></li>    
                                        <li><a href="#">EyeForTravel</a></li>    
                                        <li><a href="#">Fastback Networks</a></li>    
                                        <li><a href="#">GTI</a></li>                                         
                                    </ul>     
                                </li>        
                                
                                <li>
                                	<ul>           
                                        <li><a href="#">HP</a></li>    
                                        <li><a href="#">Huawei</a></li>    
                                        <li><a href="#">IBM MobileFirst</a></li>    
                                        <li><a href="#">LTE McCann Worldgroup</a></li>    
                                        <li><a href="#">Mobile Media Summit</a></li>    
                                        <li><a href="#">Mobile Security Forum</a></li>    
                                        <li><a href="#">Mobile World Capital</a></li>    
                                        <li><a href="#">mPI Keynotes</a></li>    
                                        <li><a href="#">NAB Show</a></li>    
                                        <li><a href="#">Nokia</a></li>    
                                        <li><a href="#">Open Mobile Alliance</a></li>
                                        <li><a href="#">HP</a></li>    
                               	   </ul>     
                                </li>        
                                   
                                <li>
                                	<ul>     
                                        <li><a href="#">Huawei</a></li>    
                                        <li><a href="#">IBM MobileFirst</a></li>    
                                        <li><a href="#">LTE McCann Worldgroup</a></li>    
                                        <li><a href="#">Mobile Media Summit</a></li>    
                                        <li><a href="#">Mobile Security Forum</a></li>    
                                        <li><a href="#">Mobile World Capital</a></li>    
                                        <li><a href="#">mPI Keynotes</a></li>    
                                        <li><a href="#">NAB Show</a></li>    
                                        <li><a href="#">Nokia</a></li>    
                                        <li><a href="#">Open Mobile Alliance</a></li>                                    
                                     </ul>     
                                </li>
                                
                            </ul> 
                        </li>
                        
                        <li class="has_desk_child"><a href="#">ATTEND</a>
                        	<ul>   
                               <li><a href="#">Conference</a>

                                	<ul>
                    					<li><a href="#">Conference Overview</a></li>
                       					<li><a href="#">Keynote Speakers</a></li>
                        				<li><a href="#">Industry Learning</a></li>
                                        <li><a href="#">Agenda</a></li>
                                        <li><a href="#">Call for Papers</a></li>
                                        <li><a href="#">Conference Presentations</a></li>                                        
                                
                                		<li class="desk_parent"><a href="#">GSMA Seminar</a></li>
                                		<li class="desk_parent"><a href="#">Industry New</a></li>
                                	 
                    					<li><a href="#">Mobile World Daily</a></li>
                       					<li><a href="#">Mobile World Live TV</a></li> 
                                    </ul>                                
                                </li>
                            </ul>   
                        </li>
                        
                        <li><a href="#">INTERACT</a></li>
                    </ul>-->
                    
<?php
class Desktop_Walker extends Walker_Nav_Menu
{
   
    
		
		 function display_element( $element, &$children_elements, $max_depth, $depth=0, $args = array(), &$output ) {
        		 $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        		 $display_depth = ( $depth); // because it counts the first submenu as 0

		
        		$parent_li = 'menu-item-has-children';
	
				if( $display_depth == 0 && in_array($parent_li,$element->classes))      
				{
					$element->classes[] = "has_desk_child is-".$display_depth;
					
				}
				if( $display_depth == 1)      
				{
					$element->classes[] = "menu-item-has-children";
					
				}		 
         parent::display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output );
		
		 
    } 
		
		
		
}
  	 

$menu_args = array(
	'theme_location'  => '',
	'menu'            => 'menu-primary-nav',
	'container'       => '',
	'container_class' => 'sub',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new Desktop_Walker()
  
);
wp_nav_menu( $menu_args );

?>                    
                     
                    
                </div>
            </div>
        </div>
    </div>
	
 
 
 