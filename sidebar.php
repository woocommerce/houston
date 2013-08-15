<?php
/**
 * Sidebar template.
 *
 * @package P2
 */
?>
	<div id="sidebar">
	<?php do_action( 'before_sidebar' ); ?>

		<ul>
			<?php
				dynamic_sidebar( 'Sidebar' );
			?>
		</ul>

		<div class="clear"></div>

	</div> <!-- // sidebar -->
