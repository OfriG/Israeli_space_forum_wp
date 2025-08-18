// Navbar mobile menu functionality
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