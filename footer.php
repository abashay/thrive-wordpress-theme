  </div><!-- .content_container -->

  <footer class="footer" role="contentinfo">

    <section class="footer__thrive">

      <form class="footer__thrive__signup validate" action="//innovista.us6.list-manage.com/subscribe/post?u=4c7a819d6edce6c9c111f6e2d&amp;id=8baf4fdf25" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
        <div class="mc-field-group">
          <label class="footer__thrive__signup__label" for="mce-EMAIL">Join our mailing list</label>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>
          <input type="email" value="" name="EMAIL" class="footer__thrive__signup__field required email" id="mce-EMAIL" placeholder="your@emailaddress.com">
        </div>

        <div style="position: absolute; left: -5000px;"><input type="text" name="b_4c7a819d6edce6c9c111f6e2d_8baf4fdf25" tabindex="-1" value=""></div>
        <input type="hidden" value="2" name="group[6109][2]" id="mce-group[6109]-6109-1">
        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="footer__thrive__signup__submit">

        <div class="footer__thrive__signup__footnote">We will never pass your details to anyone else.</div>
      </form>

      <div class="footer__thrive__navigation">

        <form class="footer__thrive__navigation__search f_search" role="search" method="get" action="<?php echo get_site_url(); ?>">
          <div class="f_search__fieldcontainer">
            <input type="text"  title="Search for:" id="txt_search" class="" name="s" placeholder="Search..." />
          </div>
          <div class="f_search__submitcontainer">
            <input type="submit" class="" value="" />
          </div>
        </form>

        <nav class="footer__thrive__navigation__block" role="navigation">
          <div class="footer__thrive__navigation__block__primary">
            <?php
              if ( has_nav_menu( 'footer-a' ) ) {
                wp_nav_menu( array(
                  'theme_location' => 'footer-a',
                ) );
              }
            ?>
          </div>

          <div class="footer__thrive__navigation__block__secondary">
            <?php
              if ( has_nav_menu( 'footer-b' ) ) {
                wp_nav_menu( array(
                  'theme_location' => 'footer-b',
                ) );
              }
            ?>

            <div class="footer__thrive__navigation__block__social">
              <ul id="menu-footer-social-media" class="footer__navigation--gamma footer__navigation--social_media social_media_icon">
                <li class="menu-item social_media_icon--twitter"><a href="https://twitter.com/thriveteams" target="_blank">Follow us on Twitter</a></li>
                <li class="menu-item social_media_icon--facebook"><a href="https://www.facebook.com/thriveteams" target="_blank">Like us on Facebook</a></li>
              </ul>
            </div>


            </div>
        </nav>

      </div>

    </section>

    <section class="footer__innovista flex">

      <div class="footer__innovista__text">
        <p>Thrive, Meridian House, Sandy Lane West, Littlemore, Oxford, OX4 6LB | thrive@innovista.org | 01865 788350</p>
        <p>Thrive is an initiative of <a href="http://innovista.org" target="_blank">Innovista</a>, Registered Charity no: 1108679.</p>
      </div>

      <div class="footer__innovista__logo">
        <a href="http://innovista.org" target="_blank">
          Innovista:  Hope through young leaders
        </a>
      </div>
    </section>

  </footer>

  <?php wp_footer(); ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-34203592-4', 'auto');
    ga('send', 'pageview');
  </script>

</body>
</html>
