<?php
/**
Template Name: Homepage
*/

get_header(); ?>
  
        <div id="slider">
        <div class="slider-relate">
    	<div class="container">
        	<div class="main-slider">
             <?php
			// grab soliloquy shortcode if any
            $pattern = get_shortcode_regex();
			preg_match('/'.$pattern.'/s', $post->post_content, $matches);
			if (is_array($matches) && $matches[2] == 'soliloquy') 
			{   			   
			    
			   $shortcode = $matches[0];
   			   echo do_shortcode($shortcode);
			}
            ?>                        
            
            
			<?php 
			// now prevent soliloquy from showing in content
			add_shortcode( 'soliloquy', '__return_false' ); 
			?>
              
            </div>
        </div><!-- end svontainer -->                 
        </div><!-- end slider relate -->          
    </div><!-- end slider --> 
     
   
    <div id="content">
    	<div class="container"> 
           
            
             
            <div class="left-content">
            
          
            	<div style="padding:20px;background:#FFF; float:left; margin-bottom:10px;">      
            <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
            	</div>	 
            	
            
        
            <?php
			$box_items = get_field('box_item');			
			?>
            	<?php if( $box_items ): 
						 foreach( $box_items as $box_item ): ?>
								
                                <div class="content-box">
                	<a href="<?php echo get_permalink( $box_item->ID ); ?>"><h1 class="connt-box-title"><?php echo get_the_title( $box_item->ID ); ?></h1>
                    <div class="tint"></div>
                    <?php 
					$boximg=wp_get_attachment_image_src(get_post_thumbnail_id($box_item->ID), "medium");
					?>
                    <img class="normal-state" src="<?php echo $boximg[0]; ?>"><span class="box-arrow"></span></a>
                </div>
						<?php endforeach; endif; ?>

            	
            </div>
            
            
            <div class="right-content"><!--start right content-->
            
            	
               <div class="sidebar-box tweets">
                	<div class="sidebar-title">
                    	<span class="small-logo-tweets"><img src="<?php bloginfo('template_directory'); ?>/images/gsma_small_logo_tw.png" /></span>
                        <h1>@GSMA<span style="text-transform:none;">Policy</span></h1>
                        <span class="tweets-time">37m</span>
                    </div>
                    <div class="tweets-holder">
                    	<a href="#" class="next_tweet"></a> 
                    	<a href="#" class="prev_tweet"></a> 
                		<ul>
                    		
<?php

require(get_template_directory().'/mytwit.inc.php'); // the file to tweets feed generator  
						 
$tFeed = new MyTwit;
$tFeed->TwitterUser = 'GSMAPolicy';
$tFeed->TWITTER_CONSUMER_KEY = 'yqYAyy91Kfvr7mseGlSzA';
$tFeed->TWITTER_CONSUMER_SECRET = 'Qeygl0vfBPg48UJdfFnSwmkeNVlz6jZimxCrcV6mStA';
$tFeed->TWITTER_OAUTH_ACCESS_TOKEN = '338299268-6OaR0ZcYSqSaaHDzsPiRgP7rWkWGpZEqpfsGhqCJ';
$tFeed->TWITTER_OAUTH_ACCESS_TOKEN_SECRET = 'm6MaqDnC5l4EV5F4WBcS4bmpNGwa6yzjPrpDZLiVLwsWy';
$tFeed->PostLimit = 5;
// $tFeed->ExcludeReplies = true;
$tFeed->UpdateCache();
					  
if ($tFeed->ErrorMessage) {	
?>	
	 <li><p>Error processing twitter <br>  <?php echo $tFeed->ErrorMessage; ?></p></li> 	
<?php
} 

else 
{
$x=0;
foreach ($tFeed->Tweets as $tweet) {
$x++; 
?>                               
                    
<li class="<?php if ($x=="1"){echo "active_tweet"; } ?>">     					
    <p>
        <?php echo $tweet['MyText']; ?></br><?php echo 'by <a href="https://twitter.com/'.$tFeed->TwitterUser.'/status/'.$tweet['id_str'].'" rel="nofollow">'.$tFeed->TwitterUser.'</a> '; ?>	
    </p>   
    <p>  <a target="_blank" style=" font-size:13px;" href="<?php echo 'https://twitter.com/'.$tFeed->TwitterUser.'/status/'.$tweet['id_str']; ?>">See this tweet</a></p>
    <div class="posted_at" style=" display:none;"><?php echo $tweet['MyTimeAgo'];?></div>		
    
</li> 
                     
 <?php
} // end foreach

 
}  // end else
?>  
         
                    	</ul>  
                    </div>                      
                </div>  
                
                <div class="sidebar-box">
                	<div class="sidebar-title">
                    	<h1>#MWC15MP</h1>                        
                    </div>    
                	<ul>
                    	<li>                        	
                            <a target="_blank" href="http://www.facebook.com/mobileworldcongress" class="social-facebook"></a>
            				<a target="_blank" href="https://twitter.com/gsma" class="social-twitter"></a>
                            <a target="_blank" href="http://www.linkedin.com/groups/GSMA-Mobile-World-Congress-Official-1180367" class="social-in"></a>            
                            <a target="_blank" href="https://plus.google.com/116958587340076007346/posts" class="social-google"></a>
                        </li>
                    </ul>                        
                </div> 
               <?php
			    $current_lang = strtolower(end(explode("-",get_bloginfo("language"))));
				 if($current_lang == "es") 
				 {					  
				 ?>
                <div class="sidebar-box">
                	<a class="item-wrap" target="_blank" href="http://minister2015.b-network.com/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Reserve su hotel</span><div class="corner"></div></div>                        
                    </a>
                </div>    
                         
                        <?php }
						else if($current_lang == "fr") 
						{
							?>  
                             <div class="sidebar-box">
                	<a class="item-wrap" target="_blank" href="http://minister2015.b-network.com/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Réservez votre Hôtel</span><div class="corner"></div></div>                        
                    </a>
                </div>   
                  <?php }
						else
						{
							?>  
                              <div class="sidebar-box">
                	<a class="item-wrap" target="_blank" href="http://minister2015.b-network.com/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Book Your Hotel</span><div class="corner"></div></div>                        
                    </a>
                </div>  
                            <?php } ?>                                 
            </div> <!--end right content-->
            
            <div class="cdeco1"></div>  
            <div class="cdeco2"></div>
            <div class="cdeco3"></div>      
            <div class="cdeco4"></div>         
        </div>
    </div>
     
     
<?php
get_footer();
