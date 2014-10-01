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
	    <?php printf( __( 'Theme: %1$s by %2$s.', 'Apollo' ), 'Apollo', '<a href="http://woothemes.com/" rel="designer">WooThemes</a>' ); ?>
	</p>
</div>

<div id="notify"></div>

<div id="help">
	<dl class="directions">
		<dt>c</dt><dd><?php _e( 'compose new post', 'Apollo' ); ?></dd>
		<dt>j</dt><dd><?php _e( 'next post/next comment', 'Apollo' ); ?></dd>
		<dt>k</dt> <dd><?php _e( 'previous post/previous comment', 'Apollo' ); ?></dd>
		<dt>r</dt> <dd><?php _e( 'reply', 'Apollo' ); ?></dd>
		<dt>e</dt> <dd><?php _e( 'edit', 'Apollo' ); ?></dd>
		<dt>o</dt> <dd><?php _e( 'show/hide comments', 'Apollo' ); ?></dd>
		<dt>t</dt> <dd><?php _e( 'go to top', 'Apollo' ); ?></dd>
		<dt>l</dt> <dd><?php _e( 'go to login', 'Apollo' ); ?></dd>
		<dt>h</dt> <dd><?php _e( 'show/hide help', 'Apollo' ); ?></dd>
		<dt><?php _e( 'shift + esc', 'Apollo' ); ?></dt> <dd><?php _e( 'cancel', 'Apollo' ); ?></dd>
	</dl>
</div>

<?php wp_footer(); ?>

</body>
</html>