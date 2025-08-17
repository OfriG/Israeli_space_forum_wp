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

    <!-- Mobile menu script with hamburger animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.querySelector('.navbar-toggle');
            const overlay = document.querySelector('.navbar-mobile-overlay');
            const navbar = document.querySelector('.navbar');
            const closeBtn = document.querySelector('.mobile-close-btn');

            // Open mobile menu
            if (toggle && overlay) {
                toggle.addEventListener('click', () => {
                    overlay.classList.add('active');
                    toggle.classList.add('active'); // Hamburger animation
                    if (navbar) {
                        navbar.classList.add('mobile-menu-open');
                    }
                    // Prevent body scrolling when menu is open
                    document.body.style.overflow = 'hidden';
                });
            }

            // Close mobile menu function
            function closeMenu() {
                overlay.classList.remove('active');
                toggle.classList.remove('active'); // Hamburger animation
                if (navbar) {
                    navbar.classList.remove('mobile-menu-open');
                }
                // Restore body scrolling
                document.body.style.overflow = '';
            }

            // Close mobile menu with close button
            if (closeBtn) {
                closeBtn.addEventListener('click', closeMenu);
            }

            // Close overlay when clicking on the left side (logo area)
            const overlayLeft = document.querySelector('.overlay-left');
            if (overlayLeft) {
                overlayLeft.addEventListener('click', closeMenu);
            }

            // Close menu when clicking menu links
            const mobileMenuLinks = document.querySelectorAll('.navbar-mobile-overlay .navbar-menu-item a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', closeMenu);
            });

            // Navbar scroll effect
            let lastScrollTop = 0;
            const navbarElement = document.querySelector('.navbar-screen');

            if (navbarElement) {
                window.addEventListener('scroll', () => {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                    if (scrollTop > 50) {
                        navbarElement.classList.add('scrolled');
                    } else {
                        navbarElement.classList.remove('scrolled');
                    }

                    lastScrollTop = scrollTop;
                });
            }
        });
    </script>

    <?php wp_footer(); ?>
</body>

</html>