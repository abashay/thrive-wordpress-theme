	</div><!-- .content_container -->

	<footer class="footer" role="contentinfo">
		
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer__navigation" role="navigation">
				<?php
					// First footer navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'footer__navigation--one',
						'theme_location' => 'footer',
					) );
				?>
			</nav>
		<?php endif; ?>
		
	</footer>

	<?php wp_footer(); ?>

</body>
</html>
