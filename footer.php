	</div><!-- .site-content -->

	<footer class="site-footer" role="contentinfo">
		<?php if ( has_nav_menu( 'footer-alpha' ) ) : ?>
			<nav class="foot-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'foot-menu',
						'theme_location' => 'foot-alpha',
					) );
				?>
			</nav>
		<?php endif; ?>
		
		<?php /* if ( has_nav_menu( 'footer-beta' ) ) : ?>
			<nav class="foot-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'foot-menu',
						'theme_location' => 'foot-beta',
					) );
				?>
			</nav>
		<?php endif; */ ?>
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
