<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
=======
<html lang="en" dir="ltr">
>>>>>>> dev/footer

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Google Fonts loaded via functions.php -->
    <?php wp_head(); ?>
</head>
<<<<<<< HEAD

<body>

    <h2>header</h2>
=======

<body <?php body_class(); ?>>

    <!-- Desktop Navbar -->
    <nav class="navbar-menu">
        <a href="<?php echo home_url(); ?>" class="navbar-menu-item navbar-logo">
            <?php
            // Display site logo
            // This will check: 1) ACF Options Page, 2) ACF Logo Settings Page, 3) WordPress Customizer
            display_site_logo();
            ?>
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
>>>>>>> dev/footer
