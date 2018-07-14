<?php do_action( 'storefront_before_footer' ); ?>

    <footer>
        <div class="top">
            <div class="wrapper">
                <div class="footer-nav">
                    <h3>Quick Links</h3>
                    <nav>
                        <?php wp_nav_menu( array( 'container'=> false, 'theme_location' => 'footer-1', 'menu_class' => 'footer-menu' ) ); ?>
                    </nav>
                </div>
                <div class="footer-contact">
                    <h3>Connect with Us</h3>
                    <ul>
                        <li><i class="icon-phone"></i> (909) 319-6352</li>
                        <li><i class="icon-mail"></i> <a href="mailto:sales@dethloffmfg.com">sales@dethloffmfg.com</a></li>
                        <li><i class="icon-location"></i> Tigard, OR 97223</li>
                        <li><i class="icon-clock"></i> 8:00 - 17:00 PST, Mon - Sat</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="wrapper">
                <span>Copyright 2017 © Dethloff Manufacturing, LLC </span><span class="divider">|</span><span> Designed & Built by <a href="https://1337hero.com/">1337 Hero</a></span>
            </div>
        </div>

    </footer>

    <?php do_action( 'storefront_after_footer' ); ?>
    
    <!-- SIDEBAR NAVIGATION FOR MOBILE -->
    <div id="sidebar-navigation" class="sidebar-navigation">
        <a class="close-menu" href="#"><span class="fa fa-window-close"></span></a>

        <nav>
            <?php wp_nav_menu( array( 'container'=> false, 'theme_location' => 'nav-1', 'menu_class' => 'sidebar-menu' ) ); ?>
        </nav>

        <ul class="sidebar-info">
            <li><a href="tel:909-319-6352">909-319-6352</a></li>
            <li class="addy">
                <span>16224 SW Roshak Rd</span><br><span> Tigard, OR 97223</span><br>
                <span>8:00 - 17:00 PST,</span><br><span> Monday - Saturday</span>
            </li>

            <li>
                <a href="mailto:sales@dethloffmfg.com">EMAIL US</a>
            </li>
            <li>    
                <a href="#">Shipping & Returns</a>
            </li>
            <li>    
                <a href="#">Privacy Policy</a>
            </li>
        </ul>
    </div>


    <?php wp_footer(); ?>

</body>
</html>
