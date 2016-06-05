<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar 1',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div style="position:relative;"><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="widget-content">',
'after_widget' => '</div><div class="wbottom"></div><div class="wsbottom-left"></div><div class="wsbottom-right"></div></div></div>',
'before_title' => '<div style="position:relative;"><div class="wtop-top"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wtop-middle"></div><div class="wtopmiddle-left"></div><div class="wtopmiddle-right"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));

$options = get_option('evolve'); if (($options['evl_sidebar_num'] == "two"))  
{
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar 2',
'id' => 'sidebar-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div style="position:relative;"><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="widget-content">',
'after_widget' => '</div><div class="wbottom"></div><div class="wsbottom-left"></div><div class="wsbottom-right"></div></div></div>',
'before_title' => '<div style="position:relative;"><div class="wtop-top"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wtop-middle"></div><div class="wtopmiddle-left"></div><div class="wtopmiddle-right"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}


function header1() {
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 1',
'id' => 'header-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
)); }
function header2() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 2',
'id' => 'header-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
)); }
function header3() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 3',
'id' => 'header-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
)); }
function header4() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 4',
'id' => 'header-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
));
}

function footer1() {
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 1',
'id' => 'footer-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
)); }
function footer2() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 2',
'id' => 'footer-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
)); }
function footer3() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 3',
'id' => 'footer-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
)); }
function footer4() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 4',
'id' => 'footer-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wtop"></div><div class="wbottom-footer"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wbottom-left"></div><div class="wbottom-right"></div><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="wmiddle-footer"></div><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
));
}

$options = get_option('evolve');

// Header widgets

  if (($options['evl_widgets_header'] == "one"))  
{
header1();
}
  if (($options['evl_widgets_header'] == "two"))  
{
header1();
header2();
}
  if (($options['evl_widgets_header'] == "three"))  
{
header1();
header2();
header3();
}
  if (($options['evl_widgets_header'] == "four"))  
{
header1();
header2();
header3();
header4();
} else {}

// Footer widgets

  if (($options['evl_widgets_num'] == "one"))  
{
footer1();
}
  if (($options['evl_widgets_num'] == "two"))  
{
footer1();
footer2();
}
  if (($options['evl_widgets_num'] == "three"))  
{
footer1();
footer2();
footer3();
}
  if (($options['evl_widgets_num'] == "four"))  
{
footer1();
footer2();
footer3();
footer4();
} else {}

function widget_area_active( $index ) {
	global $wp_registered_sidebars;
	
	$widgetarea = wp_get_sidebars_widgets();
	if ( isset($widgetarea[$index]) ) return true;
	
	return false;
}

function evolve_widget_area( $name = false ) {
	if ( !isset($name) ) {
		$widget[] = "widget.php";
	} else {
		$widget[] = "widget-{$name}.php";
	}
	locate_template( $widget, true );
}




function widget_before_title() { ?>

<div style="position:relative;"><div class="wtop-top"></div><div class="wtop-left"></div><div class="wtop-right"></div><div class="wtop-middle"></div><div class="wtopmiddle-left"></div><div class="wtopmiddle-right"></div><h3 class="widget-title">

<?php }

function widget_after_title() { ?>

</h3></div>

<?php }

function widget_before_widget() { ?>

<div style="position:relative;"><div class="wmiddle-left"></div><div class="wmiddle-right"></div><div class="widget-content">
<?php }

function widget_after_widget() { ?>

</div><div class="wbottom"></div><div class="wsbottom-left"></div><div class="wsbottom-right"></div></div></div>

<?php }


function widget_text($args, $number = 1) {
extract($args);
$options = get_option('widget_text');
$title = $options[$number]['title'];
if ( empty($title) )
$title = '';  }

?>