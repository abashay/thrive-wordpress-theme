	</div><!-- .content_container -->

	<footer class="footer" role="contentinfo">

		<section class="footer__thrive">
			<?php if ( has_nav_menu( 'footer-a' ) || has_nav_menu( 'footer-b' ) ) : ?>
				<nav class="footer__thrive__navigation" role="navigation">
					<?php
						if ( has_nav_menu( 'footer-a' ) ) {
							wp_nav_menu( array(
								'menu_class'     => 'footer__navigation--alpha',
								'theme_location' => 'footer-a',
							) );
						}

						if ( has_nav_menu( 'footer-b' ) ) {
							wp_nav_menu( array(
								'menu_class'     => 'footer__navigation--beta',
								'theme_location' => 'footer-b',
							) );
						}
					?>
				</nav>
			<?php endif; ?>

			<form class="footer__thrive__search" role="search" method="get" action="<?php echo get_site_url(); ?>">
				<label for="txt_search">
					<span class="screen-reader-text">Search for:</span>
					<input type="search"  title="Search for:" placeholder="Tell me what you are looking for" id="txt_search" class="search-field" name="s" />
				</label>
				<input type="submit" class="btn search-submit" value="Search" />
			</form>

			<form class="footer__thrive__signup">
				<label for="txt_email">Join our mailing list</label>
				<input type="email" placeholder="Your main email address" id="txt_email" name="txt_email" />

				<input type="submit" class="btn" value="Submit your email" />

				<small>We will never pass your details to anyone else. Promise.</small>
			</form>

		</section>

		<section class="footer__innovista">

			<div class="footer__innovista__text">
				<p>Web development by <a href="http://jamesdoc.com" title="Faith, Hope, Love (and web development)" target="_blank">James Doc</a>.</p>
				<p>Thrive is an initiative of <a href="http://innovista.org" target="_blank">Innovista</a>, Registered Charity no: 1108679.</p>
			</div>

			<div class="footer__innovista__logo">
				<a href="http://innovista.org" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/innovista-logo.png" alt="Innovista" />
				</a>
			</div>
		</section>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>
