<?php
/**
 * Template: Sidebar.php
 *
 * @package EvoLve
 * @subpackage Template
 */
?>
        <!--BEGIN #secondary .aside-->
        <div id="secondary" class="aside">
        
      
      
  <!-- AD Space 3 -->
  
  
    <?php $options = get_option('evolve');
     if (!empty($options['evl_space_3'])) { 
    
 $ad_space_3 = $options['evl_space_3']; 
  echo '<div style="text-align:center;margin-bottom:25px;overflow:hidden;">'.stripslashes($ad_space_3).'</div>';
 
 } 
?> 
        
        
        
			<?php	/* Widgetized Area */
					if ( !dynamic_sidebar( 'sidebar-1' )) : ?>


           <!--BEGIN #widget-posts-->            
            <div id="widget-posts" class="widget">
				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Recent Posts', 'evolve' ); ?><?php widget_after_title(); ?>
				<ul>
<?php $myposts = get_posts('numberposts=5'); // number of posts
foreach($myposts as $post) :?>
<li><a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
<?php endforeach; ?>
				</ul>
            <?php widget_after_widget(); ?>   
                <!--END #widget-posts-->
                

            <!--BEGIN #widget-categories-->
            <div id="widget-categories" class="widget">
				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Categories', 'evolve' ); ?><?php widget_after_title(); ?>
				<ul>
					<?php wp_list_categories( 'title_li=' ); ?>
				</ul>
                    <?php widget_after_widget(); ?>    
                        <!--END #widget-categories-->
			
<?php if ( get_tags() ) { ?>
            <!--BEGIN #widget-tags-->
            <div id="widget-tags" class="widget">
			<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Tags', 'evolve' ); ?><?php widget_after_title(); ?>
				<?php wp_tag_cloud( 'title_li=' ); ?>
                     <?php widget_after_widget(); ?> 
                     <!--END #widget-tags-->
<?php } ?>

                <!--BEGIN #widget-feeds-->
            <div id="widget-feeds" class="widget">
				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'RSS Syndication', 'evolve' ); ?><?php widget_after_title(); ?>
				<ul>
					<li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ), 1 ) ?> Posts RSS feed" rel="alternate" type="application/rss+xml"><?php _e( 'All posts', 'evolve' ); ?></a></li>
					<li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="<?php echo esc_html( bloginfo( 'name' ), 1 ) ?> Comments RSS feed" rel="alternate" type="application/rss+xml"><?php _e( 'All comments', 'evolve' ); ?></a></li>
				</ul>
                <?php widget_after_widget(); ?> 
                     <!--END #widget-feeds-->



			<?php endif; /* (!function_exists('dynamic_sidebar') */ ?>
		<!--END #secondary .aside-->
    
    
      <!-- AD Space 4 -->
  
  
    <?php $options = get_option('evolve');
     if (!empty($options['evl_space_4'])) { 
    
 $ad_space_4 = $options['evl_space_4']; 
 echo '<div style="text-align:center;margin-bottom:25px;overflow:hidden;">'.stripslashes($ad_space_4).'</div>';
 
 } 
?> 
    
    
		</div>  