<?php
/*
VERSION 3

* V2: This version includes a menu walker that adds the page id to the menu. So the menu widgets are not based on page title any longer.
      This version also adds the breadcrumbs, left hand nav and Inherit custom fields(related info) widgets.
*/		

/*id_walker: Custom menu walker that adds needed info the the navigation menu when created*/
class id_walker extends Walker_Nav_Menu{
      function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .' data-name="'.esc_attr( $item->object_id ).'" data-depth="'.$depth.'">';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' data-name="'.esc_attr( $item->object_id ).'"';
        //$attributes .= ' data-slug="'. esc_attr(  basename(get_permalink($item->object_id )) ) .'"';



        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>'; /* This is where I changed things. */
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
class landing_page_walker extends Walker_Nav_Menu{
      function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
		//if($depth<2){
			$page_title      = get_safe_custom('Page: Heading',    $item->object_id);
			$page_subtitle   = get_safe_custom('Page: Subtitle',   $item->object_id);
			$Lpage_title      = get_safe_custom('Landing Page: Heading',    $item->object_id);
			$Lpage_subtitle   = get_safe_custom('Landing Page: Subtitle',   $item->object_id);
			$page_title      = $Lpage_title? $Lpage_title : $page_title;
			$page_subtitle   = $Lpage_subtitle? $Lpage_subtitle : $page_subtitle;
			$page_title      = $page_title? $page_title : $item->title;
			$class_names = $value = '';
			$display = $depth>1? 'style="display:none" ' : '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= '<li '.$display.'id="menu-item-'. $item->ID . '"' . $value . $class_names .' data-name="'.esc_attr( $item->object_id ).'" data-depth="'.$depth.'">';
	
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' data-name="'.esc_attr( $item->object_id ).'"';
			//$attributes .= ' data-slug="'. esc_attr(  basename(get_permalink($item->object_id )) ) .'"';
	
	
	
			$item_output = $args->before;
			$item_output .= '<h3><a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $page_title, $item->ID ) . $args->link_after;
			$item_output .= '</a></h3>'; /* This is where I changed things. */
			$item_output .= '<span>'.$page_subtitle.'</span>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		//}
    }
}

class button_walker extends Walker_Nav_Menu{
      function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			//$output .= '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .' name="'.esc_attr( $item->object_id ).'" data-depth="'.$depth.'">';
	
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' data-name="'.esc_attr( $item->object_id ).'"';
	
			
			$item_output .= '<a'. $attributes .'>';
			$item_output .= '<button type="button" class="fourmain">'.apply_filters( 'the_title', $item->title, $item->ID ).'</button>';
			$item_output .= '</a>';
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
    }
}

//Returns the menu based on the language
if(!function_exists('get_nav')){
	function get_nav(){
		$navname = (ICL_LANGUAGE_CODE=='cn')? 'navigation-chinese' : 'Navigation';
		//return  'NAV NAME: '.$navname.'<br/>  '.wp_nav_menu( array('menu' => 'navigation','echo'=> false));
		$walker = new id_walker; 
		return  wp_nav_menu( array( 'menu' => 'navigation' ,'walker'=>$walker,'echo'=> false) );
	}
}
//Returns the homepage id based on the language
if(!function_exists('get_home')){
	function get_home(){
		$frontpage_id = get_option('page_on_front');
		return (ICL_LANGUAGE_CODE=='cn')? icl_object_id($frontpage_id):$frontpage_id;
	}
}
if (!function_exists('menu_reference')){
	function menu_reference($id){
		$nav =  str_get_html(get_nav());//wp_nav_menu( array('menu' => $navname,'echo'=> false));
		if($nav){
			//echo 'has nav';
			$pm = get_permalink($id);
			//echo 'PM: '.$pm.'---end';
			$atag = $nav->find('a[href='.$pm.']');
			return $atag[0];
		}
		return '';
	}
}
//Checks if the id supplied is in the menu
if(!function_exists('non-linked-page')){
	function non_linked_page($id){
		//echo '{ID: '.nav_parent_id($id).'}  ';
		//echo '{LANDING PAGE: '. get_safe_custom('Landing Page',$id)."}  ";
		$check1 = nav_parent_id($id)==get_home();
		//$check2 = get_safe_custom('is_landing_page',$id)=='';
		//$check2 = !menu_reference($id);
		$nav =  str_get_html(get_nav());
		//$atag = $nav->find('a[name='.$id.']',0);
		$atag = $nav->find('a[data-name='.$id.']',0);
		//echo '{Check: '.($check1? 'true':'false').' + '.($check2? 'true':'false').' = '.($check1&&$check2? 'true':'false').'}';
		return $check1&&!$atag;
	}
}
//Returns the id of the parent menu item
if(!function_exists('nav_parent_id')){	
	function nav_parent_id($id){
		$nav =  str_get_html(get_nav());
		if($nav){
			$pm = get_permalink($id);
			$atag = $nav->find('a[data-name='.$id.']'); 
			if($atag[0]){
				$subMen = $atag[0]->parent()->parent();
				if($subMen->class!='menu'){
					$text1 =$subMen->parent()->first_child();
					$id = $text1->{'data-name'};
					return function_exists(icl_object_id)?icl_object_id($id,'page'): $id;//Checks to see if the language plugin function exists
				}
			}
		}
		return get_home();
	}
}
//Returns the value of the custom field of the specified page and field name
if(!function_exists('get_safe_custom')){
	function get_safe_custom($field,$id){
		$custom_fields = get_post_custom($id);
		if($custom_fields){ 
			$my_custom_field = $custom_fields[$field];
			if($my_custom_field){
				return $custom_fields[$field][0];
			}
		}
		return '';
	}
}
//Returns a breadcrumb string based on menu parent relationships based on the supplied page id
if(!function_exists('menu_breadcrumb')){
	function menu_breadcrumb($id){
		$navParId = nav_parent_id($id);
		$class = ($id == $post->ID)? 'class="active"': '';		
		$currStr = '<a '.$class.' href="'.get_permalink($id).'">'.get_the_title($id).'</a>';
		if($navParId!=get_home()){
			return menu_breadcrumb($navParId)." &gt; ".$currStr;
		}else{
			return '<a href="/">'.get_the_title(get_home()).'</a>'." &gt; ".$currStr;
		}
		return $currStr;
	}
}
//Returns an id of the top menu item that the page id would belog to
if(!function_exists('getSubMenuID')){
	function getSubMenuID($id,$num=0){
		if(!non_linked_page($id)|| $num!=0){
			$parent = nav_parent_id($id);
			if($num<5){//This stops a crazy loop we shouldn't need more than 5 levels
				if($parent == get_home()){
					return $id;
				}else{
					return getSubMenuID($parent,$num+1);
				}
			}
		}
		return '';
	}
}
//Returns the submenu the specified page id belongs to
if(!function_exists('getSubMenu')){
	function getSubMenu($id,$num=0){
		
		$nav = str_get_html(get_nav());
		$menuID = getSubMenuID($id,$num);
		$atag = $nav->find('a[data-name='.$menuID.']',0);
		//$atag = $nav->find('a[data-name='.$menuID.']',0);
		$array = array(
			"title"  => $atag->innertext,
			"menu" => $atag->parent()->find('ul',0)
		);
		return $array;//$atag->parent()->find('ul',0);
	}
}
//Returns a srting of the left hand nav based on the page id supplied
if(!function_exists('left_hand_nav')){
	function left_hand_nav($id){
		$submenInd = getSubMenuID($id);
		if($submenInd){
			$men = getSubMenu($id);
			$send = '
			<div class="left_hand_nav">
				<h3>'.$men['title'].'</h3>
				<div class="content">'.$men['menu'].'</div>
			</div>';
			return $send;
		}
		return '';
	}
}
//Returns through in inheritance the related info associated with the page
if(!function_exists('inherit_custom')){
	function inherit_custom($id,$custom_name){
		$custom_fields =  get_safe_custom($custom_name,$id);
		if($custom_fields){
			return $custom_fields;
		}else{
			$navParentId = nav_parent_id($id);
			if($navParentId!=get_home()){
				return inherit_custom($navParentId,$custom_name);
			}
		}			 
		return false;
	}
}
if(!function_exists('breadcrumb_func')){
	function breadcrumb_func(){
		try{
			$breadcrumb_id =  get_the_ID();
			return menu_breadcrumb($breadcrumb_id);
		} catch (Exception $e) {
		}
	}
}
add_shortcode( 'breadcrumb', 'breadcrumb_func' );

if(!function_exists('left_hand_nav_func')){
	function left_hand_nav_func(){
		try{
			$id_lhv = get_the_ID();
			return left_hand_nav($id_lhv);
		} catch (Exception $e) {
		}
	}
}
add_shortcode( 'left_hand_nav', 'left_hand_nav_func' );

if(!function_exists('related_info_func')){
	function related_info_func(){
		try{
			$id_ri = get_the_ID();	
			return inherit_custom($id_ri,'Page: Related Info');
		} catch (Exception $e) {
		}
	}
}
add_shortcode( 'related_info', 'related_info_func' );






//Adds widgets
add_action( 'widgets_init', 'register_nav_widgets' ); 
function register_nav_widgets() {  
    register_widget( 'Inherited_Field' ); 
	register_widget( 'Left_Hand_Navigation' );
	register_widget( 'Navigation_Bredcrumbs' ); 
}  

//The Inherited field widgets
class Inherited_Field extends WP_Widget {

	function Inherited_Field() {
		$widget_ops = array( 'classname' => 'inherit', 'description' => __('Shows inherited custom fields based on navigation structure ', 'inherit') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'inherit-widget' );
		$this->WP_Widget( 'inherit-widget', __('Inherit', 'inherit'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['field'];

		
		// Display the widget title 
		

		//Display the name 
		if ( $name )
			$inh = inherit_custom(get_the_ID(),$name);
			if($inh)
				echo $before_widget;
				if ( $title && $inh){
					echo $before_title . $title . $after_title;
				}
				echo '<div class="textwidget">'.$inh.'</div>';
				echo $after_widget;
		
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['field'] = strip_tags( $new_instance['field'] );
		return $instance;
	}

	
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('Inherit Custom Fields', 'inherit'), 'field');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'inherit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'field' ); ?>"><?php _e('Custom Field Name:', ''); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'field' ); ?>" name="<?php echo $this->get_field_name( 'field' ); ?>" value="<?php echo $instance['field']; ?>" style="width:100%;" />
		</p>

	<?php
	}
}

class Left_Hand_Navigation extends WP_Widget {

	function Left_Hand_Navigation() {
		$widget_ops = array( 'classname' => 'left_hand_nav', 'description' => __('Builds a left hand navigation from subpages', 'left-hand-nav') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'left-hand-nav-widget' );
		$this->WP_Widget( 'left-hand-nav-widget', __('Left Hand Nav', 'left-hand-nav'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		
		
		//Display the name 
		$submenInd = getSubMenuID(get_the_ID());
			if($submenInd)
				$men = getSubMenu(get_the_ID());
				if($men['menu']){
					echo $before_widget;
					echo $before_title .$men['title'] . $after_title;
					//echo '<div class="textwidget">'.getSubMenu($id).'</div>';
					echo '<div class="textwidget">'.$men['menu'].'</div>';
					echo $after_widget;
				}
		
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		return $instance;
	}

	
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('Left Hand Navigation'));
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	}
}

class Navigation_Bredcrumbs extends WP_Widget {

	function Navigation_Bredcrumbs() {
		$widget_ops = array( 'classname' => 'crumbs', 'description' => __('Breadcrumbs based on navigation.', 'breadcrumb-nav') );	
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'breadcrumb-nav-widget' );
		$this->WP_Widget( 'breadcrumb-nav-widget', __('Navigation Breadcrumbs', 'breadcrumb-nav'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		echo '<div class="textwidget">'.menu_breadcrumb($post->ID).'</div>';
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		return $instance;
	}

	
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('Navigation Breadcrumbs'));
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	}
}
?>