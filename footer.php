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
					<span class="screen-reader-text">Search</span>
					<input type="text"  title="Search for:" id="txt_search" class="search-field" name="s" />
				</label>
				<input type="submit" class="btn search-submit" value="Search" />
			</form>


			<form action="//innovista.us6.list-manage.com/subscribe/post?u=4c7a819d6edce6c9c111f6e2d&amp;id=8baf4fdf25" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer__thrive__signup validate" target="_blank" novalidate>

				<div class="footer__form__container">
					<div class="mc-field-group">
						<label for="mce-EMAIL">Join our mailing list</label>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="your@emailaddress.com">
					</div>

				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_4c7a819d6edce6c9c111f6e2d_8baf4fdf25" tabindex="-1" value=""></div>
				    <input type="hidden" value="2" name="group[6109][2]" id="mce-group[6109]-6109-1">
				    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn search-submit">

				    <small>We will never pass your details to anyone else.</small>
			    </div>
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
