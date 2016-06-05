<?php
ob_start();
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 100, 100, true );
add_editor_style('editor-style.css');
add_action( 'wp_dashboard_setup', 'addDashboardWidgets', 9 );

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 

define( 'HEADER_TEXTCOLOR', '' );


define( 'NO_HEADER_TEXT', true );
add_custom_image_header( '', 'evolve_admin_header_style' );
  
function evolve_admin_header_style() {}
  
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'evolve_header_image_width', 990 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'evolve_header_image_height', 170 ) );
  

$options = get_option('evolve');
if ( ($options['evl_pos_sidebar'] == "left" || $options['evl_pos_sidebar'] == "right" ) && $options['evl_width_layout'] == "fixed" && $options['evl_sidebar_num'] == "one") { 
if ( ! isset( $content_width ) )
	$content_width = 620;
}
if ( ( ($options['evl_pos_sidebar'] == "left" || $options['evl_pos_sidebar'] == "right" ) && $options['evl_width_layout'] == "fixed" && $options['evl_sidebar_num'] == "two" ) ||
( ($options['evl_pos_sidebar'] == "left_right" ) && $options['evl_width_layout'] == "fixed" && $options['evl_sidebar_num'] == "two")
) {
if ( ! isset( $content_width ) )
	$content_width = 506;
}
if ( $options['evl_width_layout'] == "fixed" && $options['evl_sidebar_num'] == "disable" ) {
if ( ! isset( $content_width ) )
	$content_width = 960;
}
if ( $options['evl_width_layout'] == "fluid" ) {
if ( ! isset( $content_width ) )
	$content_width = 700;
}
else {
if ( ! isset( $content_width ) )
	$content_width = 620;
}

  
  
  
	load_theme_textdomain( 'evolve', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file ); 
/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	register_setting( 'evolve_options', 'evolve', 'theme_options_validate' );
  add_settings_section('ud_main', '', 'ud_section_text', 'ud');
  add_settings_field('ud_filename', '', 'ud_setting_filename', 'ud', 'ud_main');  
	wp_register_script('myjquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
  wp_register_script('myjqueryui', WP_CONTENT_URL . '/themes/evolve/library/media/js/jquery-ui.js');
  wp_register_script('myjquerycookie', WP_CONTENT_URL . '/themes/evolve/library/media/js/jquery-cookie.js');
  wp_register_script('myjquerytipsy', WP_CONTENT_URL . '/themes/evolve/library/media/js/tipsy.js');
  wp_register_script('myevolve', WP_CONTENT_URL . '/themes/evolve/library/media/js/evolve.js');
  wp_register_style('mycss', WP_CONTENT_URL . '/themes/evolve/library/media/css/theme-options.css');
}




$themename = "EvoLve";
$template_url = get_template_directory_uri();



/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename." Settings", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'evolve_scripts');
  add_action('admin_print_styles-' . $page, 'evolve_styles');  
 
}




$select_sidebar = array(
	'0' => array(
		'value' =>	'right',
		'label' => __( 'Right &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'left',
		'label' => __( 'Left' )
	),
	'2' => array(
		'value' =>	'left_right',
		'label' => __( 'Left + Right' )
	)  
); 

$select_logo = array(
	'0' => array(
		'value' =>	'left',
		'label' => __( 'Left &nbsp;&nbsp;&nbsp;(default)' )
    ),
	'1' => array(
		'value' =>	'right',
		'label' => __( 'Right' )
    ),
	'2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )    
	)
); 

$select_sidebar_num = array(
	'0' => array(
		'value' =>	'one',
		'label' => __( '1 &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'two',
		'label' => __( '2' )
	),
	'2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)     
);   

$select_width = array(
	'0' => array(
		'value' =>	'fixed',
		'label' => __( 'Fixed &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'fluid',
		'label' => __( 'Fluid' )
	)
); 

$select_home_header = array(
	'0' => array(
		'value' =>	'search_social',
		'label' => __( 'Search Field + Subscribe Buttons &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'post_search_social',
		'label' => __( 'Recent Posts + Search Field + Subscribe Buttons' )
	),
  '2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)
); 

$select_single_header = array(
	'0' => array(
		'value' =>	'search_social',
		'label' => __( 'Search Field + Subscribe Buttons &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'post_search_social',
		'label' => __( 'Recent Posts + Search Field + Subscribe Buttons' )
	),
  '2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)
); 

$select_archives_header = array(
	'0' => array(
		'value' =>	'search_social',
		'label' => __( 'Search Field + Subscribe Buttons &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'post_search_social',
		'label' => __( 'Recent Posts + Search Field + Subscribe Buttons' )
	),
  '2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)
); 


$select_content_back = array(
	'0' => array(
		'value' =>	'light',
		'label' => __( 'Light &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'dark',
    'label' => __( 'Dark' )
	)
); 

$select_menu_back = array(
	'0' => array(
		'value' =>	'light',
		'label' => __( 'Light &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'dark',
		'label' => __( 'Dark' )
	)
); 


$select_main_color = array(
	'0' => array(
		'value' =>	'grey_blue',
		'label' => __( 'Dark Grey + Blue &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'light_grey_blue',
		'label' => __( 'Light Grey + Blue' )
	),
  '2' => array(
		'value' =>	'green_yellow',
		'label' => __( 'Green + Yellow' )
	),
  '3' => array(
		'value' =>	'red_yellow',
		'label' => __( 'Red + Yellow' )
	),
  '4' => array(
		'value' =>	'pink_purple',
		'label' => __( 'Pink + Purple' )
	),
  '5' => array(
		'value' =>	'light_blue',
		'label' => __( 'Light Blue + Blue' )
	),
  '6' => array(
		'value' =>	'brown_yellow',
		'label' => __( 'Brown + Yellow' )
	)                
);

$select_post_layout = array(
	'0' => array(
		'value' =>	'one',
		'label' => __( '1 &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'two',
		'label' => __( '2' )
	),
	'2' => array(
		'value' =>	'three',
		'label' => __( '3' )
	)  
); 

$select_title_font = array(
	'0' => array(
		'value' =>	'impact',
		'label' => __( 'Impact &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'tahoma',
		'label' => __( 'Tahoma' )
	),
	'2' => array(
		'value' =>	'georgia',
		'label' => __( 'Georgia' )
	),
	'3' => array(
		'value' =>	'arial',
		'label' => __( 'Arial' )
	),
	'4' => array(
		'value' =>	'calibri',
		'label' => __( 'Calibri' )
	)  
); 

$select_content_font = array(
	'0' => array(
		'value' =>	'segoe',
		'label' => __( 'Segoe UI &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'arial',
		'label' => __( 'Arial' )
	),
	'2' => array(
		'value' =>	'georgia',
		'label' => __( 'Georgia' )
	),
	'3' => array(
		'value' =>	'courier',
		'label' => __( 'Courier New' )
	),
	'4' => array(
		'value' =>	'calibri',
		'label' => __( 'Calibri' )
	)  
);


$select_widgets_num = array(
	'0' => array(
		'value' =>	'disable',
		'label' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)' )
	), 
	'1' => array(
		'value' =>	'one',
		'label' => __( '1' )
	),
	'2' => array(
		'value' =>	'two',
		'label' => __( '2' )
	),
	'3' => array(
		'value' =>	'three',
		'label' => __( '3' )
	),
	'4' => array(
		'value' =>	'four',
		'label' => __( '4' )
	)    
); 


$select_widgets_header = array(
	'0' => array(
		'value' =>	'disable',
		'label' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)' )
	), 
	'1' => array(
		'value' =>	'one',
		'label' => __( '1' )
	),
	'2' => array(
		'value' =>	'two',
		'label' => __( '2' )
	),
	'3' => array(
		'value' =>	'three',
		'label' => __( '3' )
	),
	'4' => array(
		'value' =>	'four',
		'label' => __( '4' )
	)        
);   

$select_nav_links = array(
	'0' => array(
		'value' =>	'after',
		'label' => __( 'After posts &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'before',
		'label' => __( 'Before posts' )
	),
	'2' => array(
		'value' =>	'both',
		'label' => __( 'Both' )
	)      
);

$slider_speed = array(
  '0' => array(
		'value' =>	'disable',
		'label' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)' )
	), 
	'1' => array(
		'value' =>	'normal',
		'label' => __( 'Normal' )
	),
	'2' => array(
		'value' =>	'slow',
		'label' => __( 'Slow' )
	),
  '3' => array(
		'value' =>	'fast',
		'label' => __( 'Fast' )
	)                
); 

$select_back_button = array(
  '0' => array(
		'value' =>	'disable',
		'label' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)' )
	), 
	'1' => array(
		'value' =>	'left',
		'label' => __( 'Left' )
	),
  '2' => array(
		'value' =>	'right',
		'label' => __( 'Right' )
	),
	'3' => array(
		'value' =>	'middle',
		'label' => __( 'Middle' )
	)  
                   
); 

$share_this_button = array(
	'0' => array(
		'value' =>	'single',
		'label' => __( 'Single posts &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'single_archive',
		'label' => __( 'Single posts + Archive pages' )
	),
  '2' => array(
		'value' =>	'all',
		'label' => __( 'All pages' )
	),
  '3' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)                     
); 

$header_meta = array(
	'0' => array(
		'value' =>	'single_archive',
		'label' => __( 'Single posts + Archive pages &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'single',
		'label' => __( 'Single posts' )
	),  
  '2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)                   
); 

$select_post_links = array(
	'0' => array(
		'value' =>	'after',
		'label' => __( 'After post content &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'before',
		'label' => __( 'Before post content' )
	),
	'2' => array(
		'value' =>	'both',
		'label' => __( 'Both' )
	),
	'3' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)
  );  
  
$select_tagline_pos = array(
	'0' => array(
		'value' =>	'next',
		'label' => __( 'Next to blog title &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'above',
		'label' => __( 'Above blog title' )
	),
	'2' => array(
		'value' =>	'under',
		'label' => __( 'Under blog title' )
	),
	'3' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)  
);

$select_similar_posts = array(
	'0' => array(
		'value' =>	'disable',
		'label' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'category',
		'label' => __( 'Match by categories' )
	),
	'2' => array(
		'value' =>	'tag',
		'label' => __( 'Match by tags' )
	)
);

  

$shortname = "evl";

$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// Design

array( "id" => $shortname."-tab-1",
	"type" => "open-tab"),

array( "name" => "Design",
	"type" => "title"),
 
array( "type" => "open"),


array(  "name" => "Main colors",
        "desc" => "Color scheme of header, footer and links",
        "id" => $shortname."_main_color",
        "type" => "select7",
        "std" => "false"
),

array(  "name" => "Enable Custom Background",
        "desc" => "Check this box if you want to enable custom background",
        "id" => $shortname."_custom_background",
        "type" => "checkbox",
        "std" => "false"),


array(  "name" => "Disable background images",
        "desc" => "Check this box if you don't want to display background images - 'nacked mode'",
        "id" => $shortname."_back_images",
        "type" => "checkbox",
        "std" => "false"),  


array(  "name" => "Menu color",
        "desc" => "Background color of main menu",
        "id" => $shortname."_menu_back",
        "type" => "select6",
        "std" => "false"
), 


array(  "name" => "Content color",
        "desc" => "Background color of content",
        "id" => $shortname."_content_back",
        "type" => "select5",
        "std" => "false"
), 



array(  "name" => "Number of sidebars",
        "desc" => "",
        "id" => $shortname."_sidebar_num",
        "type" => "select1",
        "std" => "false"
), 
        
array(  "name" => "Sidebar(s) position",
        "desc" => "For <strong>Left + Right</strong> option the <strong>2</strong> sidebars must be enabled",
        "id" => $shortname."_pos_sidebar",
        "type" => "select2",
        "std" => "false"
),

array(  "name" => "Width",
        "desc" => "<strong>Fixed</strong> = 960px / <strong>Fluid</strong> = 99% width of browser window",
        "id" => $shortname."_width_layout",
        "type" => "select3",
        "std" => "false"
),

array( "type" => "close"),

array( "type" => "close-tab"),



// Posts

array( "id" => $shortname."-tab-2",
	"type" => "open-tab"),
 
array( "name" => "Posts",
	"type" => "title"),
 
array( "type" => "open"),

array(  "name" => "Number of articles per row on home and archive pages - 'post boxes'",
        "desc" => "Option <strong>2</strong> or <strong>3</strong> is recommended to use with disabled <strong>Sidebar(s)</strong> or enabled <strong>Fluid</strong> width",
        "id" => $shortname."_post_layout",
        "type" => "select8",
        "std" => "false"),
        
array(  "name" => "Enable post excerpts with thumbnails",
        "desc" => "Check this box if you want to display post excerpts with post thumbnails",
        "id" => $shortname."_excerpt_thumbnail",
        "type" => "checkbox",
        "std" => "false"),         

array(  "name" => "Disable post author avatar",
        "desc" => "Check this box if you don't want to display post author avatar",
        "id" => $shortname."_author_avatar",
        "type" => "checkbox",
        "std" => "false"),  
        
array(  "name" => "Post meta header placement",
        "desc" => "Choose placement of the post meta header - Date, Author, Comments",
        "id" => $shortname."_header_meta",
        "type" => "select18",
        "std" => "false"),  
        
array(  "name" => "'Share This' buttons placement",
        "desc" => "Choose placement of the 'Share This' buttons",
        "id" => $shortname."_share_this",
        "type" => "select17",
        "std" => "false"), 
        
array(  "name" => "Position of previous/next posts links",
        "desc" => "Choose the position of the <strong>Previous/Next Post</strong> links",
        "id" => $shortname."_post_links",
        "type" => "select19",
        "std" => "false"),   
        
array(  "name" => "Display Similar posts",
        "desc" => "Choose if you want to display <strong>Similar posts</strong> in articles",
        "id" => $shortname."_similar_posts",
        "type" => "select23",
        "std" => "false"),                              
 
array( "type" => "close"),

array( "type" => "close-tab"),


// Subscribe buttons

array( "id" => $shortname."-tab-3",
	"type" => "open-tab"),

array( "name" => "Subscribe settings",
	"type" => "title"),
  
// RSS Feed
  
array( "type" => "open"),

array(  "name" => "RSS Feed",
        "desc" => "Insert custom RSS Feed URL, e.g. <strong>http://feeds.feedburner.com/Example</strong>",
        "id" => $shortname."_rss_feed",
        "type" => "text",
        "std" => ""),  

array( "type" => "close"),  



// Newsletter

array( "type" => "open"),

array(  "name" => "Newsletter",
        "desc" => "Insert custom newsletter URL, e.g. <strong>http://feedburner.google.com/fb/a/mailverify?uri=Example&amp;loc=en_US</strong>",
        "id" => $shortname."_newsletter",
        "type" => "text1",
        "std" => ""),  

array( "type" => "close"),  

// Facebook

array( "type" => "open"),

array(  "name" => "Facebook",
        "desc" => "Insert your Facebook ID",
        "id" => $shortname."_facebook",
        "type" => "text2",
        "std" => ""),  

array( "type" => "close"), 

// Twitter
 
array( "type" => "open"),

array(  "name" => "Twitter",
        "desc" => "Insert your Twitter ID",
        "id" => $shortname."_twitter_id",
        "type" => "text3",
        "std" => ""),  

array( "type" => "close"),

// Google Buzz

array( "type" => "open"),

array(  "name" => "Google Buzz",
        "desc" => "Insert your Google Buzz ID",
        "id" => $shortname."_google_buzz",
        "type" => "text4",
        "std" => ""),  

array( "type" => "close"), 

// MySpace

array( "type" => "open"),

array(  "name" => "MySpace",
        "desc" => "Insert your MySpace ID",
        "id" => $shortname."_myspace",
        "type" => "text5",
        "std" => ""),  

array( "type" => "close"), 

// Skype

array( "type" => "open"),

array(  "name" => "Skype",
        "desc" => "Insert your Skype ID, e.g. <strong>username</strong>",
        "id" => $shortname."_skype",
        "type" => "text6",
        "std" => ""),  

array( "type" => "close"), 


// YouTube

array( "type" => "open"),

array(  "name" => "YouTube",
        "desc" => "Insert your YouTube ID",
        "id" => $shortname."_youtube",
        "type" => "text7",
        "std" => ""),  

array( "type" => "close"), 

// Flickr

array( "type" => "open"),

array(  "name" => "Flickr",
        "desc" => "Insert your Flickr ID",
        "id" => $shortname."_flickr",
        "type" => "text8",
        "std" => ""),  

array( "type" => "close"), 

// LinkedIn

array( "type" => "open"),

array(  "name" => "LinkedIn",
        "desc" => "Insert your LinkedIn profile URI, e.g. <strong>http://ca.linkedin.com/pub/your-name/3/859/23b</strong>",
        "id" => $shortname."_linkedin",
        "type" => "text9",
        "std" => ""),  

array( "type" => "close"), 

array( "type" => "close-tab"),


// Header content

array( "id" => $shortname."-tab-4",
	"type" => "open-tab"),

array( "name" => "Header content",
	"type" => "title"),
 
array( "type" => "open"),

array( "name" => "Custom logo",
        "desc" => "",
        "id" => $shortname."_header_logo",
        "type" => "upload",
        "std" => "false"),          
        
array(  "name" => "Logo position",
        "desc" => "Choose the position of your custom logo",
        "id" => $shortname."_pos_logo",
        "type" => "select13",
        "std" => "false"), 
        
array(  "name" => "Disable Blog Title",
        "desc" => "Check this box if you don't want to display title of your blog",
        "id" => $shortname."_blog_title",
        "type" => "checkbox",
        "std" => "false"),    
        
array(  "name" => "Blog Tagline position",
        "desc" => "Choose the position of blog tagline",
        "id" => $shortname."_tagline_pos",
        "type" => "select22",
        "std" => "false"),                               
        
array(  "name" => "Number of widget cols in header",
        "desc" => "",
        "id" => $shortname."_widgets_header",
        "type" => "select12",
        "std" => "false"),         

array(  "name" => "Home page header content",
        "desc" => "",
        "id" => $shortname."_home_header_content",
        "type" => "select4",
        "std" => "false"),
        
array(  "name" => "Single post header content",
        "desc" => "",
        "id" => $shortname."_single_header_content",
        "type" => "select20",
        "std" => "false"), 
        
array(  "name" => "Archives and other pages header content",
        "desc" => "",
        "id" => $shortname."_archives_header_content",
        "type" => "select21",
        "std" => "false"),               
        
array(  "name" => "Slideshow",
        "desc" => "To enable a slideshow the <strong>Recent Posts + Search Field + Subscribe Buttons</strong> option must be enabled",
        "id" => $shortname."_header_slider",
        "type" => "select15",
        "std" => "false"),                 

array( "type" => "close"),   

array( "type" => "close-tab"),


// Footer content

array( "id" => $shortname."-tab-5",
	"type" => "open-tab"),

array( "name" => "Footer content",
	"type" => "title"),
 
array( "type" => "open"),


array(  "name" => "Number of widget cols in footer",
        "desc" => "",
        "id" => $shortname."_widgets_num",
        "type" => "select11",
        "std" => "false"
), 

array(  "name" => "Custom footer",
        "desc" => 'Available <strong>HTML</strong> tags and attributes:<br /><br /> <code> &lt;b&gt; &lt;i&gt; &lt;a href="" title=""&gt; &lt;blockquote&gt; &lt;del datetime=""&gt; <br /> &lt;ins datetime=""&gt; &lt;img src="" alt="" /&gt; &lt;ul&gt; &lt;ol&gt; &lt;li&gt; <br /> &lt;code&gt; &lt;em&gt;  &lt;strong&gt; &lt;div&gt; &lt;span&gt; &lt;h1&gt; &lt;h2&gt; &lt;h3&gt; &lt;h4&gt; &lt;h5&gt; &lt;h6&gt; <br /> &lt;table&gt; &lt;tbody&gt; &lt;tr&gt; &lt;td&gt; &lt;br /&gt; &lt;hr /&gt;</code>',
        
        
        "id" => $shortname."_footer_content",
        "type" => "textarea",
        "std" => "false"),

array( "type" => "close"),

array( "type" => "close-tab"),


// Styles

array( "id" => $shortname."-tab-6",
	"type" => "open-tab"),

array( "name" => "Styles",
	"type" => "title"),
 
array( "type" => "open"),

array(  "name" => "Blog Title font",
        "desc" => "Examples: <span style='font-style:normal;font-size:23px;font-weight:bold;letter-spacing:-1px;'><span style='font-family:impact;'>Impact</span> <span style='font-family:tahoma;'>Tahoma</span>
        <span style='font-family:georgia;'>Georgia</span> <span style='font-family:arial black;'>Arial</span> <span style='font-family:Calibri,Segoe UI,Myriad Pro,Myriad,Trebuchet MS,Helvetica,Arial,sans-serif;'>Calibri</span>
        </span>",
        "id" => $shortname."_title_font",
        "type" => "select9",
        "std" => "false"),
        
array(  "name" => "Content font",
        "desc" => "Examples: <span style='font-style:normal;font-size:23px;font-weight:bold;letter-spacing:-1px;'><span style='font-family:Segoe UI,Calibri,Myriad Pro,Myriad,Trebuchet MS,Helvetica,Arial,sans-serif;'>Segoe UI</span> <span style='font-family:arial;'>Arial</span>
        <span style='font-family:georgia;'>Georgia</span> <span style='font-family:courier new;'>Courier New</span> <span style='font-family:Calibri,Segoe UI,Myriad Pro,Myriad,Trebuchet MS,Helvetica,Arial,sans-serif;'>Calibri</span>
        </span>",
        "id" => $shortname."_content_font",
        "type" => "select10",
        "std" => "false"),        

array(  "name" => "Custom CSS",
        "desc" => '<strong>For advanced users only</strong>: insert custom CSS, default <a href="'.$template_url.'/style.css" target="_blank">style.css</a> file',
        "id" => $shortname."_css_content",
        "type" => "textarea",
        "std" => "false"),

array( "type" => "close"),

array( "type" => "close-tab"),


// Navigation


array( "id" => $shortname."-tab-7",
	"type" => "open-tab"),

array( "name" => "Navigation",
	"type" => "title"),
 
array( "type" => "open"),

array(  "name" => "Disable main menu",
        "desc" => "Check this box if you don't want to display main menu",
        "id" => $shortname."_main_menu",
        "type" => "checkbox",
        "std" => "false"),

array(  "name" => "Position of navigation links",
        "desc" => "Choose the position of the <strong>Older/Newer Posts</strong> links",
        "id" => $shortname."_nav_links",
        "type" => "select14",
        "std" => "false"),
        
array(  "name" => "Position of 'Back to Top' button",
        "desc" => "",
        "id" => $shortname."_pos_button",
        "type" => "select16",
        "std" => "false"),              


array( "type" => "close"),

array( "type" => "close-tab"),


// Ads Spaces


array( "id" => $shortname."-tab-8",
	"type" => "open-tab"),

array( "name" => "Ads",
	"type" => "title"),
 
array( "type" => "open"),


array(  "name" => "Ad Space 1 - Header Top",
        "desc" => "Insert an ads code here to display in the <strong>Header Top</strong><br />recommended max. ads width 468px",
        "id" => $shortname."_space_1",
        "type" => "textarea1",
        "std" => "false"),  
        
array(  "name" => "Ad Space 2 - Header Bottom",
        "desc" => "Insert an ads code here to display in the <strong>Header Bottom</strong><br />recommended max. ads width 960px",
        "id" => $shortname."_space_2",
        "type" => "textarea2",
        "std" => "false"), 
        
array(  "name" => "Ad Space 3 - Sidebar 1 Top",
        "desc" => "Insert an ads code here to display in the <strong>Sidebar 1 Top</strong><br />recommended max. ads width 300px",
        "id" => $shortname."_space_3",
        "type" => "textarea3",
        "std" => "false"), 
        
array(  "name" => "Ad Space 4 - Sidebar 1 Bottom",
        "desc" => "Insert an ads code here to display in the <strong>Sidebar 1 Bottom</strong><br />recommended max. ads width 300px",
        "id" => $shortname."_space_4",
        "type" => "textarea4",
        "std" => "false"),   
        
array(  "name" => "Ad Space 5 - Sidebar 2 Top",
        "desc" => "Insert an ads code here to display in the <strong>Sidebar 2 Top</strong><br />recommended max. ads width 300px",
        "id" => $shortname."_space_5",
        "type" => "textarea5",
        "std" => "false"), 
        
array(  "name" => "Ad Space 6 - Sidebar 2 Bottom",
        "desc" => "Insert an ads code here to display in the <strong>Sidebar 2 Bottom</strong><br />recommended max. ads width 300px",
        "id" => $shortname."_space_6",
        "type" => "textarea6",
        "std" => "false"), 
        
array(  "name" => "Ad Space 7 - Post Top",
        "desc" => "Insert an ads code here to display in the <strong>Post Top</strong><br />recommended max. ads width 600px",
        "id" => $shortname."_space_7",
        "type" => "textarea7",
        "std" => "false"),  
        
array(  "name" => "Ad Space 8 - Post Bottom",
        "desc" => "Insert an ads code here to display in the <strong>Post Bottom</strong><br />recommended max. ads width 600px",
        "id" => $shortname."_space_8",
        "type" => "textarea8",
        "std" => "false"), 
        
array(  "name" => "Ad Space 9 - Footer",
        "desc" => "Insert an ads code here to display in the <strong>Footer</strong><br />recommended max. ads width 960px",
        "id" => $shortname."_space_9",
        "type" => "textarea9",
        "std" => "false"),                                                         

            


array( "type" => "close"),

array( "type" => "close-tab"),

 
);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist, $select_sidebar_num, $select_sidebar, $select_width, $select_home_header, $select_content_back, $select_menu_back, $select_main_color,
  $select_post_layout, $select_title_font, $select_content_font, $select_widgets_num, $select_widgets_header, $select_logo, $select_nav_links, $slider_speed,
  $select_back_button, $share_this_button, $header_meta, $select_post_links, $select_single_header, $select_archives_header, $select_tagline_pos, $select_similar_posts; 
  
  


	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'evolve'";
            $wpdb->query($query);
            header("Location: themes.php?page=theme_options");
            die;
     } 
   
?>
 



	<div class="wrap">
  
 
  
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />


 <div style="margin-bottom:15px;padding:0 20px;clear:both;float:right;background:url('<?php echo get_template_directory_uri(); ?>/library/media/images/light-grey-blue/header-light.jpg') repeat-x scroll left bottom #FBFBFB;border:2px solid #ccc;-moz-border-radius:4px;-moz-box-shadow:0 1px 8px #bbb;">
  
       
   <div style="float:right;font-weight:bold;position:relative;top:20px;">Developed by <a title="Visit author homepage" href="http://theme4press.com">Theme4Press</a></div>
    
    
    <h2 style="font-size:18px;float:left;">Thanks for using EvoLve</h2>
    
     <div style="position:relative;top:14px;float:left;"> 
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ANE8DXKXNC476" target="_blank" rel="nofollow">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" width="92" height="26">
</a> 
</div>
   
     <p style="clear:both;">Do you enjoy this theme? <a href="http://theme4press.com/evolve">Send your ideas - issues - wishes</a> or help in development by a donation. Thank you!</p>
     
    
    </div>  
    
    
    
    <map id="upgrade-map" name="upgrade-map">
<area coords="0,0,319,82" title="EvoLve Pro" target="_blank" href="http://theme4press.com/evolve-pro/">
<area coords="320,0,484,82" title="EvoLve Advance" target="_blank" href="http://theme4press.com/evolve-advance/">
</map>

<img style="margin-bottom:20px;float:right;position:relative;top:10px;right:20px;" width="484" height="82" border="0" usemap="#upgrade-map" alt="Upgrade EvoLve" src="<?php echo get_template_directory_uri(); ?>/library/media/images/evolve-upgrade.png">

    

    
    
    

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  


 

  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      

    
      

    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#evl-tab-1"><span>Design</span></a></li>
        <li><a href="#evl-tab-2"><span>Posts</span></a></li>
        <li><a href="#evl-tab-3"><span>Subscribe settings</span></a></li>
        <li><a href="#evl-tab-4"><span>Header content</span></a></li>        
        <li><a href="#evl-tab-5"><span>Footer content</span></a></li>
        <li><a href="#evl-tab-6"><span>Styles</span></a></li>
        <li><a href="#evl-tab-7"><span>Navigation</span></a></li>
        <li><a href="#evl-tab-8"><span>Ads</span></a></li>
    </ul>
    
    <div class="tabContainer">




		
			<?php settings_fields( 'evolve_options' ); ?>
			<?php $options = get_option( 'evolve' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>
 
<?php break; 
 
case "title":
?>
<table width="100%" border="0" style="background: url('<?php get_template_directory_uri(); ?>/library/media/images/widget-title.gif') no-repeat scroll left bottom #575A62;-moz-border-radius:6px 6px 0 0;
-moz-box-shadow:0 1px 2px #AAAAAA;
border:1px solid #494C55;
color:#FFFFFF;
font-weight:bold;
letter-spacing:-2px;
padding:7px 10px;
text-shadow:0 1px 3px #444444;
text-transform:uppercase;">

<tr>
<td colspan="2"><h3 style="font-size:22px;margin:0;"><?php echo $value['name']; ?></h3></td>
</tr>

 
<?php break;
 
case 'text':
?>
 
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><input style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

                                                                                                                                                                                       

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>


<!-- NEWSLETTER -->


<?php break; 

case 'text1':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Newsletter</strong>


</td> 


<td width="85%"><input style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>

  

<!-- FACEBOOK --> 

<?php break; 

case 'text2':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Facebook</strong>

</td>



<td width="85%" id="focus-input"><input title="If your Facebook page is <strong>http://facebook.com/Example</strong>, insert only <strong>Example</strong>" style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
 
<!-- TWITTER -->

<?php break; 

case 'text3':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Twitter</strong>

</td>



<td width="85%" id="focus-input"><input title="If your Twitter page is <strong>http://twitter.com/username</strong>, insert only <strong>username</strong>" style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
   
   
<!-- GOOGLE BUZZ -->

<?php break; 

case 'text4':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Google Buzz</strong>

</td>



<td width="85%" id="focus-input"><input title="If your Google Buzz page is <strong>http://google.com/profiles/example</strong>, insert only <strong>example</strong>" style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
     

<!-- MYSPACE -->

<?php break; 

case 'text5':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>MySpace</strong>

</td>



<td width="85%" id="focus-input"><input title ="If your MySpace page is <strong>http://myspace.com/username</strong>, insert only <strong>username</strong>" style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
     

<!-- SKYPE -->

<?php break; 

case 'text6':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Skype</strong>

</td>



<td width="85%"><input style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>


<!-- YOUTUBE -->

<?php break; 

case 'text7':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>YouTube</strong>

</td>



<td width="85%" id="focus-input"><input title="If your YouTube page is <strong><strong>http://youtube.com/user/Username</strong></strong>, insert only <strong>Username</strong>" style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
     

<!-- FLICKR -->

<?php break; 

case 'text8':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Flickr</strong>

</td>

<td width="85%" id="focus-input"><input title="If your Flickr page is <strong>http://flickr.com/photos/example</strong>, insert only <strong>example</strong>" style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
 


<!-- LinkedIn -->

<?php break; 

case 'text9':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>LinkedIn</strong>

</td>

<td width="85%" id="focus-input"><input style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>
                                                                                                                                                                                  

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
  
 
 
 



<?php
break;
 
case 'textarea1':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 1 - Header Top</strong>


</td>


 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'textarea2':
?>



<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 2 - Header Bottom</strong>


</td>

 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'textarea3':
?>


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 3 - Sidebar 1 Top</strong>

</td>
 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
      
 
<?php
break;
 
case 'textarea4':
?>

<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 4 - Sidebar 1 Bottom</strong>

</td>
 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
      

<?php
break;
 
case 'textarea5':
?>

<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 5 - Sidebar 2 Top</strong>

</td>
 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                                             
 
<?php
break;
 
case 'textarea6':
?>

<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 6 - Sidebar 2 Bottom</strong>

</td>
 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'textarea7':
?>

<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 7 - Post Top</strong>

</td>
 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'textarea8':
?>

<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 8 - Post Bottom</strong>

</td>


 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'textarea9':
?>
 
<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Ad Space 9 - Footer</strong>

</td>
 
 
 
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
       

<?php
break;
 
case 'textarea':
?>
 
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><textarea id="<?php echo 'evolve['.$value['id'].']'; ?>" name="<?php echo 'evolve['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar_num as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
     
     
<?php
break;
 
case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;
 
case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_width as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_home_header as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%" ><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="evolveselect5">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_content_back as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
       

<?php
break;

case 'select6':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_menu_back as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
       

<?php
break;

case 'select7':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_main_color as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select8':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_post_layout as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select9':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_title_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
          

<?php
break;

case 'select10':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_content_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
          

<?php
break;

case 'select11':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_widgets_num as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                

<?php
break;

case 'select12':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_widgets_header as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
     
<?php
break;

case 'select13':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_logo as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
     
 
 
<?php
break;

case 'select14':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_nav_links as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            

<?php
break;

case 'select15':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $slider_speed as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                        
<?php
break;

case 'select16':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_back_button as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select17':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $share_this_button as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                        

<?php
break;

case 'select18':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $header_meta as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                        
            
<?php
break;

case 'select19':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_post_links as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                                 
<?php
break;

case 'select20':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_single_header as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select21':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_archives_header as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select22':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_tagline_pos as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
        

<?php
break;

case 'select23':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'evolve['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_similar_posts as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
      
                        
                    
<?php
break;
 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'evolve['.$value['id'].']'; ?>" id="<?php echo 'evolve['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>



 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;
case 'upload':
?>   


<tr>

<td width="15%" rowspan="2" valign="middle"><strong>Custom logo</strong>


 
<tr>
<td width="85%">


    <?php settings_fields('evolve_options'); ?>
    <?php do_settings_sections('ud'); 
    
    echo "<input type='file' name='ud_filename' size='30' />";?>
    
    <br />
    <small>Upload a logo image to use</small>
  


</td>
</tr>


        
        <tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


 
<?php break;
 
}
}
?>



      
    
    
      </div>  
    </div>    
      

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>
    
    
  

    
    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>Be carefull, all options will be removed!</small>
</p>
</form> 



    <script type="text/javascript">
    $(function() {
      $('#focus-input [title]').tipsy({trigger: 'focus', gravity: 's', opacity:1, html: true});
    });
  </script>
  
  

  
  
  
  


	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_sidebar, $select_back_button, $select_sidebar_num, $select_width, $select_home_header, $select_content_back, $select_menu_back, $select_main_color,
  $select_post_layout, $select_title_font, $select_content_font, $select_widgets_num, $select_widgets_header, $select_logo, $select_nav_links, $slider_speed,
  $share_this_button, $header_meta, $select_post_links, $select_single_header, $select_archives_header, $select_tagline_pos, $select_similar_posts;

	// Our checkbox value is either 0 or 1
  
  if ( ! isset( $input['evl_back_images'] ) )
		$input['evl_back_images'] = null;
	$input['evl_back_images'] = ( $input['evl_back_images'] == 1 ? 1 : 0 ); 
  
  
     if ( ! isset( $input['evl_custom_background'] ) )
		$input['evl_custom_background'] = null;
	$input['evl_custom_background'] = ( $input['evl_custom_background'] == 1 ? 1 : 0 ); 
  
  
    if ( ! isset( $input['evl_top_button'] ) )
		$input['evl_top_button'] = null;
	$input['evl_top_button'] = ( $input['evl_top_button'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['evl_logo_display'] ) )
		$input['evl_logo_display'] = null;
	$input['evl_logo_display'] = ( $input['evl_logo_display'] == 1 ? 1 : 0 ); 
  
    if ( ! isset( $input['evl_blog_tagline'] ) )
		$input['evl_blog_tagline'] = null;
	$input['evl_blog_tagline'] = ( $input['evl_blog_tagline'] == 1 ? 1 : 0 ); 
  
      if ( ! isset( $input['evl_blog_title'] ) )
		$input['evl_blog_title'] = null;
	$input['evl_blog_title'] = ( $input['evl_blog_title'] == 1 ? 1 : 0 ); 
  
      if ( ! isset( $input['evl_main_menu'] ) )
		$input['evl_main_menu'] = null;
	$input['evl_main_menu'] = ( $input['evl_main_menu'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['evl_excerpt_thumbnail'] ) )
		$input['evl_excerpt_thumbnail'] = null;
	$input['evl_excerpt_thumbnail'] = ( $input['evl_excerpt_thumbnail'] == 1 ? 1 : 0 ); 
    
  
  
           if ( ! isset( $input['evl_author_avatar'] ) )
		$input['evl_author_avatar'] = null;
	$input['evl_author_avatar'] = ( $input['evl_author_avatar'] == 1 ? 1 : 0 );  
  
  


	// Say our text option must be safe text with no HTML tags
	$input['evl_rss_feed'] = wp_filter_nohtml_kses( $input['evl_rss_feed'] );
  
   $input['evl_newsletter'] = wp_filter_nohtml_kses( $input['evl_newsletter'] ); 
    
   $input['evl_facebook'] = wp_filter_nohtml_kses( $input['evl_facebook'] ); 
  
   $input['evl_twitter_id'] = wp_filter_nohtml_kses( $input['evl_twitter_id'] );   
  
   $input['evl_google_buzz'] = wp_filter_nohtml_kses( $input['evl_google_buzz'] );  
  
   $input['evl_myspace'] = wp_filter_nohtml_kses( $input['evl_myspace'] );  
  
   $input['evl_skype'] = wp_filter_nohtml_kses( $input['evl_skype'] );   
  
   $input['evl_youtube'] = wp_filter_nohtml_kses( $input['evl_youtube'] );   
  
   $input['evl_flickr'] = wp_filter_nohtml_kses( $input['evl_flickr'] ); 
   
     
   
	$input['evl_space_1'] = wp_filter_post_kses( $input['evl_space_1'] );
  
  $input['evl_space_2'] = wp_filter_post_kses( $input['evl_space_2'] );
  
  $input['evl_space_3'] = wp_filter_post_kses( $input['evl_space_3'] );
  
  $input['evl_space_4'] = wp_filter_post_kses( $input['evl_space_4'] );
  
  $input['evl_space_5'] = wp_filter_post_kses( $input['evl_space_5'] );
  
  $input['evl_space_6'] = wp_filter_post_kses( $input['evl_space_6'] );
  
  $input['evl_space_7'] = wp_filter_post_kses( $input['evl_space_7'] );
  
  $input['evl_space_8'] = wp_filter_post_kses( $input['evl_space_8'] );
  
  $input['evl_space_9'] = wp_filter_post_kses( $input['evl_space_9'] );

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['evl_footer_content'] = wp_filter_post_kses( $input['evl_footer_content'] );
  

  
  
   $options = get_option('evolve');
  if ($_FILES['ud_filename']['name'] != '') {
       $overrides = array('test_form' => false); 
       $file = wp_handle_upload($_FILES['ud_filename'], $overrides);
       $input['file'] = $file;
   }     else {
        $input['file'] = $options['file'];
    }

	return $input;    
  
  
  
         
  


}






?>
<?php


/**
 * Functions - Evolve gatekeeper
 *
 * This file defines a few constants variables, loads up the core Evolve file, 
 * and finally initialises the main WP Evolve Class.
 *
 * @package EvoLve
 * @subpackage Functions
 */

define( 'WP_Evolve', '0.2.4' ); // Defines current version for WP Evolve
	
	/* Blast you red baron! Initialise WP Evolve */
	require_once( get_template_directory() . '/library/evolve.php' );
	WPevolve::init();



/* Truncate */

function truncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function get_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
}  

function ud_section_text() {
    $options = get_option('evolve');
    if ($file = $options['file']) {
        echo "Logo preview<br /><br /><img src='{$file['url']}' /><br /><br />";
        echo "<input disabled='disabled' value='{$file['url']}' size='70' />";
        

    }
}

function ud_setting_filename() {
  }
  
/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}



// Add scripts and stylesheet

  function evolve_scripts() {
        wp_enqueue_script('myjquery');
        wp_enqueue_script('myjqueryui');
        wp_enqueue_script('myjquerycookie');
        wp_enqueue_script('myjquerytipsy');
        wp_enqueue_script('myevolve');
   }
    
 function evolve_styles() {
       wp_enqueue_style('mycss');
   }
    

// Tiny URL

function evolve_tinyurl($url) {
    $response = wp_remote_retrieve_body(wp_remote_get('http://tinyurl.com/api-create.php?url='.$url));
    return $response;
}


// Similar Posts 

function similar_posts() {

$post = '';
$orig_post = $post;
global $post;

$options = get_option('evolve'); if ($options['evl_similar_posts'] == "category") { 
$matchby = get_the_category($post->ID);
$matchin = 'category';
} else {
$matchby = wp_get_post_tags($post->ID);
$matchin = 'tag'; }


if ($matchby) {
	$matchby_ids = array();
	foreach($matchby as $individual_matchby) $matchby_ids[] = $individual_matchby->term_id;

	$args=array(
		$matchin.'__in' => $matchby_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5, // Number of related posts that will be shown.
		'caller_get_posts'=>1
	);  

	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
_e( '<div style="padding:5px;margin-bottom:40px;"><h5 style="font-style:italic;">Similar posts</h5><ul style="margin-bottom:0px;">', 'evolve' );
		while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
			<li style="padding-bottom:5px;">
      
     <a style="font-weight:bold;font-size:15px;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<?php

if ( get_the_title() ){ $title = the_title('', '', false);
echo truncate($title, 40, '...'); }else{ echo "Untitled"; }


 ?></a>

  <?php if ( get_the_content() ) { ?> &mdash; <small style="font-style:italic;"><?php $postexcerpt = get_the_content();
$postexcerpt = apply_filters('the_content', $postexcerpt);
$postexcerpt = str_replace(']]>', ']]&gt;', $postexcerpt);
$postexcerpt = strip_tags($postexcerpt);
$postexcerpt = strip_shortcodes($postexcerpt);

echo truncate($postexcerpt, 60, '...');
 ?></small> <?php } ?>
      
      </li>
		<?php
		}
		echo '</ul></div>';
	}
}
$post = $orig_post;
wp_reset_query();   

}

function addDashboardWidgets() {
			wp_add_dashboard_widget( 'dashboardb_evolve' , 'Recent on Blogatize Network' , 'dashboardWidget' );
		}

		function dashboardWidget() {
			$args = array(
				'url'			=> 'http://feeds.feedburner.com/BlogatizeBlogNetwork',
				'items'			=> '3',
				'show_date'		=> 1,
				'show_summary'	=> 1,
			);
			echo '<div class="rss-widget">';
			echo '<a href="http://blogatize.net"><img class="alignright" src="'.get_template_directory_uri().'/library/media/images/blogatize-logo.png" /></a>';
			wp_widget_rss_output( $args );
			echo '<p style="border-top: 1px solid #CCC; padding-top: 10px; font-weight: bold;">';
			echo '<a href="http://feeds.feedburner.com/BlogatizeBlogNetwork"><img src="'.site_url().'/wp-includes/images/rss.png" alt=""/> Subscribe with RSS</a> | <a href="http://blogatize.net">Join Us with Your Blog</a>';
			echo "</p>";
			echo "</div>";
		}   


function footer_hooks() { ?>


<script type="text/javascript" charset="utf-8">
var $jx = jQuery.noConflict();
  $jx("div.post").mouseover(function() {
    $jx(this).find("span.edit-post").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-post").css('visibility', 'hidden');
  });
  
    $jx("div.type-page").mouseover(function() {
    $jx(this).find("span.edit-page").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-page").css('visibility', 'hidden');
  });
  
      $jx("div.type-attachment").mouseover(function() {
    $jx(this).find("span.edit-post").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-post").css('visibility', 'hidden');
  });
  
  $jx("li.comment").mouseover(function() {
    $jx(this).find("span.edit-comment").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-comment").css('visibility', 'hidden');
  });
</script> 

<script type="text/javascript" charset="utf-8">
var $j = jQuery.noConflict();
  $j(document).ready(function(){  
    $j('.tipsytext').tipsy({gravity:'n',fade:true,offset:0,opacity:1});
   });
   </script> 

<?php $options = get_option('evolve');

if ($options['evl_header_slider'] !== "disable" || $options['evl_header_slider'] !== "") {


  if ($options['evl_header_slider'] == "normal" || $options['evl_header_slider'] == "") { ?>

<script type="text/javascript" charset="utf-8">
var $s = jQuery.noConflict();
	jQuery(function($s){
		$s('#slide_holder').loopedSlider({
			autoStart: 7000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($options['evl_header_slider'] == "slow") { ?>

<script type="text/javascript" charset="utf-8">
var $s = jQuery.noConflict();
	jQuery(function($s){
		$s('#slide_holder').loopedSlider({
			autoStart: 10000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($options['evl_header_slider'] == "fast") { ?>

<script type="text/javascript" charset="utf-8">
var $s = jQuery.noConflict();
jQuery(function($s){
		$s('#slide_holder').loopedSlider({
			autoStart: 3500,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } } ?>  
	
<?php echo evolve_copy(); }


/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
  
  
  
  
if ($options['evl_custom_background'] == "1") { 
add_custom_background();
}  

 // Share This Buttons

function evolve_sharethis() { ?>
    <div class="share-this">
          <strong><?php _e( 'SHARE THIS', 'evolve' ); ?></strong>
          <a rel="nofollow" target="_blank" class="share-twitter" href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+&raquo;+<?php echo evolve_tinyurl(get_permalink()); ?>">Twitter</a>
          <a rel="nofollow" target="_blank" class="share-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>">Facebook</a>
          <a rel="nofollow" target="_blank" class="share-delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">Delicious</a>
          <a rel="nofollow" target="_blank" class="share-stumble" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">StumbleUpon</a>
          <a rel="nofollow" target="_blank" class="share-email" href="http://www.addtoany.com/email?linkurl=<?php the_permalink(); ?>&linkname=<?php the_title(); ?>"><?php _e( 'E-mail', 'evolve' ); ?></a>
          <a rel="nofollow" class="tipsytext" style="position:relative;top:3px;left:8px;" title="<?php _e( 'More options', 'evolve' ); ?>" target="_blank" href="http://www.addtoany.com/share_save#url=<?php the_permalink(); ?>&linkname=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/media/images/share-more.gif" /></a>
          </div>
<?php } ?>