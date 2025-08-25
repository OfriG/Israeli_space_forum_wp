  <h2 class="follow-news">
      <?php
        $title = get_field('newsletter_title', 17);
        if ($title) {
            echo wp_kses_post($title);
        } else {
            echo 'fsgvr';
        }
        ?>
  </h2>
  <p class="subscribe">
      <?php
        $description = get_field('newsletter_description', 17);

        if ($description) {
            echo wp_kses_post($description);
        } else {
            echo 'usgdew';
        }
        ?>
  </p>
  <form class="newsletter-form-mobile" method="post" action="">
      <?php wp_nonce_field('newsletter_subscribe', 'newsletter_nonce'); ?>
      <input type="email" name="subscriber_email" placeholder="Email" class="email-input" required />

      <div class="newsletter-actions">
          <button type="submit" class="subscribe-btn">Subscribe</button>
          <a href="#" class="linkedin-link">
              <span class="linkedin-icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn.svg" alt="LinkedIn" />
              </span>
          </a>
      </div>
  </form>