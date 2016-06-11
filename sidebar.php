<?php

/**
 * Template: Sidebar.php
 *
 * @package EvoLve
 * @subpackage Template
 *
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

        <!-- begin hardcoded sidebar -->

        <!--BEGIN #widget-categories-->
        <div id="widget-categories" class="widget">
            <?php widget_before_widget(); ?><?php widget_before_title(); ?><?php _e( 'Categories', 'evolve' ); ?><?php widget_after_title(); ?>
            <ul>
                <?php wp_list_categories( 'title_li=' ); ?>
            </ul>
                <?php widget_after_widget(); ?>    
        <!--END #widget-categories-->

        <div id="text-3" class="widget widget_text">
            <div style="position:relative;">
                <div class="wmiddle-left"></div>
                <div class="wmiddle-right"></div>
                    <div class="widget-content">
                        <div class="textwidget">

                            <div style="padding-left:28px;"><script type="text/javascript" src="http://www.getresponse.com/view_webform.js?wid=89487"></script></div>

                        </div>
                    </div>
                <div class="wbottom"></div>
                <div class="wsbottom-left"></div>
                <div class="wsbottom-right"></div>
            </div>
        </div>

        <?php if (!is_page('resources')) { ?>

        <div id="text-4" class="widget widget_text">
            <div style="position:relative;">
                <div class="wmiddle-left"></div>
                <div class="wmiddle-right"></div>
                    <div class="widget-content">
                        <div class="textwidget">

                            <div align="center" style="padding-left:1px;">
                                <script type="text/javascript"><!--
                                    google_ad_client = "ca-pub-0372492470050030";
                                    /* 250x250, for make money sidebar blog created 4/28/10 */
                                    google_ad_slot = "4684889512";
                                    google_ad_width = 250;
                                    google_ad_height = 250;
                                    //-->
                                    </script>
                                    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                                </script>
                            </div>

                        </div>
                    </div>
                <div class="wbottom"></div>
                <div class="wsbottom-left"></div>
                <div class="wsbottom-right"></div>
            </div>
        </div>

        <div id="text-5" class="widget widget_text">
            <div style="position:relative;">
                <div class="wmiddle-left"></div>
                <div class="wmiddle-right"></div>
                    <div class="widget-content">
                        <div class="textwidget">

                            <div align="center">
                                <a class="twitter-timeline"  href="https://twitter.com/signupmakemoney" data-widget-id="739560338610257921">Tweets by @signupmakemoney</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                            </div>

                        </div>
                    </div>
                <div class="wbottom"></div>
                <div class="wsbottom-left"></div>
                <div class="wsbottom-right"></div>
            </div>
        </div>

        <div id="text-6" class="widget widget_text">
            <div style="position:relative;">
                <div class="wmiddle-left"></div>
                <div class="wmiddle-right"></div>
                    <div class="widget-content">
                        <div class="textwidget">

                            <div align="center"> 
                                <script src='http://static.profit.ly/static/widget/5/widget.pack.js'></script>
                                <script>
                                var widget = new PROFITLY.Widget({
                                  name: 'signupmakemoney',
                                  trades: 20,
                                  width: 250,
                                  type: 'user',
                                  style: 'tradetable',
                                  affiliate: 8158,
                                  percentage: false,
                                  height: 300
                                });
                                </script>
                            </div>

                        </div>
                    </div>
                <div class="wbottom"></div>
                <div class="wsbottom-left"></div>
                <div class="wsbottom-right"></div>
            </div>
        </div>

        <?php } ?>
        
        <!-- end hardcoded sidebar -->
        

			<?php	/* Widgetized Area */

					//if ( !dynamic_sidebar( 'sidebar-1' )) : ?>


           <!--BEGIN #widget-posts-->         

           <!-- Don't need this anymore...   

            <div id="widget-posts" class="widget">

				<?php //widget_before_widget(); ?><?php //widget_before_title(); ?><?php //_e( 'Recent Posts', 'evolve' ); ?><?php //widget_after_title(); ?>

				<ul>

<?php //$myposts = get_posts('numberposts=5'); // number of posts

//foreach($myposts as $post) :?>

<li><a title="<?php //the_title();?>" href="<?php //the_permalink(); ?>"><?php //the_title();?></a></li>

<?php //endforeach; ?>

				</ul>

            <?php //widget_after_widget(); ?>   

        -->

                <!--END #widget-posts-->

                



            <!--BEGIN #widget-categories-->

            <!-- Don't need anymore..

            <div id="widget-categories" class="widget">

				<?php //widget_before_widget(); ?><?php //widget_before_title(); ?><?php //_e( 'Categories', 'evolve' ); ?><?php //widget_after_title(); ?>

				<ul>

					<?php //wp_list_categories( 'title_li=' ); ?>

				</ul>

                    <?php //widget_after_widget(); ?>  

                    -->  

                        <!--END #widget-categories-->

			

<?php //if ( get_tags() ) { ?>

            <!--BEGIN #widget-tags-->

            <!-- Don't need anymore...

            <div id="widget-tags" class="widget">

			<?php //widget_before_widget(); ?><?php //widget_before_title(); ?><?php //_e( 'Tags', 'evolve' ); ?><?php //widget_after_title(); ?>

				<?php //wp_tag_cloud( 'title_li=' ); ?>

                     <?php //widget_after_widget(); ?> 

                 -->

                     <!--END #widget-tags-->

<?php //} ?>



                <!--BEGIN #widget-feeds-->

                <!-- Don't need anymore...

            <div id="widget-feeds" class="widget">

				<?php //widget_before_widget(); ?><?php //widget_before_title(); ?><?php //_e( 'RSS Syndication', 'evolve' ); ?><?php //widget_after_title(); ?>

				<ul>

					<li><a href="<?php //bloginfo( 'rss2_url' ); ?>" title="<?php //echo esc_html( get_bloginfo( 'name' ), 1 ) ?> Posts RSS feed" rel="alternate" type="application/rss+xml"><?php //_e( 'All posts', 'evolve' ); ?></a></li>

					<li><a href="<?php //bloginfo( 'comments_rss2_url' ); ?>" title="<?php //echo esc_html( bloginfo( 'name' ), 1 ) ?> Comments RSS feed" rel="alternate" type="application/rss+xml"><?php //_e( 'All comments', 'evolve' ); ?></a></li>

				</ul>

                <?php //widget_after_widget(); ?> 

                -->

                     <!--END #widget-feeds-->







			<?php //endif; /* (!function_exists('dynamic_sidebar') */ ?>

		<!--END #secondary .aside-->

    

      <!-- AD Space 4 -->

  

  

    <?php $options = get_option('evolve');

     if (!empty($options['evl_space_4'])) { 

    

 $ad_space_4 = $options['evl_space_4']; 

 echo '<div style="text-align:center;margin-bottom:25px;overflow:hidden;">'.stripslashes($ad_space_4).'</div>';

 

 } 

?> 

		</div>  