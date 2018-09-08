<?php do_action( 'storefront_before_header' ); ?>
    <!-- START OUR CUSTOM HEADER -->
    <header class="header-main"> 
        <div class="wrapper">
            
            <?php do_action( 'storefront_before_header' ); ?>

            <a href="/" class="logo" title="DETHLOFF MANUFACTURING, LLC"><h1>Dethloff MFG.</h1></a>

            <ul class="header-links">
                <li class="links-menu">
                        <!-- FLYOUT NAVIGATION FOR STORE -->
                        <div id="nav-container">
                        <div id="nav-overlay"></div>
                        <nav id="nav-fullscreen">
                            <?php wp_nav_menu( array( 'container'=> false, 'theme_location' => 'shop-head', 'menu_class' => '' ) ); ?>
                        </nav>

                        <a id="nav-toggle" data-text-swap="CLOSE">PRODUCTS</a>
                    </div>


                </li>
                <li class="links-menu">
                    <a href="#" class="btn-search"><i class="fa fa-search"></i></a>
                    <?php do_action( 'storefront_header' ); ?>
                </li>
                <li class="links-menu">
                    <a href="/my-account/"><i class="fa fa-user"></i ></a>
                </li>
                <li class="links-menu site-header-cart">
                    <a href="/cart/"><i class="fa fa-shopping-cart"></i> <span class="circle"><?php echo WC()->cart->get_cart_contents_count(); ?></span> </a>
                    <div class="cart-fix"><?php the_widget( 'WC_Widget_Cart', 'title=' ); ?></div>
                </li>
            </ul>          
        </div>
        <div class="menu-btn"> <!-- hamburger btn -->
            <span class="menu-icon"></span>
        </div>
    </header>
    <!-- END OUR CUSTOM HEADER -->
<?php do_action( 'storefront_before_content' ); ?>