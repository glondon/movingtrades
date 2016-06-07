<?php

/**
 * Template: Sidebar.php
 *
 * @package EvoLve
 * @subpackage Template
 *
 */

?>

        <!--BEGIN #secondary-2 .aside-->

        <div id="secondary-2" class="aside">

      
          <!-- AD Space 5 -->
  

    <?php $options = get_option('evolve');

     if (!empty($options['evl_space_5'])) { 

 $ad_space_5 = $options['evl_space_5']; 

 echo '<div style="text-align:center;margin-bottom:25px;overflow:hidden;">'.stripslashes($ad_space_5).'</div>';

 } 

?> 

			<?php	/* Widgetized Area */

					if ( !dynamic_sidebar( 'sidebar-2' )) : ?>

     <!--BEGIN #widget-pages-->

            <div id="widget-pages" class="widget">

				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Pages', 'evolve' ); ?><?php widget_after_title(); ?>

				<ul>

					<?php wp_list_pages('title_li='); ?> 

				</ul>

          <?php widget_after_widget(); ?> 

            <!--END #widget-pages-->

			<!--BEGIN #widget-archives-->

            <div id="widget-archives" class="widget">

				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Archives', 'evolve' ); ?><?php widget_after_title(); ?>

				<ul>

					<?php wp_get_archives( 'type=monthly' ) ?>

				</ul>

          <?php widget_after_widget(); ?>   

            <!--END #widget-archives-->

                          <!--BEGIN #widget-comments-->

        <div id="widget-comments" class="widget">

				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Recent Comments', 'evolve' ); ?><?php widget_after_title(); ?>

          <?php

global $wpdb;

$output = '';

$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,

comment_post_ID, comment_author, comment_date_gmt, comment_approved,

comment_type,comment_author_url,

SUBSTRING(comment_content,1,30) AS com_excerpt

FROM $wpdb->comments

LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =

$wpdb->posts.ID)

WHERE comment_approved = '1' AND comment_type = '' AND

post_password = ''

ORDER BY comment_date_gmt DESC

LIMIT 5";    // number of comments

$comments = $wpdb->get_results($sql);

$output .= "\n<ul>";

foreach ($comments as $comment) {

$output .= "\n<li>".strip_tags($comment->comment_author)

." on " . "<a href=\"" . get_permalink($comment->ID) .

"#comment-" . $comment->comment_ID . "\">" . $comment->post_title

."</a></li>";

}

$output .= "\n</ul>";

echo $output;?>

            <?php widget_after_widget(); ?>  

               <!--END #widget-comments-->

                           <!--BEGIN #widget-calendar-->

        <div id="widget-calendar" class="widget">

				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Calendar', 'evolve' ); ?><?php widget_after_title(); ?>

               <?php get_calendar(); ?>

                    <?php widget_after_widget(); ?> 

               <!--END #widget-calendar-->

            <!--BEGIN #widget-meta-->

            <div id="widget-meta" class="widget">

				<?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Meta', 'evolve' ); ?><?php widget_after_title(); ?>

				<ul>

					<?php wp_register(); ?>

					<li><?php wp_loginout(); ?></li>

					<?php wp_meta(); ?>

</ul>

			<?php widget_after_widget(); ?>

      			<!--END #widget-meta-->

			<?php endif; /* (!function_exists('dynamic_sidebar') */ ?>

		<!--END #secondary-2 .aside-->    

     <!-- AD Space 6 -->

    <?php $options = get_option('evolve');

     if (!empty($options['evl_space_6'])) { 

 $ad_space_6 = $options['evl_space_6']; 

 echo '<div style="text-align:center;margin-bottom:25px;overflow:hidden;">'.stripslashes($ad_space_6).'</div>';

 } 

?>     

		</div>

    

