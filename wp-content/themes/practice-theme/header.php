<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Google Fonts loaded via functions.php -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Desktop Navbar -->
    <nav class="navbar-menu">
        <a class="navbar-menu-item navbar-logo" href="<?php echo home_url(); ?>">
            <div class="desktop-logo-container">
                <?php display_site_logo(); ?>
            </div>
        </a>

        <!-- Main Menu -->
        <ul class="navbar-all">
            <li class="navbar-menu-item">
                <a href="<?php echo home_url('/about-us'); ?>">About Us</a>
            </li>
            <li class="navbar-menu-item">
                <a href="<?php echo home_url('/iac-2024'); ?>">IAC 2024</a>
            </li>
            <li class="navbar-menu-item">
                <a href="<?php echo home_url('/contact-us'); ?>">Contact Us</a>
            </li>
            <li class="navbar-menu-item cta">
                <a href="<?php echo home_url('/join-us'); ?>">
                    JOIN US
                    <span class="arrow-icon"></span>
                </a>
            </li>
        </ul>

        <!-- Mobile menu toggle button with hamburger lines -->
        <button class="navbar-toggle" aria-label="Toggle mobile menu">
            <span class="hamburger-line"></span>
        </button>
        <div class="mobile-logo-left">
            <?php display_site_logo(); ?>
        </div>
    </nav>

    <!-- Mobile Menu Overlay - Fixed to match image design -->
    <div class="navbar-mobile-overlay">
        <!-- Left side with logo on gray background -->
        <div class="overlay-left">
            <div class="left-logo">
                <div class="mobile-logo-container">
                    <?php display_site_logo(); ?>
                </div>
            </div>
        </div>

        <!-- Right side with menu items on black background -->
        <div class="overlay-right">
            <!-- Close button positioned at top right -->
            <button class="mobile-close-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/Images/x.svg" alt="Close" />
            </button>

            <!-- Menu items centered vertically -->
            <ul class="navbar-menu-mobile">
                <li class="navbar-menu-item">
                    <a href="<?php echo home_url('/iac-2024'); ?>">IAC 2024</a>
                </li>
                <li class="navbar-menu-item">
                    <a href="<?php echo home_url('/about-us'); ?>">About us</a>
                </li>
                <li class="navbar-menu-item">
                    <a href="<?php echo home_url('/contact-us'); ?>">Contact us</a>
                </li>
                <li class="navbar-menu-item cta">
                    <a href="<?php echo home_url('/join-us'); ?>">JOIN US</a>
                </li>
            </ul>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>