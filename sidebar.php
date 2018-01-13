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

                            <div style="padding-left:28px;">
                                <div id="loadingDiv"><img src="<?php echo get_template_directory_uri() ?>/library/media/images/loading.gif" /></div>
                                <div id="sub_success" style="display:none"></div>
                                <form action="subscribe.php" method="post" id="subscribe_form">
                                  <fieldset id="subscribe_fieldset">
                                    <legend id="subscribe_legend">Free Trade Ideas</legend>
                                    <ul id="sub_errors" style="display:none;color:red;text-align:left;list-style:none"></ul>
                                    <input type="text" name="name" id="subscribe_name" value="" placeholder="Name" />
                                    <input type="text" name="phone" id="subscribe_phone" value="" placeholder="Phone (optional)" />
                                    <input type="text" name="email" id="subscribe_email" value="" placeholder="Email" />
                                    <textarea rows="2" cols="16" name="comments" id="subscribe_comments" placeholder="Comments (optional)" maxlength="100"></textarea>
                                    <input name="captcha" id="subscribe_captcha" type="text" placeholder="Enter Text"><br>
                                    <img src="<?php echo get_template_directory_uri() ?>/captcha.php" id="captcha_img" /><br>
                                    <input type="submit" id="subscribe_submit" value="Subscribe" />
                                  </fieldset>
                                </form>
                                <script type="text/javascript">
                                  $('document').ready(function(){
                                    //subscribe
                                    $('#subscribe_submit').click(function(e){

                                        e.preventDefault();

                                        $('#sub_errors').empty();

                                        $.post('<?php echo get_template_directory_uri() ?>/subscribe.php', $('#subscribe_form').serialize(), function(data){
                                          if(data.success){
                                            $('#sub_success').fadeIn();
                                            $('#sub_success').html('<p>Thank you for subscribing!</p>');
                                            $('#subscribe_form').fadeOut();
                                          } 
                                          else{
                                            $('#sub_errors').show();
                                            for(var i in data.errors)
                                              $('#sub_errors').append('<li>' + data.errors[i] + '</li>');                                 
                                          }

                                        }, 'json');
                                    });
                                  });
                                  // Ajax loading gif...
                                $(document).ajaxStart(function(){
                                    $('#loadingDiv').show();
                                 }).ajaxStop(function(){
                                    $('#loadingDiv').hide();
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