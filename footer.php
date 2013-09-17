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
	    <?php printf( __( 'Theme: %1$s by %2$s.', 'Houston' ), 'Houston', '<a href="http://woothemes.com/" rel="designer">WooThemes</a>' ); ?>
	</p>
</div>

<div id="notify"></div>

<div id="help">
	<dl class="directions">
		<dt>c</dt><dd><?php _e( 'compose new post', 'Houston' ); ?></dd>
		<dt>j</dt><dd><?php _e( 'next post/next comment', 'Houston' ); ?></dd>
		<dt>k</dt> <dd><?php _e( 'previous post/previous comment', 'Houston' ); ?></dd>
		<dt>r</dt> <dd><?php _e( 'reply', 'Houston' ); ?></dd>
		<dt>e</dt> <dd><?php _e( 'edit', 'Houston' ); ?></dd>
		<dt>o</dt> <dd><?php _e( 'show/hide comments', 'Houston' ); ?></dd>
		<dt>t</dt> <dd><?php _e( 'go to top', 'Houston' ); ?></dd>
		<dt>l</dt> <dd><?php _e( 'go to login', 'Houston' ); ?></dd>
		<dt>h</dt> <dd><?php _e( 'show/hide help', 'Houston' ); ?></dd>
		<dt><?php _e( 'shift + esc', 'Houston' ); ?></dt> <dd><?php _e( 'cancel', 'Houston' ); ?></dd>
	</dl>
</div>

<?php wp_footer(); ?>

</body>
</html>