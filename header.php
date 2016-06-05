<?php
/**
 * Template: Header.php 
 *
 * @package EvoLve
 * @subpackage Template
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--BEGIN html-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


<!--BEGIN head-->
<head profile="<?php get_profile_uri(); ?>">
<link rel="shortcut icon" href="http://movingtrades.com/wp-content/uploads/2011/06/favicon.ico" />
<meta name="google-site-verification" content="_lc3RDeZy7ijhTS6UHJhFeQkhoZrEChxuEZ6nOSaDrg" />
<META name="y_key" content="30253c560692ba8b" />

	<title><?php

	global $page, $paged;

	wp_title( '-', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " - $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' - ' . sprintf( __( 'Page %s', 'evolve' ), max( $paged, $page ) );

	?></title>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo CSS . '/print.css'; ?>" type="text/css" media="print" />
  

  <!-- Custom Stylesheets -->
  
  <?php get_template_part('custom-css', 'header'); ?>
  
	<!-- Theme Hook -->
  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments ?>  
  
	<?php wp_head(); ?>     

 <?php $options = get_option('evolve'); 
 $css_content = $options['evl_css_content'];
 if (!empty($css_content)) {
 echo '<style type="text/css">'.stripslashes($css_content).'</style>'; } ?>      

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3173227-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--END head-->
</head>



<!--BEGIN body-->
<body <?php body_class(); ?>>

<?php if ($options['evl_custom_background'] == "1") { ?>
<div id="wrapper">
<?php } ?>

<div id="top"></div>





	<!--BEGIN .header-->
		<div class="header" style="margin: 0 auto;<?php if( get_header_image() ) { ?>padding:10px 20px 35px 20px;width: 940px;background:url('<?php header_image(); ?>');<?php } ?>">
    
	<!--BEGIN .container-->
	<div class="container" style="margin-bottom:0px;">
  
  
  
  <!-- AD Space 1 -->
  
 <div style="float:right;margin-left:10px;margin-right:60px;margin-top:15px;overflow:hidden;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-0372492470050030";
/* 468x60, index top banner created 2/4/09 */
google_ad_slot = "0229271147";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>               
  
  <?php $options = get_option('evolve'); if ($options['evl_pos_logo'] == "disable") { ?>
  
  <?php } else { ?>
  
    <?php $options = get_option('evolve');
    if ($file = $options['file']) {
        echo "<a href=".home_url()."><img id='logo-image' src='{$file['url']}' /></a>";
    }
      ?>  
     
     <?php } ?> 
     
     
     <?php 
     $taglinestyle = '';
     
     if (($options['evl_tagline_pos'] !== "disable") && ($options['evl_tagline_pos'] == "under")) {
     $taglinestyle = "style='clear:left;padding-top:10px;'";
     } 
     
     if (($options['evl_tagline_pos'] !== "disable") && ($options['evl_tagline_pos'] == "above")) {
     $taglinestyle = "style='padding-top:0px;'";  }
     
     $tagline = '<div id="tagline" '.$taglinestyle.'>'.get_bloginfo( 'description' ).'</div>';
     
     if (($options['evl_tagline_pos'] !== "disable") && ($options['evl_tagline_pos'] == "above")) { 
     $taglinestyle = "padding-top:10px;'";
     
     echo $tagline;
      
     } ?>
     
     
     <?php if ($options['evl_blog_title'] == "1") { ?>
      
     <?php } else { ?> 
     
     
       
			<div id="logo"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a></div>
      
      <?php } if (($options['evl_tagline_pos'] !== "disable") && (($options['evl_tagline_pos'] == "") || ($options['evl_tagline_pos'] == "next") || ($options['evl_tagline_pos'] == "under")))    
      {
			echo $tagline;
      
      } ?>

	<!--END .container-->
		</div>
    
    		<!--END .header-->
		</div>
    
  
  <div class="menu-container">
          	
	<div class="menu-back">
  
  

  
  <!--BEGIN .container-menu-->
  <div class="container nacked-menu" style="margin:0 auto;padding-bottom:10px;position:relative;z-index:99;">

     <?php if ($options['evl_main_menu'] == "1") { ?>
    <br /><br />
    
   <?php } else { ?>

  <div class="menu-top-left"></div>
  <div class="menu-top-right"></div>
  
  <div class="menu-bottom-left"></div>
  <div class="menu-bottom-right"></div>
  
  <div class="menu-middle-left"></div>
  <div class="menu-middle-right"></div> 
  
    <div class="menu-top"></div>
    <div class="menu-bottom"></div>
    
     <div class="menu-middle"></div>
    
    <?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
 
     
     <?php wp_nav_menu( array( 'container_class' => 'menu', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>
      
      <?php } else { ?>
      
      
	        <?php wp_page_menu( 'show_home=1' ); ?>
          
          <?php } ?>  
       
       <?php } ?>
       
       
       
       
       </div>


        <!--BEGIN header-content.php -->
        
         <?php $options = get_option('evolve'); 
  if ($options['evl_home_header_content'] == "disable") { ?>
  
  <?php } else { ?>
  
  
  <?php get_template_part('header-content', 'header'); ?>
       
       <?php } ?>
       
        <!--END header-content.php -->
        
        
          <?php $options = get_option('evolve');

// if Header widgets exist

  if (($options['evl_widgets_header'] == "") || ($options['evl_widgets_header'] == "disable"))  
{ } else { ?>
     
  <div class="container widgets-back" style="margin-top:0;margin-bottom:0;width:100%;">  
  
    
        <!--BEGIN .widgets-holder-->
    <div class="widgets-holder widgets-back-inside" style="margin:0 auto;">
    
    <div class="header-1">
    	<?php	if ( !dynamic_sidebar( 'header-1' )) : ?>
      <?php endif; ?>
      </div>
     
     <div class="header-2"> 
      <?php	if ( !dynamic_sidebar( 'header-2' ) ) : ?>
      <?php endif; ?>
      </div>
    
    <div class="header-3">  
	    <?php	if ( !dynamic_sidebar( 'header-3' ) ) : ?>
      <?php endif; ?>
      </div>      
    
    
    <div class="header-4">  
    	<?php	if ( !dynamic_sidebar( 'header-4' ) ) : ?>
      <?php endif; ?>
      </div>
        
    </div> 
    
    <!--END .widgets-holder--> 
    
   </div>
   
   
   
     <?php } ?>
   
     <!-- AD Space 2 -->
  
  
    <?php $options = get_option('evolve');
     if (!empty($options['evl_space_2'])) {
    
 $ad_space_2 = $options['evl_space_2']; 
echo '<div style="clear:both;text-align:center;margin:10px 0 15px 0;overflow:hidden;">'.stripslashes($ad_space_2).'</div>';
 
 } 
?> 
      
      
      </div> 
       
       	<!--BEGIN .content-top-->
       <div class="content-top"></div>
       
             	<!--BEGIN .content-->
	<div class="content <?php semantic_body(); ?>">  
  
 


       	<!--BEGIN .container-->
	<div class="container" style="margin:0px auto;">
  
   


		<!--BEGIN #content-->
		<div id="content">
    
    
    
    <?php $options = get_option('evolve');
  if (($options['evl_sidebar_num'] == "disable") || ($options['evl_sidebar_num'] == "disable") && ($options['evl_width_layout'] == "fluid"))  
  
  
    { ?>
  
  
  <?php } else { ?>

  <?php $options = get_option('evolve');
  if ($options['evl_sidebar_num'] == "two") { ?> 
  
  <?php get_sidebar('2'); ?>
  
  
  <?php } ?>
  
    <?php } ?>  

	