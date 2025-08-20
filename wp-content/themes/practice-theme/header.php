<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Google Fonts loaded via functions.php -->
    <style>
        :root {
            --hamburger-icon-url: url('<?php echo get_template_directory_uri(); ?>/images/Dark.svg');
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <h1>it works</h1>

    <!-- Desktop Navbar -->
    <nav class="navbar-menu">
        <a class="navbar-logo" href="<?php echo home_url(); ?>">
            <div class="desktop-logo-container">
                <?php display_site_logo(); ?>
            </div>
        </a>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => false,
            'menu_class' => 'navbar-all',
        ));
        ?>
        </ul>

        <!-- Mobile menu toggle button with hamburger lines -->
        <div class="mobile-navbar">
            <div class="mobile-logo-left"> <?php display_site_logo(); ?>
            </div>
            <button class="navbar-toggle" aria-label="Toggle mobile menu">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Dark.svg" alt="Close" />
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay - Fixed to match image design -->
    <div class="navbar-mobile-overlay">
        <!-- Left side with logo on gray background -->
        <div class="overlay-left">
            <div class="left-logo">
                <?php display_site_logo(); ?>
            </div>
        </div>

        <!-- Right side with menu items on black background -->
        <div class="overlay-right">
            <!-- Close button positioned at top right -->
            <button class="mobile-close-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/images/x.svg" alt="Close" />
            </button>

            <!-- Menu items centered vertically -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'navbar-menu-mobile',
                'add_li_class' => 'navbar-menu-item'
            ));
            ?>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>