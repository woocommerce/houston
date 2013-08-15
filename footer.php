<?php
/**
 * Footer template.
 *
 * @package P2
 */
?>
	<?php get_sidebar(); ?>

	<div class="clear"></div>

</div> <!-- // wrapper -->

<div id="footer">
	<p class="credit">
		<?php echo prologue_poweredby_link(); ?>
	    <?php printf( __( 'Theme: %1$s by %2$s.', 'pWoo' ), 'pWoo', '<a href="http://woothemes.com/" rel="designer">WooThemes</a>' ); ?>
	</p>
</div>

<div id="notify"></div>

<div id="help">
	<dl class="directions">
		<dt>c</dt><dd><?php _e( 'compose new post', 'pWoo' ); ?></dd>
		<dt>j</dt><dd><?php _e( 'next post/next comment', 'pWoo' ); ?></dd>
		<dt>k</dt> <dd><?php _e( 'previous post/previous comment', 'pWoo' ); ?></dd>
		<dt>r</dt> <dd><?php _e( 'reply', 'pWoo' ); ?></dd>
		<dt>e</dt> <dd><?php _e( 'edit', 'pWoo' ); ?></dd>
		<dt>o</dt> <dd><?php _e( 'show/hide comments', 'pWoo' ); ?></dd>
		<dt>t</dt> <dd><?php _e( 'go to top', 'pWoo' ); ?></dd>
		<dt>l</dt> <dd><?php _e( 'go to login', 'pWoo' ); ?></dd>
		<dt>h</dt> <dd><?php _e( 'show/hide help', 'pWoo' ); ?></dd>
		<dt><?php _e( 'shift + esc', 'pWoo' ); ?></dt> <dd><?php _e( 'cancel', 'pWoo' ); ?></dd>
	</dl>
</div>

<?php wp_footer(); ?>

</body>
</html>