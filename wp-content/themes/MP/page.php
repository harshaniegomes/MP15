<?php
/**
* The template for displaying all default pages
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
<?php if($post->ID!="1260")  { ?> 	
        	<div class="left-content">
<?php } 
else
{
?>
<div class="left-content" style="margin-top:-400px;">
<?php
}
?>                   
                <div class="fill">
                	<h1 class="main-heading"><?php the_title(); ?></h1>
                    <span class="grey_gap"></span>
                    
                    
					<?php
						if( is_page('tooltip-test')) //customize Adgenda page/posts
						{ ?>
                        	<span class="test"></span>
                            
                            <?php
                             echo "<style>.ecmmember{height:250px;cursor:pointer;} .ecmmember > p {margin-bottom: 0;}</style>";
			
                                // do board_members pod 
                                echo "<div class='clear' style='height:5px;'></div>";	
                                echo "<div class='members'>";	                    
                                               
                                echo "</div>"; 
                                echo "
                                <div class='modal hide' id='membermodal'  aria-hidden='true' aria-labelledby='membermodal' role='dialog' tabindex='-1'>
                                    <div class='modal-header'>
                                        <button class='close' data-dismiss='modal'></button>
                                        <h3>Modal header</h3>
                                    </div>
                                    <div class='modal-body'>
                                        <p> 
                                        <div class='circle' style='float:left; margin-right:10px;'>
                                        <img src='' width='115' height='130' alt='' title=''>
                                        </div>
                                        <span id='mod_cont'></span>
                                        </p>
                                    </div>
                                    <div class='modal-footer'>   
                                    GSMA 
                                    </div>
                                </div>";						
                   
						}
					?>


<?php 				
// Start the Loop.
while ( have_posts() ) : the_post();


if($post->ID=="1113") //customize 2014-exhibitors page
{
	?>
<style>
.sc-view{ width:100%; float:left; margin:0 0 20px 0; padding:0;} 
.sc-view .field-wrapper{ width:100%; float:left;margin:0; padding:0;}
.sc-view .field-wrapper label{font-family: "proxima_nova_rgregular","Trebuchet MS", Arial, Helvetica, sans-serif;font-size: 16px;color: #333; float:left; width:30% !important; margin-right:5%;}
.sc-view .inner-field{ float:left; width:65%; line-height:25px;}
.sc-view .field-wrapper input[type="text"], .sc-view .field-wrapper textarea { float:left; padding: 9px 4.5% !important;width: 90% !important; border-radius:0 !important; background:#fff; color:#333 !important; border:solid 1px #ccc; }
.sc-view .field-wrapper input[type="file"]{ float:left; padding:  9px 4.5% !important;width: 90% !important; padding:  9px 0\0 !important;width: 100%\0 !important; border-radius:0 !important; background:#fff !important; color:#333 !important;  border:solid 1px #ccc; }

.sc-view input[type="checkbox"], .sc-viewinput[type="radio"] { border: none !important; float:left; margin: 7px 20px 0 0; clear: both;}
.sc-view input[type="reset"], .sc-view input[type="submit"] {cursor: pointer; float:left;font-family: "proxima_novasemibold","Trebuchet MS", Arial, Helvetica, sans-serif;font-size: 20px;color: #fff; background:#E7313B; text-transform:uppercase; border:0 none;line-height: 42px;padding: 0 30px;-webkit-transition: background-color 0.4s;	-moz-transition: background-color 0.4s; 	-ms-transition: background-color 0.4s; 	-o-transition: background-color 0.4s; transition: background-color 0.4s;}
.sc-view input[type="reset"]:hover, .sc-view input[type="submit"]:hover,.sc-view input[type="reset"]:focus,.sc-view input[type="submit"]:focus{color:#fff; background:#D32B33;}


</style>
<form class="validatethis" enctype="multipart/form-data" method="post" action="http://www.response-o-matic.com/mail.php" accept-charset="UTF-8" target="_blank"><input type="hidden" name="acctid" id="acctid" value="oxx8yc11vpr6xl9s"><input type="hidden" name="formid" id="formid" value="1246072"><input type="hidden" name="required_vars" id="required_vars" value="field-819856e2d803440,name,field-2e34658c71df008,field-9a34da304fa0b81,email,field-1f5438a470245d4,field-01d6058a77e510f,field-57cfb5c9231b06a,field-557523ebd9cf6e3,field-0d609d1f7176b07,field-65f8f8ad88caf58,field-8fa9a2e405b583c,field-5b5fddc5dd5ba82,field-9951b5380d090ec,field-2fc56f3971abddb,field-10f255f6e7fa407,field-0bb194af524375a"><div id="formElement0" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Title *</label><span class="inner-field">
				<input type="text" name="field-819856e2d803440" id="field-819856e2d803440" size="40" value="">
				
			</span></div></div><div id="formElement1" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Name: *</label><span class="inner-field">
				<input type="text" name="name" id="name" size="40" value="">
				
			</span></div></div><div id="formElement2" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Company Name *</label><span class="inner-field">
				<input type="text" name="field-2e34658c71df008" id="field-2e34658c71df008" size="40" value="">
				
			</span></div></div><div id="formElement3" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Job Title *</label><span class="inner-field">
				<input type="text" name="field-9a34da304fa0b81" id="field-9a34da304fa0b81" size="40" value="">
				
			</span></div></div><div id="formElement4" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Email Address: *</label><span class="inner-field">
				<input type="text" name="email" id="email" size="40" value="">
				
			</span></div></div><div id="formElement5" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Telephone (Including Country Code) *</label><span class="inner-field">
				<input type="text" name="field-1f5438a470245d4" id="field-1f5438a470245d4" size="40" value="">
				
			</span></div></div><div id="formElement6" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Proposed Speaker's Name *</label><span class="inner-field">
				<input type="text" name="field-01d6058a77e510f" id="field-01d6058a77e510f" size="40" value="">
				
			</span></div></div><div id="formElement7" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Proposed Speaker's Company *</label><span class="inner-field">
				<input type="text" name="field-57cfb5c9231b06a" id="field-57cfb5c9231b06a" size="40" value="">
				
			</span></div></div><div id="formElement8" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Propsed Speaker's Job Title *</label><span class="inner-field">
				<input type="text" name="field-557523ebd9cf6e3" id="field-557523ebd9cf6e3" size="40" value="">
				
			</span></div></div><div id="formElement9" class="sc-view form-design-field sc-static-layout sc-regular-size validate"><div class="field-wrapper"><label>Proposed Speaker's Email Address *</label><span class="inner-field">
				<input type="text" name="field-0d609d1f7176b07" id="field-0d609d1f7176b07" size="40" value="">
				
			</span></div></div><div id="formElement10" class="sc-view form-design-field sc-static-layout sc-regular-size area validate"><div class="field-wrapper"><label>Submission Title *</label><span class="inner-field">
				<textarea name="field-65f8f8ad88caf58" id="field-65f8f8ad88caf58" rows="6" cols="40"></textarea>
				
			</span></div></div><div id="formElement11" class="sc-view form-design-field sc-static-layout sc-regular-size area validate"><div class="field-wrapper"><label>Abstract: Provide a short summary of your submission (1000 characters) *</label><span class="inner-field">
				<textarea name="field-8fa9a2e405b583c" id="field-8fa9a2e405b583c" rows="6" cols="40"></textarea>
				
			</span></div></div><div id="formElement12" class="sc-view form-design-field sc-static-layout sc-regular-size area validate"><div class="field-wrapper"><label>Submission: Include an outline that describes how you will cover your subject, including useful detailed technical information and samples of any other components you plan to include (limit 4000 characters). *</label><span class="inner-field">
				<textarea name="field-5b5fddc5dd5ba82" id="field-5b5fddc5dd5ba82" rows="6" cols="40"></textarea>
				
			</span></div></div><div id="formElement13" class="sc-view form-design-field sc-static-layout sc-regular-size checkgroup validate"><div class="field-wrapper"><label>Topic Area *</label><span class="inner-field">
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_0" value="5G"> 5G<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_1" value="Advertising/Marketing"> Advertising/Marketing<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_2" value="Agriculture"> Agriculture<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_3" value="Applications Development"> Applications Development<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_4" value="Automotive"> Automotive<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_5" value="Big Data"> Big Data<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_6" value="BSS/OSS"> BSS/OSS<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_7" value="Business Transformation"> Business Transformation<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_8" value="Cloud Services"> Cloud Services<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_9" value="Commerce/Payment"> Commerce/Payment<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_10" value="Connecting the Unconnected"> Connecting the Unconnected<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_11" value="Contactless Technologies"> Contactless Technologies<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_12" value="Converged Networks &ndash; the impact of content delivery and service decisions"> Converged Networks &ndash; the impact of content delivery and service decisions<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_13" value="Customer Behaviour/Intelligence"> Customer Behaviour/Intelligence<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_14" value="Cutting-Edge Technologies"> Cutting-Edge Technologies<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_15" value="Devices"> Devices<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_16" value="Economic/Societal Impact of Mobile"> Economic/Societal Impact of Mobile<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_17" value="Education"> Education<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_18" value="Enterprise"> Enterprise<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_19" value="Future of&hellip; Communications Services"> Future of&hellip; Communications Services<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_20" value="Gaming"> Gaming<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_21" value="Government"> Government<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_22" value="Health"> Health<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_23" value="Home Automation"> Home Automation<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_24" value="Identity/Privacy"> Identity/Privacy<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_25" value="Imaging"> Imaging<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_26" value="Joint Ventures/M&amp;A/ Partnerships"> Joint Ventures/M&amp;A/ Partnerships<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_27" value="Location Based Services &ndash; including marketing, embedded, social"> Location Based Services &ndash; including marketing, embedded, social<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_28" value="M2M &amp; the Internet of Things"> M2M &amp; the Internet of Things<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_29" value="Media &amp; Entertainment"> Media &amp; Entertainment<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_30" value="Mobile Broadband"> Mobile Broadband<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_31" value="Mobile Innovation"> Mobile Innovation<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_32" value="Network Capacity"> Network Capacity<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_33" value="Next Generation Networks"> Next Generation Networks<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_34" value="Network Management Strategies"> Network Management Strategies<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_35" value="Open Web"> Open Web<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_36" value="OS Ecosystems"> OS Ecosystems<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_37" value="Regional Focus"> Regional Focus<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_38" value="Retail"> Retail<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_39" value="Security"> Security<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_40" value="Segmentation/Pricing"> Segmentation/Pricing<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_41" value="Smart Cities"> Smart Cities<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_42" value="Spectrum"> Spectrum<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_43" value="Supply Chain Mobilisation"> Supply Chain Mobilisation<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_44" value="Traditional vs. Emerging Business Models"> Traditional vs. Emerging Business Models<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_45" value="Utilities"> Utilities<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_46" value="Venture Capital in Mobile"> Venture Capital in Mobile<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_47" value="Video"> Video<br>
				<input type="checkbox" name="field-9951b5380d090ec[]" id="field-9951b5380d090ec_48" value="Wearable Technology"> Wearable Technology<br>
				
			</span></div></div><div id="formElement14" class="sc-view form-design-field sc-static-layout sc-regular-size area"><div class="field-wrapper"><label>If you would like to nominate a topic for inclusion in the 2015 Conference Programme, please do so below:</label><span class="inner-field">
				<textarea name="field-5c3977490d05388" id="field-5c3977490d05388" rows="6" cols="40"></textarea>
				
			</span></div></div><div id="formElement15" class="sc-view form-design-field sc-static-layout sc-regular-size"><div class="field-wrapper"><label>Other Keywords</label><span class="inner-field">
				<input type="text" name="field-d2ac091a3e02f22" id="field-d2ac091a3e02f22" size="40" value="">
				
			</span></div></div><div id="formElement16" class="sc-view form-design-field sc-static-layout sc-regular-size"><div class="field-wrapper"><label>Speaker Photo Upload</label><span class="inner-field">
				<input type="file" name="field-b175280d0eda98b" id="field-b175280d0eda98b">
				
			</span></div></div><div id="formElement17" class="sc-view form-design-field sc-static-layout sc-regular-size area validate"><div class="field-wrapper"><label>Proposed Speaker's Biography *</label><span class="inner-field">
				<textarea name="field-2fc56f3971abddb" id="field-2fc56f3971abddb" rows="6" cols="40"></textarea>
				
			</span></div></div><div id="formElement18" class="sc-view form-design-field sc-static-layout sc-regular-size"><div class="field-wrapper"><label>Upload Supporting Documents</label><span class="inner-field">
				<input type="file" name="field-34efe18410596b9" id="field-34efe18410596b9">
				
			</span></div></div><div id="formElement19" class="sc-view form-design-field sc-static-layout sc-regular-size checkgroup"><div class="field-wrapper"><label>What would you like to see more of in terms of the conference format?</label><span class="inner-field">
				<input type="checkbox" name="field-dc3f415b6649022[]" id="field-dc3f415b6649022_0" value="Presentations"> Presentations<br>
				<input type="checkbox" name="field-dc3f415b6649022[]" id="field-dc3f415b6649022_1" value="Demonstrations"> Demonstrations<br>
				<input type="checkbox" name="field-dc3f415b6649022[]" id="field-dc3f415b6649022_2" value="Panel Discussions"> Panel Discussions<br>
				<input type="checkbox" name="field-dc3f415b6649022[]" id="field-dc3f415b6649022_3" value="Smaller Discussion Groups"> Smaller Discussion Groups<br>
				
			</span></div></div><div id="formElement20" class="sc-view form-design-field sc-static-layout sc-regular-size checkgroup validate"><div class="field-wrapper"><label>Are you interested in speaking in Webinars? *</label><span class="inner-field">
				<input type="checkbox" name="field-10f255f6e7fa407[]" id="field-10f255f6e7fa407_0" value="Yes"> Yes<br>
				<input type="checkbox" name="field-10f255f6e7fa407[]" id="field-10f255f6e7fa407_1" value="No"> No<br>
				
			</span></div></div><div id="formElement21" class="sc-view form-design-field sc-static-layout sc-regular-size checkgroup validate"><div class="field-wrapper"><label>I would like to automatically be registered for Mobile World Live (Terms of Use) *</label><span class="inner-field">
				<input type="checkbox" name="field-0bb194af524375a[]" id="field-0bb194af524375a_0" value="Yes"> Yes<br>
				<input type="checkbox" name="field-0bb194af524375a[]" id="field-0bb194af524375a_1" value="No"> No<br>
				
			</span></div></div><div id="formElement22" class="sc-view form-design-field sc-static-layout sc-regular-size"><div class="field-wrapper"><label></label><span class="inner-field">
				<input type="submit" value=" Submit Form ">
			</span></div></div></form>
    <?php
}



if($post->ID=="1043") //customize 2014-exhibitors page
{


echo "<div style='width:100%;'>";
	     $args = array(
         	  'orderby' => 'name',
	          'show_count' => 1,
        	  'pad_counts' => 1,
	          'hierarchical' => 1,
			  'orderby'                  => 'id',
	'order' => 'ASC',
        	  'exclude'=> '1',
        	  'title_li' => ''
        	);

	    foreach( get_categories( $args )as $sponsorcategory)
		{
			$cat_id= $sponsorcategory->term_id;
if($sponsorcategory->parent == 0)
			echo "<h2 style='padding:10px 0 10px 0;'>".$sponsorcategory->name."</h2>";
			else
			echo "<h4 style='width:100%;padding:5px 0 10px 0;'>".$sponsorcategory->name."</h4>";
			
		
		
			 query_posts("cat=$cat_id&posts_per_page=100");
                    // start the wordpress loop!
                  $my_query = new WP_Query('post_type=sponsor&posts_per_page=100&category__in='.$cat_id.'&orderby=ID&order=ASC');
      while ($my_query->have_posts()) : $my_query->the_post(); 
	
$attachment_id = get_post_meta($post->ID, "sponsor_logo", 1);
$sponsorimage = wp_get_attachment_image_src( $attachment_id, "medium" );

?>
<a target="_blank" href="<?php echo get_field("sponsor_url");?>" target="_blank" class="mem_box" style="background: url(<?php echo $sponsorimage[0];?>) no-repeat center center; background-size:100%; margin-bottom:45px;">
    	<h3 style="overflow:initial; bottom:0 !important; top:90px; white-space: pre-wrap;"><?php the_title(); ?> </h3>
    </a>
    
<?php
	  endwhile;  wp_reset_query();
echo '<div style="clear:both;"></div>';	  	  
}
echo "</div>";
}
if(is_page('2014-exhibitors')) //customize 2014-exhibitors page
{
?>
<div class="alphabet">
	<a class="first" href="#">#</a>	
    <a href="#">A</a>
    <a href="#">B</a>
    <a href="#">C</a>
    <a href="#">D</a>
    <a href="#">E</a>
    <a href="#">F</a>
    <a href="#">G</a>
    <a href="#">H</a>
    <a href="#">I</a>
    <a href="#">J</a>
    <a href="#">K</a>
    <a href="#">L</a>
    <a href="#">M</a>
    <a href="#">N</a>
    <a href="#">O</a>
    <a href="#">P</a>
    <a href="#">Q</a>
    <a href="#">R</a>
    <a href="#">S</a>
    <a href="#">T</a>
    <a href="#">U</a>
    <a href="#">V</a>
    <a href="#">W</a>
    <a href="#">X</a>
    <a href="#">Y</a>
    <a href="#">Z</a>
    <a class="last" href="#">All</a>
</div>	
<?php	
}
the_content();		
if($post->ID=="206")
{

	?>

	<?php
}
					
					if(strlen(get_the_content($post->ID))< 1){ echo "<h1 class='secondary-heading' style='display:none;'>This page is being updated. Please come back latter.</h1>";}			
		 
endwhile;

function get_expandable_content()// retrieve content of current page childs set in nav menu
{
global $post;		 
$current_page_id = $post->ID; 
$menu_items = wp_get_nav_menu_items(4);    

    foreach ($menu_items as $menu_item) 
	{	 
	
	//var_dump($menu_item);
		$post_item_parent_id = $menu_item->menu_item_parent; //id of parent page showing in nav item
		
		//echo $post_item_id ." - ".$post_item_parent_id ." - ". $menu_item->url; 
//		echo "<br><br><br><br>";

	
		if(get_post_meta( $post_item_parent_id, '_menu_item_object_id', true ) == $current_page_id )		
		{			
		  
		    $post_item_id = $menu_item->object_id;
		$count_loop = 0;	
		foreach ($menu_items as $menu_child_item) // retrieve childs in expanded
		    {			   
			   $child_item_parent_id = $menu_child_item->menu_item_parent;
						  		   
			   if(get_post_meta( $child_item_parent_id, '_menu_item_object_id', true ) == $post_item_id )		
			   {
				   
				   $count_loop ++;  	
			   }
			}
			if($count_loop==0)
			{
			echo "<div class='expandable inactive'><a href='".get_permalink( $post_item_id )."'><div class='tint'></div><h2>".get_the_title( $post_item_id )."</h2>";
			echo get_the_post_thumbnail( $post_item_id, 'medium' ); 				 
			echo "<span class='box-arrow'></span></a>";
			}
			else
			{
			echo "<div class='expandable'><a href='".get_permalink( $post_item_id )."'><div class='tint'></div><h2>".get_the_title( $post_item_id )."</h2>";
			
			echo get_the_post_thumbnail( $post_item_id, 'medium' ); 				 
			echo "<span class='box-arrow'></span></a>";
			
			
			
			echo "<div class='expand-inner'><span class='arrow-expanded'></span><span class='close-expanded'></span><div class='ex-space'>";	
			
			echo "<h1>".get_the_title( $post_item_id)."</h1>"; 	    
			echo "<p>".get_post_field('post_content',$post_item_id)."</p><div class='ex-devide'></div>";
			 $count_loop2=0; 
			foreach ($menu_items as $menu_child_item) // retrieve childs in expanded
		    {			   
			   $child_item_parent_id = $menu_child_item->menu_item_parent;
						  		   
			   if(get_post_meta( $child_item_parent_id, '_menu_item_object_id', true ) == $post_item_id )		
			   {
				   
				   $count_loop ++;  
				   $count_loop2 ++;			   
				   
				   $child_item_id = $menu_child_item->object_id;
				    
				  					   				   	 
					   	
				   
				   	
				  				  
				   echo "<a class='sub-expand' href='".post_permalink($child_item_id)."'>";
				   echo "<div class='sub-circle'>";
				   echo get_the_post_thumbnail( $child_item_id, 'thumbnail' ); 	
				   echo "</div>";
				   echo "<h2>".get_the_title( $child_item_id )."</h2>";
				   echo "</a>";	
				   if($count_loop2%4==0)
				   {
					   echo "<div style='clear:both'></div>";
				   }
				   	   
			   }		   
		    }
			 
			echo "</div>";
			
			echo "</div>";
			}
			echo "</div>";
		}		
    }
	 
}	


								
				 		 			
			echo "<div class='expandable_holder'>";
			
			get_expandable_content();	
			 			
			echo "</div>";
	 
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
                
                                                
                    
                 
               <?php			      
				 $current_lang = strtolower(end(explode("-",get_bloginfo("language"))));
				 if($current_lang == "es") 
				 {					  
				 ?>
                 <div class="sidebar-box">
                	<div class="sidebar-title">
                    	<h1>CONVERSAR DE #MWC15MP</h1>                        
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
                	<a class="item-wrap" target="_blank" href="http://minister2015.b-network.com/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Reserve su hotel</span><div class="corner"></div></div>                        
                    </a>
                </div>  
                 <div class="sidebar-box">
                    
                	<a class="item-wrap" href="/es/about/destacados-2014/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-highlights.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Destacados 2014</span><div class="corner"></div></div>                        
                    </a>
                </div> 
					
                 <?php   				
				 }
				 
				 else if($current_lang == "fr") 
				 {
					 
				 ?>	
                 <div class="sidebar-box">
                	<div class="sidebar-title">
                    	<h1>REDISCUTER DE #MWC15MP</h1>                        
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
                	<a class="item-wrap" target="_blank" href="http://minister2015.b-network.com/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Réservez votre Hôtel</span><div class="corner"></div></div>                        
                    </a>
                </div>  
                 <div class="sidebar-box">
                    
                	<a class="item-wrap" href="/fr/about/points-forts-2014/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-highlights.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Points Forts 2014</span><div class="corner"></div></div>                        
                    </a>
                </div>    
					
                 <?php    	 
				 }
				 
				 else
				 {
				 ?>	
                 <div class="sidebar-box">
                	<div class="sidebar-title">
                    	<h1>TALK ABOUT #MWC15MP</h1>                        
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
                	<a class="item-wrap" target="_blank" href="http://minister2015.b-network.com/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-hotels.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Book Your Hotel</span><div class="corner"></div></div>                        
                    </a>
                </div>  
                 <div class="sidebar-box">
                    
                	<a class="item-wrap" href="/about/2014-highlights/">
                        <div class="image_holder">
                            <img src="<?php bloginfo('template_directory'); ?>/images/side-highlights.jpg" />
                         </div>    
                         <div class="sidebar-tag"><span>Read 2014 Highlights</span><div class="corner"></div></div>                        
                    </a>
                </div>   
					
                 <?php    
				 }
			   ?> 
                 
                            
            </div> <!--end right content-->
            
        </div>
    </div>
    
    <span class="after_content_gap"></span>
<?php
get_footer();