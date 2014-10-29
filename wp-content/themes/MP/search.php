<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
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
        		<div class="featured_holder">                	    
        			<div class="featured_image">                    	
						
						<img src="<?php bloginfo('template_directory'); ?>/images/featured_search.jpg" />   
						
                        <div class="honeycomb"></div>
                        <div class="tint"></div>
                    </div>
                    <div class="page_cdeco1"></div> 
                    <div class="page_cdeco2"></div> 
            	</div>
         	</div>
        </div>
        
    	<div class="container">
        	<div class="left-content"><!--start left content-->                                
                <div class="fill">
                	<h1 class="main-heading">Search results</h1>
                    <span class="grey_gap"></span>
                    <gcse:searchresults-only linktarget="_parent" queryParameterName="s"  noResultsString="Uh oh! Seams like your searching criteria didn't match any result!" webSearchResultSetSize="10" enableOrderBy="0" enableImageSearch="0"></gcse:searchresults-only>
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
echo '<div class="bread"><a href="'.home_url().'">Home</a><a title="Search" href="#">Search<span>&gt;</span></a></div> ';
  

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
