<?php
/**
 * The template for displaying 404 pages (Not Found)
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
	if($item->menu_item_parent=="0")
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
        		
         	</div>
        </div>
        
    	<div class="container">
        	<div class="left-content" style="margin-top:-400px;"><!--start left content-->                                
                <div class="fill">
                	<h1 class="main-heading">Uh oh! You’ve Reached The Edge of the Internet!</h1>
                    <span class="grey_gap"></span>
<p>
	<img style="float:left;" src="<?php bloginfo('template_directory'); ?>/images/falling_man.png" />   Well, not really. You’ve just reached a page that doesn’t exist. You can either go to our <a href="<?php echo home_url(); ?>">Home Page</a> or use the main menu to navigate. We’ve also got a handy search feature that may help you find what you’re looking for.<br/>
 
So click around and find yourself back at <strong>The Edge of Innovation</strong>.
</p>
<?php 	

// Start the Loop.
while ( have_posts() ) : the_post();

if($post->ID=="1113") //customize 2014-exhibitors page
{
	?>
     <style>
	.sc-view {float: left;
background-color: #eeeeee;
padding: 10px;
width: 90%;}

.field-wrapper label {line-height: 20px;
margin: 0;
padding: 10px 0 0;
font-family: "proxima_nova_rgregular","Trebuchet MS", Arial, Helvetica, sans-serif;
font-size: 16px;
color: #333;
width: 30%;
margin-right: 5%;
float: left;
height: 40px;}
.inner-field {width:70%;}
.inner-field textarea {width:95%;}
.inner-field input {
width: 60% !important;
float: left;
height: 38px;
padding: 0;
border: solid 1px #999;
font-family: "proxima_nova_rgregular","Trebuchet MS", Arial, Helvetica, sans-serif;
font-size: 16px;
color: #777;
padding: 0 5%;
}
.inner-field input[type='checkbox'] {
	width: 10% !important;
float: left;
height: 15px;
padding: 0;
border: solid 1px #999;
font-family: "proxima_nova_rgregular","Trebuchet MS", Arial, Helvetica, sans-serif;
font-size: 16px;
color: #777;
padding: 0 5%;
clear:both;
	
	}
	.checkgroup .field-wrapper label {width:95% !important; float:left;}
	.checkgroup .field-wrapper .inner-field {width:95%;float:left;}

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
			echo "<h2 style='padding:10px 0 0 0;'>".$sponsorcategory->name."</h2>";
			else
			echo "<h4 style='width:100%;padding:0 0 0 0;'>".$sponsorcategory->name."</h4>";
			
		
		
			 query_posts("cat=$cat_id&posts_per_page=100");
                    // start the wordpress loop!
                  $my_query = new WP_Query('post_type=sponsor&posts_per_page=100&category__in='.$cat_id.'&orderby=ID&order=ASC');
      while ($my_query->have_posts()) : $my_query->the_post(); 
	
$attachment_id = get_post_meta($post->ID, "sponsor_logo", 1);
$sponsorimage = wp_get_attachment_image_src( $attachment_id, "medium" );

?>
<a target="_blank" href="<?php echo get_field("sponsor_url");?>" target="_blank" class="mem_box" style="background: url(<?php echo $sponsorimage[0];?>) no-repeat center center; background-size:100%; margin-bottom:45px;">
    	<h3><?php the_title(); ?> </h3>
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
<p>See the variety and quality of companies that exhibited at Mobile World Congress 2014.</p>
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
{?>
<div style="width:600px;"><form method="post" name="MWC_SignUp" action="https://s667.t.eloqua.com/e/f2" id="form815" ><input value="MWC_SignUp" type="hidden" name="elqFormName"  /><input value="667" type="hidden" name="elqSiteId"  /><input name="elqCampaignId" type="hidden"  /><div id="formElement0" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="salutation" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Salutation</label><select id="field0" name="salutation" style="width: 21%" ><option value="" >Please Select</option><option value="Mr." >Mr.</option><option value="Ms." >Ms.</option><option value="Mrs." >Mrs.</option><option value="Miss." >Miss.</option><option value="Dr." >Dr.</option><option value="Pr." >Pr.</option></select></p></div></div></div><div id="formElement1" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="FirstName" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >First Name<span style="color: red !important; display: inline; float: none; font-weight: bold; margin: 0pt 0pt 0pt; padding: 0pt 0pt 0pt" >*</span></label><input id="field1" name="FirstName" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement2" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="LastName" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Last Name<span style="color: red !important; display: inline; float: none; font-weight: bold; margin: 0pt 0pt 0pt; padding: 0pt 0pt 0pt" >*</span></label><input id="field2" name="LastName" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement3" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="EmailAddress" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Email Address<span style="color: red !important; display: inline; float: none; font-weight: bold; margin: 0pt 0pt 0pt; padding: 0pt 0pt 0pt" >*</span></label><input id="field3" name="EmailAddress" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement4" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="company" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Company</label><input id="field4" name="company" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement5" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="jobTitle" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Job Title</label><input id="field5" name="jobTitle" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement6" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="homePhone" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Phone Number</label><input id="field6" name="homePhone" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement7" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="homeCountry" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Country<span style="color: red !important; display: inline; float: none; font-weight: bold; margin: 0pt 0pt 0pt; padding: 0pt 0pt 0pt" >*</span></label><select id="field7" name="homeCountry" style="width: 21%" ><option value="" selected="selected" >Please Select</option><option value="United States" >United States</option><option value="United Kingdom" >United Kingdom</option><option value="China, Peoples Republic Of" >China, Peoples Republic Of</option><option value="Germany" >Germany</option><option value="France" >France</option><option value="-------------------------------------" >-------------------------------------</option><option value="Afghanistan" >Afghanistan</option><option value="Aland Islands" >Aland Islands</option><option value="Albania" >Albania</option><option value="Algeria" >Algeria</option><option value="American Samoa" >American Samoa</option><option value="Andorra" >Andorra</option><option value="Angola" >Angola</option><option value="Anguilla" >Anguilla</option><option value="Antarctica" >Antarctica</option><option value="Antigua And Barbuda" >Antigua And Barbuda</option><option value="Argentina" >Argentina</option><option value="Armenia, Republic Of" >Armenia, Republic Of</option><option value="Aruba" >Aruba</option><option value="Australia" >Australia</option><option value="Austria" >Austria</option><option value="Azerbaijan, Republic Of" >Azerbaijan, Republic Of</option><option value="Bahamas" >Bahamas</option><option value="Bahrain" >Bahrain</option><option value="Bangladesh" >Bangladesh</option><option value="Barbados" >Barbados</option><option value="Belarus" >Belarus</option><option value="Belgium" >Belgium</option><option value="Belize" >Belize</option><option value="Benin" >Benin</option><option value="Bermuda" >Bermuda</option><option value="Bhutan" >Bhutan</option><option value="Bolivia" >Bolivia</option><option value="Bosnia Herzegovina" >Bosnia Herzegovina</option><option value="Botswana" >Botswana</option><option value="Bouvet Island" >Bouvet Island</option><option value="Brazil" >Brazil</option><option value="Brunei Darussalam" >Brunei Darussalam</option><option value="Bulgaria" >Bulgaria</option><option value="Burkina Faso" >Burkina Faso</option><option value="Burma" >Burma</option><option value="Burundi" >Burundi</option><option value="Cambodia, Kingdom Of" >Cambodia, Kingdom Of</option><option value="Cameroon" >Cameroon</option><option value="Canada" >Canada</option><option value="Canary Islands" >Canary Islands</option><option value="Cape Verde" >Cape Verde</option><option value="Cayman Islands" >Cayman Islands</option><option value="Central African Republic" >Central African Republic</option><option value="Chad" >Chad</option><option value="Chile" >Chile</option><option value="Christmas Island" >Christmas Island</option><option value="Cocos (Keeling) Islands" >Cocos (Keeling) Islands</option><option value="Colombia" >Colombia</option><option value="Comoros" >Comoros</option><option value="Congo" >Congo</option><option value="Congo, Democratic Republic Of" >Congo, Democratic Republic Of</option><option value="Cook Islands" >Cook Islands</option><option value="Costa Rica" >Costa Rica</option><option value="Cote D'Ivoire" >Cote D'Ivoire</option><option value="Croatia" >Croatia</option><option value="Cuba" >Cuba</option><option value="Cyprus" >Cyprus</option><option value="Czech Republic" >Czech Republic</option><option value="Denmark" >Denmark</option><option value="Diego Garcia" >Diego Garcia</option><option value="Djibouti, Republic Of" >Djibouti, Republic Of</option><option value="Dominica, Commonwealth Of" >Dominica, Commonwealth Of</option><option value="Dominican Republic" >Dominican Republic</option><option value="Ecuador" >Ecuador</option><option value="Egypt" >Egypt</option><option value="El Salvador" >El Salvador</option><option value="Equatorial Guinea" >Equatorial Guinea</option><option value="Eritrea" >Eritrea</option><option value="Estonia" >Estonia</option><option value="Ethiopia" >Ethiopia</option><option value="Falkland Islands, Malvinas" >Falkland Islands, Malvinas</option><option value="Faroe Islands" >Faroe Islands</option><option value="Fiji" >Fiji</option><option value="Finland" >Finland</option><option value="French Guiana" >French Guiana</option><option value="French Polynesia" >French Polynesia</option><option value="French West Indies" >French West Indies</option><option value="Gabon" >Gabon</option><option value="Gambia" >Gambia</option><option value="Georgia" >Georgia</option><option value="Ghana" >Ghana</option><option value="Gibraltar" >Gibraltar</option><option value="Greece" >Greece</option><option value="Greenland" >Greenland</option><option value="Grenada" >Grenada</option><option value="Guadeloupe" >Guadeloupe</option><option value="Guam" >Guam</option><option value="Guatemala" >Guatemala</option><option value="Guernsey" >Guernsey</option><option value="Guinea" >Guinea</option><option value="Guinea Bissau" >Guinea Bissau</option><option value="Guyana" >Guyana</option><option value="Haiti" >Haiti</option><option value="Heard And Mcdonald Islands" >Heard And Mcdonald Islands</option><option value="Honduras" >Honduras</option><option value="Hong Kong" >Hong Kong</option><option value="Hungary" >Hungary</option><option value="Iceland" >Iceland</option><option value="India" >India</option><option value="Indonesia" >Indonesia</option><option value="Iran" >Iran</option><option value="Iraq" >Iraq</option><option value="Ireland" >Ireland</option><option value="Isle Of Man" >Isle Of Man</option><option value="Israel" >Israel</option><option value="Italy" >Italy</option><option value="Jamaica" >Jamaica</option><option value="Japan" >Japan</option><option value="Jersey" >Jersey</option><option value="Jordan" >Jordan</option><option value="Kazakhstan" >Kazakhstan</option><option value="Kenya" >Kenya</option><option value="Kiribati" >Kiribati</option><option value="Korea, Democratic Peoples Republic Of" >Korea, Democratic Peoples Republic Of</option><option value="Korea, Republic Of" >Korea, Republic Of</option><option value="Kosovo" >Kosovo</option><option value="Kuwait" >Kuwait</option><option value="Kyrgyzstan" >Kyrgyzstan</option><option value="Lao, People'S Democratic Republic" >Lao, People'S Democratic Republic</option><option value="Latvia" >Latvia</option><option value="Lebanon" >Lebanon</option><option value="Lesotho" >Lesotho</option><option value="Liberia" >Liberia</option><option value="Libya" >Libya</option><option value="Liechtenstein" >Liechtenstein</option><option value="Lithuania" >Lithuania</option><option value="Luxembourg" >Luxembourg</option><option value="Macau" >Macau</option><option value="Macedonia" >Macedonia</option><option value="Madagascar" >Madagascar</option><option value="Malawi" >Malawi</option><option value="Malaysia" >Malaysia</option><option value="Maldives" >Maldives</option><option value="Mali" >Mali</option><option value="Malta" >Malta</option><option value="Marshall Islands" >Marshall Islands</option><option value="Martinique" >Martinique</option><option value="Mauritania" >Mauritania</option><option value="Mauritius" >Mauritius</option><option value="Mayotte" >Mayotte</option><option value="Mexico" >Mexico</option><option value="Micronesia, Federated States Of" >Micronesia, Federated States Of</option><option value="Moldova, Republic Of" >Moldova, Republic Of</option><option value="Monaco" >Monaco</option><option value="Mongolia" >Mongolia</option><option value="Montenegro" >Montenegro</option><option value="Montserrat" >Montserrat</option><option value="Morocco" >Morocco</option><option value="Mozambique" >Mozambique</option><option value="Myanmar" >Myanmar</option><option value="Namibia" >Namibia</option><option value="Nauru" >Nauru</option><option value="Nepal" >Nepal</option><option value="Netherlands" >Netherlands</option><option value="Netherlands Antilles" >Netherlands Antilles</option><option value="New Caledonia" >New Caledonia</option><option value="New Zealand" >New Zealand</option><option value="Nicaragua" >Nicaragua</option><option value="Niger" >Niger</option><option value="Nigeria" >Nigeria</option><option value="Niue Island" >Niue Island</option><option value="Norfolk Island" >Norfolk Island</option><option value="Northern Mariana Islands" >Northern Mariana Islands</option><option value="Norway" >Norway</option><option value="Oman, Sultanate Of" >Oman, Sultanate Of</option><option value="Pakistan" >Pakistan</option><option value="Palau, Republic Of" >Palau, Republic Of</option><option value="Palestinian Territory" >Palestinian Territory</option><option value="Panama, Republic Of" >Panama, Republic Of</option><option value="Papua New Guinea" >Papua New Guinea</option><option value="Paraguay" >Paraguay</option><option value="Peru" >Peru</option><option value="Philippines" >Philippines</option><option value="Pitcairn" >Pitcairn</option><option value="Poland" >Poland</option><option value="Portugal" >Portugal</option><option value="Puerto Rico" >Puerto Rico</option><option value="Qatar" >Qatar</option><option value="Reunion, La" >Reunion, La</option><option value="Romania" >Romania</option><option value="Russia" >Russia</option><option value="Rwanda, Republic Of" >Rwanda, Republic Of</option><option value="Saint Helena" >Saint Helena</option><option value="Saint Kitts And Nevis" >Saint Kitts And Nevis</option><option value="Saint Lucia" >Saint Lucia</option><option value="Saint Pierre Et Miquelon" >Saint Pierre Et Miquelon</option><option value="Saint Vincent And The Grenadines" >Saint Vincent And The Grenadines</option><option value="Samoa" >Samoa</option><option value="San Marino, Republic Of" >San Marino, Republic Of</option><option value="Sao Tome And Principe" >Sao Tome And Principe</option><option value="Saudi Arabia" >Saudi Arabia</option><option value="Senegal" >Senegal</option><option value="Serbia" >Serbia</option><option value="Seychelles" >Seychelles</option><option value="Sierra Leone" >Sierra Leone</option><option value="Singapore" >Singapore</option><option value="Slovakia" >Slovakia</option><option value="Slovenia" >Slovenia</option><option value="Solomon Islands" >Solomon Islands</option><option value="Somalia" >Somalia</option><option value="South Africa" >South Africa</option><option value="South Sudan" >South Sudan</option><option value="Spain" >Spain</option><option value="Sri Lanka" >Sri Lanka</option><option value="Sudan" >Sudan</option><option value="Suriname" >Suriname</option><option value="Swaziland" >Swaziland</option><option value="Sweden" >Sweden</option><option value="Switzerland" >Switzerland</option><option value="Syria" >Syria</option><option value="Taiwan" >Taiwan</option><option value="Tajikistan" >Tajikistan</option><option value="Tanzania" >Tanzania</option><option value="Thailand" >Thailand</option><option value="Timor-Leste" >Timor-Leste</option><option value="Togo" >Togo</option><option value="Tonga" >Tonga</option><option value="Trinidad And Tobago" >Trinidad And Tobago</option><option value="Tunisia" >Tunisia</option><option value="Turkey" >Turkey</option><option value="Turkmenistan" >Turkmenistan</option><option value="Turks And Caicos Islands" >Turks And Caicos Islands</option><option value="Tuvalu" >Tuvalu</option><option value="Uganda" >Uganda</option><option value="Ukraine" >Ukraine</option><option value="United Arab Emirates" >United Arab Emirates</option><option value="Uruguay" >Uruguay</option><option value="Uzbekistan" >Uzbekistan</option><option value="Vanuatu" >Vanuatu</option><option value="Venezuela" >Venezuela</option><option value="Vietnam" >Vietnam</option><option value="Virgin Islands, British" >Virgin Islands, British</option><option value="Virgin Islands, Us" >Virgin Islands, Us</option><option value="Wallis And Futana Islands" >Wallis And Futana Islands</option><option value="Western Sahara" >Western Sahara</option><option value="Yemen" >Yemen</option><option value="Zambia" >Zambia</option><option value="Zimbabwe" >Zimbabwe</option></select></p></div></div></div><div id="formElement8" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="jobFunction" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Job Function</label><select id="field8" name="jobFunction" style="width: 21%" ><option value="" selected="selected" >Please Select</option><option value="Administrative" >Administrative</option><option value="Analyst" >Analyst</option><option value="C-Level/Owner" >C-Level/Owner</option><option value="Consultant" >Consultant</option><option value="Director" >Director</option><option value="Manager" >Manager</option><option value="Specialist" >Specialist</option><option value="Vice President" >Vice President</option><option value="Other" >Other</option></select></p></div></div></div><div id="formElement9" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="jobAreaResponsibility" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Job Area Responsibility</label><select id="field9" name="jobAreaResponsibility" style="width: 21%" ><option value="" selected="selected" >Please Select</option><option value="Advisory/Strategy/Planning/Performance" >Advisory/Strategy/Planning/Performance</option><option value="Business Development/Sales" >Business Development/Sales</option><option value="Client/Customer Service" >Client/Customer Service</option><option value="Content Development/Distribution" >Content Development/Distribution</option><option value="Finance/Accounting" >Finance/Accounting</option><option value="Government/Regulatory" >Government/Regulatory</option><option value="Legal/Ip" >Legal/Ip</option><option value="Manufacturing" >Manufacturing</option><option value="Marketing/Advertising/Pr" >Marketing/Advertising/Pr</option><option value="Operations Mgmt" >Operations Mgmt</option><option value="Press/Media" >Press/Media</option><option value="Research And Development" >Research And Development</option><option value="Software/App Developer" >Software/App Developer</option><option value="Sourcing And Procurement" >Sourcing And Procurement</option><option value="Supply Chain Mgmt And Distribution" >Supply Chain Mgmt And Distribution</option><option value="Technical/Engineering" >Technical/Engineering</option><option value="Training/Education/Hr" >Training/Education/Hr</option><option value="Other" >Other</option></select></p></div></div></div><div id="formElement10" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="industryDescription" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Industry Description</label><select id="field10" name="industryDescription" style="width: 21%" ><option value="" selected="selected" >Please Select</option><option value="App/Software Development" >App/Software Development</option><option value="Association/Foundations" >Association/Foundations</option><option value="Automotive/Transportation" >Automotive/Transportation</option><option value="Biotechnology/ Pharma" >Biotechnology/ Pharma</option><option value="Broadcast/Media" >Broadcast/Media</option><option value="Component Manufacturer" >Component Manufacturer</option><option value="Consultancy" >Consultancy</option><option value="Device Manufacturer" >Device Manufacturer</option><option value="Education/Training" >Education/Training</option><option value="Entertainment" >Entertainment</option><option value="Finance/Banking/Insurance" >Finance/Banking/Insurance</option><option value="Fixed Network Operator" >Fixed Network Operator</option><option value="Government/Regulatory" >Government/Regulatory</option><option value="Healthcare" >Healthcare</option><option value="Integrated Solution Vendor (Software Only)" >Integrated Solution Vendor (Software Only)</option><option value="It/Hardware Manufacturer" >It/Hardware Manufacturer</option><option value="Mobile Advertising/Marketing/Pr" >Mobile Advertising/Marketing/Pr</option><option value="Mobile Content/Creation Provider" >Mobile Content/Creation Provider</option><option value="Mobile Network Operator" >Mobile Network Operator</option><option value="Mobile Virtual Network Operator" >Mobile Virtual Network Operator</option><option value="Network Infrastructure Vendor" >Network Infrastructure Vendor</option><option value="Oss/Billing Vendor" >Oss/Billing Vendor</option><option value="Service Provider" >Service Provider</option><option value="Systems Integrator" >Systems Integrator</option><option value="Test/Measurement Vendor" >Test/Measurement Vendor</option><option value="Value Added Reseller" >Value Added Reseller</option><option value="Venture Capital" >Venture Capital</option><option value="Other" >Other</option></select></p></div></div></div><div id="formElement11" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="sMTwitterHandle1" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Twitter ID</label><input id="field11" name="sMTwitterHandle1" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement12" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><label for="sMFacebookID1" style="display: block; line-height: 150%; padding: 1px 0pt 3px; float: left; width: 31%; margin: 0pt 15px 0pt 0pt; word-wrap: break-word" >Facebook ID</label><input id="field12" name="sMFacebookID1" type="text" value="" style="width: 21%"  /></p></div></div></div><div id="formElement13" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><input id="field13" type="hidden" name="Address" value=""  /></p></div></div></div><div id="formElement14" class="sc-view form-design-field sc-static-layout sc-regular-size" style="left: 0px; right: 0px; top: 0px; bottom: 0px; padding: 6px 5px 9px 9px" ><div class="field-wrapper" style="float: left; width: 100%; clear: both" ><div class="_100" style="float: left; width: 96%; margin-right: 2%; margin-left: 2%" ><p style="position: relative; margin: 0px; padding: 0px" ><input type="submit" value="Submit" style="font-size: 100%; height: 24px; width: 100px"  /></p></div></div></div></form><script src="https://img.en25.com/i/livevalidation_standalone.compressed.js" type="text/javascript" ></script><style type="text/css" media="screen" >.LV_validation_message{ font-weight:bold; margin: 0 0 0 5px; }
.LV_valid{ color:#00CC00; display:none; }
.LV_invalid{ color:#CC0000; font-size:10px; }
.LV_valid_field, input.LV_valid_field:hover, input.LV_valid_field:active, textarea.LV_valid_field:hover, textarea.LV_valid_field:active { border: 1px solid #00CC00; }
.LV_invalid_field, input.LV_invalid_field:hover, input.LV_invalid_field:active, textarea.LV_invalid_field:hover, textarea.LV_invalid_field:active { border: 1px solid #CC0000; }</style><script type="text/javascript" >var field0 = new LiveValidation("field0", {validMessage: "", onlyOnBlur: true});var field1 = new LiveValidation("field1", {validMessage: "", onlyOnBlur: true});field1.add(Validate.Presence, {failureMessage:"Please enter a first name"});var field2 = new LiveValidation("field2", {validMessage: "", onlyOnBlur: true});field2.add(Validate.Presence, {failureMessage:"Please enter a last name"});var field3 = new LiveValidation("field3", {validMessage: "", onlyOnBlur: true});field3.add(Validate.Presence, {failureMessage:"Please enter a valid email address"});field3.add(Validate.Format, {pattern: /^[ ]*([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})[ ]*$/i, failureMessage: "Please enter a valid email address"});var field4 = new LiveValidation("field4", {validMessage: "", onlyOnBlur: true});var field5 = new LiveValidation("field5", {validMessage: "", onlyOnBlur: true});var field6 = new LiveValidation("field6", {validMessage: "", onlyOnBlur: true});var field7 = new LiveValidation("field7", {validMessage: "", onlyOnBlur: true});field7.add(Validate.Presence, {failureMessage:"This field is required"});var field8 = new LiveValidation("field8", {validMessage: "", onlyOnBlur: true});var field9 = new LiveValidation("field9", {validMessage: "", onlyOnBlur: true});var field10 = new LiveValidation("field10", {validMessage: "", onlyOnBlur: true});var field11 = new LiveValidation("field11", {validMessage: "", onlyOnBlur: true});var field12 = new LiveValidation("field12", {validMessage: "", onlyOnBlur: true});</script></div>
	<?php
}
					
					if(strlen(get_the_content($post->ID))< 1){ echo "<h1 class='secondary-heading' style='display:none;'>This page is being updated. Please come back latter.</h1>";}			
		 
endwhile;

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
echo '<div class="bread"><a href="#">Home</a>';
my_breadcrumb('primary-nav'); 
echo '</div> ' ;
echo '<h1>'.get_the_title( $currentPageID ).'</h1></div>';

echo "<ul class='side-menu'>";
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
	//echo "<li><a href='".$page_url."'>".$page_title."</a><li>";
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