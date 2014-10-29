<?php
/**
Template Name: Speakers Page
*/

get_header(); ?> 
<?php
$currentPageID = $post->ID;	   
$menu_items = wp_get_nav_menu_items(4);
	
foreach( $menu_items as $item ):
if(get_post_meta( $item->ID, '_menu_item_object_id', true )==$currentPageID)
{
	
	$current_menu_item=$item->ID;
	$parent_menu_item= $item->menu_item_parent;
	
}
$count++; endforeach;

if($parent_menu_item)
	{	
	$same_level_array = array();
	foreach( $menu_items as $item ):
	if($item->menu_item_parent==$parent_menu_item)
		{
		array_push($same_level_array, $item->ID);
		}
	$count++; endforeach;
	}
	else
	{
	$same_level_array = array();
	foreach( $menu_items as $item ):
	if($item->menu_item_parent=="0" && $current_menu_item)
		{
		array_push($same_level_array, $item->ID);
		}
	$count++; endforeach;
	}
$children_array = array();
foreach( $menu_items as $item ):
	if($item->menu_item_parent==$current_menu_item)
		{
		array_push($children_array, $item->ID);
	}
$count++; endforeach;

function my_breadcrumb($theme_location = 'main', $separator = ' &gt; ') {

    $items = wp_get_nav_menu_items($theme_location);
    _wp_menu_item_classes_by_context( $items ); // Set up the class variables, including current-classes
    $crumbs = array();

    foreach($items as $item) {
        if ($item->current_item_ancestor ) {
            $crumbs[] = "<a href=\"{$item->url}\" title=\"{$item->title}\">{$item->title}<span>&gt;</span></a>";
        }
    }
    echo implode("", $crumbs);
}
?>
<div id="content" class="page-default">
    	<div class="featured">	
            <div class="container">  
            <?php if($post->ID!="1260")  { ?> 	
        		<div class="featured_holder">                	    
        			<div class="featured_image">                    	
						<?php
						if ( has_post_thumbnail() ) 
						{ 
  						  the_post_thumbnail('full'); 
                        } 
						else
						{
					    ?>
							<img src="<?php bloginfo('template_directory'); ?>/images/featured.jpg" />   
						<?php
                        }						
						?>
                         <div class="honeycomb"></div>
                        <div class="tint"></div>
                        
                        
                		
                        
                          <?php
	$attachment_id = get_post_meta($post->ID, "action_image", 1);
	$attachment_image = wp_get_attachment_image_src( $attachment_id, "full" );
	$action_title = get_post_meta($post->ID, "action_title", 1);
	$action_url = get_post_meta($post->ID, "action_url", 1);
	$action_target = get_post_meta($post->ID, "action_target", 1);
	if($action_title)
	{?>
   
		<div class="featured_wrap">
                        	<!--<h2 class="featured_title">Inside Mobile</h2>
                    		<span class="featured_small_title">McCann Worldgroup</span>-->
                    		<div class="featured_logo">
                    			<img src="<?php echo $attachment_image[0]; ?>" />                                
                    		</div>    
                            <a target="<?php echo $action_target; ?>" href="<?php echo $action_url; ?>" class="featured_action"><span><?php echo $action_title; ?></span><div class="corner"></div></a>                		
            			</div>
                        <?php						
	}
	if($attachment_image)
	{
		echo ' <a title="'.get_the_title().'" alt="'.get_the_title().'" target="_blank" href="'.get_post_meta($post->ID, "partner_url", 1).'"><img src="'.$attachment_image[0].'"/></a> ';
	}
	
	

?>
                        
                        
                    </div>
                    <div class="page_cdeco1"></div> 
                    <div class="page_cdeco2"></div> 
            	</div>
                <?php } ?>
         	</div>
        </div>
        
    	<div class="container">
	
        	<div class="left-content">                  
                <div class="fill">
                	<h1 class="main-heading"><?php the_title(); ?></h1>
                    <span class="grey_gap"></span>
                    <?php 				
while ( have_posts() ) : the_post();
the_content();
endwhile;

$programmes_key = "field_54118f858f0f6"; // key of speaking_programme field
$programmes_field = get_field_object($programmes_key);
$list_of_programmes = array_keys($programmes_field['choices']); // we have the posible choiches

foreach($list_of_programmes as $programme) 
{
	$speakers_args = array(
	'numberposts' => -1,
	'posts_per_page' => -1,	
	'post_type' => 'keynote-speaker', 
	'orderby'  => 'menu_order',
	'order'  => 'ASC',
	'post_status' => array('publish'), 
	'suppress_filters' => TRUE,
	'meta_key' => 'speaking_programme',
	'meta_value' => $programme
	);	
	$speakers_posts = get_posts( $speakers_args );
	
	if($speakers_posts)
	{
		echo "<div class='speakers_wrap'><h2 class='speakers_tag'>".$programme."</h2>";
		
		foreach($speakers_posts as $post)
		{ 		
		?>
		<div class="speaker">
            <div class="speaker-circle">
            <?php
            	if( get_field('speaker_photo') )
				{
					 $speaker_photo =  get_field('speaker_photo');
					 echo "<img src='".$speaker_photo['url']."' />";
				}	
			?>
            </div>
			<span class="speaker_name"><?php the_title(); ?></span>
            <p class="speaker_position"><?php if( get_field('speaker_position') ){ echo get_field('speaker_position'); }?></p>
            <span class="speaker_department"><?php if( get_field('department_division') ){ echo get_field('department_division'); }?></span>
		</div>	
		<?php			
    	}		
		echo "</div>"; // end speakers_wrap 	  
	}		
	
}
?>
 
                </div>
                <div class="page_cdeco3"></div> 
                <div class="page_cdeco4"></div>    
                <div class="page_cdeco5"></div> 
                <div class="page_cdeco6"></div>                 
            </div><!--end left content-->
            
            
             
            <div class="right-content"><!--start right content-->
            
            	<div class="sidebar-box">
                	<div class="sidebar-title">
                    
                
<?php
echo '<div class="bread"><a href="'.home_url().'">Home</a>';
my_breadcrumb('primary-nav'); 
echo '</div> ' ;
echo '<h1>'.get_the_title( $currentPageID ).'</h1></div>';

echo "<ul class='side-menu'>";

if($children_array)
{}
else
{
if($current_menu_item){
	$parentID=get_post_meta( $parent_menu_item, '_menu_item_object_id', true );
echo "<li class='current_page_item_parent'><a href='".get_permalink($parentID)."'>".get_the_title( $parentID )."</a>";
		echo "<ul class='children'>";
}
}

for($i=0;$i<count($same_level_array);$i++)
{
	$page_id = get_post_meta( $same_level_array[$i], '_menu_item_object_id', true );
	$page_title= get_the_title( $page_id );
	$page_url =get_permalink( $page_id);
	if($same_level_array[$i]==$current_menu_item)
	{

		if($children_array)
		{
			
			echo "<li class='current_page_item'><a href='".$page_url."'>".$page_title."</a>
			<ul class='children'>";
			for($j=0;$j<count($children_array);$j++)
{
	$page_id_child = get_post_meta( $children_array[$j], '_menu_item_object_id', true );
	$page_title_child= get_the_title( $page_id_child );
	$page_url_child =get_permalink( $page_id_child);
    echo "<li><a href='".$page_url_child."'>".$page_title_child."</a><li>";
}
			echo "</ul></li>";
		}
		else	
		{
		
		echo "<li class='current_page_item'><a href='".$page_url."'>".$page_title."</a><li>";
		}
	
	}
	else
	{
		
echo "<li><a href='".$page_url."'>".$page_title."</a><li>";		
	
	}
	
	
	
}
echo "</ul>";
?>  
                    </ul>
                </div>   
                
                                                
                <div class="sidebar-box">
                	<div class="sidebar-title">
                    	<h1>TALK ABOUT #MWC15</h1>                        
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
                
               
                
                <div class="sidebar-box">
                	<a class="item-wrap" href="/attend/travel/hotels/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Book Your Hotel</span><div class="corner"></div></div>                        
                    </a>
                </div>  
                 <div class="sidebar-box">
                	<a class="item-wrap" href="/about/about-mwc/2014-event-highlights/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-highlights.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Read 2014 Highlights</span><div class="corner"></div></div>                        
                    </a>
                </div>   
                
                
        
        
                
             <div class="sidebar-box">
                	<div class="sidebar-title-box">
                    	<h1>Get updates</h1>
                        <a href="/interact/get-in-touch/subscribe-to-emails/" class="sidebar-updates"></a>
                    </div>             
                </div>    
                            
            </div> <!--end right content-->
            
        </div>
    </div>
    
    <span class="after_content_gap"></span>
<?php
get_footer();