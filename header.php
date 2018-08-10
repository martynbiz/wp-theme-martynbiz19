<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php ( is_front_page() ) ? bloginfo('name') : wp_title(''); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body>

        <header class="c-header" role="banner" id="layout-header" aria-label="main-site-header">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="cell large-4 medium-4 small-8 flex-container flex-dir-column align-center">
                        <a href="<?php echo get_home_url(); ?>" title="Martynbiz" class="mb18-heading__wrapper">
                            <img src="<?php bloginfo('template_url'); ?>/images/database_64x64.png" width="64" height="64" alt="logo">
                            <div class="mb18-heading">Martyn<span class="mb18-heading__hl">.biz</span></div>
                            <div class="mb18-heading__desc">Web developer, blah, blah.</div>
                        </a>
                    </div>
                    <nav role="navigation" class="cell large-8 medium-8 small-4 flex-container align-right">
                        <div role="menu" class="flex-container flex-dir-column align-bottom align-center">
                            <!-- <ul role="menubar" class="c-header-nav c-header-nav--secondary u-font-semibold flex-container align-middle">
                                <li class="c-header-nav__item show-for-large" role="none">
                                    <a role="menuitem" class="c-header-nav__link" href="https://portal.stir.ac.uk/my-portal.jsp">My Portal</a>
                                </li>
                                <li class="c-header-nav__item" role="none">
                                    <a role="menuitem" class="c-header-nav__link" id="header-search__button" href="#">
                                    <span class="show-for-medium">Site Search</span>
                                    <span class="c-header-nav__icon uos-magnifying-glass u-font-semibold"></span>
                                    </a>
                                </li>
                            </ul> -->
                            <?php if ( has_nav_menu( 'top-right-menu-location' ) ) : ?>
            					<?php wp_nav_menu( array(
            						'theme_location' => 'top-right-menu-location',
            						'menu_class'     => 'c-header-nav c-header-nav--secondary',
            					) ); ?>
            				<?php endif; ?>
                            <?php if ( has_nav_menu( 'main-menu-location' ) ) : ?>
            					<?php wp_nav_menu( array(
            						'theme_location' => 'main-menu-location',
            						'menu_class'     => 'c-header-nav c-header-nav--primary',
            					) ); ?>
            				<?php endif; ?>
                        </div>
                        <!-- <div class="hide-for-xlarge flex-container align-middle align-center flex-dir-column">
                            <a href="#" id="open_mobile_menu" class="c-header-burger flex-container align-middle">
                            <span class="show-for-sr">Show/hide mobile menu</span>
                            <span class="c-header-burger__bun"></span>
                            </a>
                            <span>Menu</span>
                        </div> -->
                    </nav>
                </div>
            </div>
        </header>

        <?php if ( ! is_front_page() ): ?>
            <section class="grid-x c-masthead" aria-label="masthead-14193">
                <div class="cell large-12">
                    <div class="c-masthead__image" style="background-image: url('<?php is_single() ? the_post_thumbnail_url() : header_image(); ?>')"></div>
                    <div class="grid-container grid-x grid-padding-x c-masthead__container">
                        <h1 class="c-masthead__callout-text u-callout-text u-text-uppercase"><?php wp_title(''); ?></h1>
                        <div class="c-masthead__button-group button-group grid-container">
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
