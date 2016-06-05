<?php
/**
 * Template: Navigation.php 
 *
 * @package EvoLve
 * @subpackage Template
 */

if ( is_singular() and !is_page() ) { ?>
<!--BEGIN .navigation-links-->
<div class="navigation-links single-page-navigation" style="clear:both;">
	<div class="nav-previous"><?php previous_post_link( __( '<span class="nav-meta">&laquo;</span> %link', 'evolve' ) ); ?></div>
	<div class="nav-next"><?php next_post_link( __('<span class="nav-meta">&raquo;</span> %link', 'evolve' ) ); ?></div>
<!--END .navigation-links-->
</div>
<div style="clear:both;"></div>
<?php } else { ?>
<!--BEGIN .navigation-links-->
<div class="navigation-links page-navigation" style="clear:both;">
<?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(); ?>
    <?php else: ?>
	<span class="nav-next"><?php next_posts_link( __( '<span class="nav-meta">&laquo;</span> Older Entries', 'evolve' ) ); ?></span>
	<span class="nav-previous"><?php previous_posts_link( __( 'Newer Entries <span class="nav-meta">&raquo;</span>', 'evolve' ) ); ?></span>
  <?php endif; ?>
<!--END .navigation-links-->
</div>
<div style="clear:both;"></div>

<?php } ?>