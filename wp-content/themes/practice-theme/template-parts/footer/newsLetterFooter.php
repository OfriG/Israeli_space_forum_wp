  <h2 class="follow-news">
      <?php
        $front_page_id = get_option('page_on_front');


        $title = get_field('newsletter_title', $front_page_id);
        if ($title) {
            // Use nl2br only on mobile devices- not work on localhost only on mobile devices 
            //its for the case that the title has line breaks
            if (wp_is_mobile()) {
                echo wp_kses_post(nl2br($title));
            } else {
                // Remove line breaks for desktop to prevent wrapping
                echo wp_kses_post(str_replace(["\n", "\r"], ' ', $title));
            }
        } else {
            echo 'ewfwe';
        }


        ?>
  </h2>
  <p class="subscribe">
      <?php
        $description = get_field('newsletter_description', $front_page_id);

        if ($description) {
            echo wp_kses_post(nl2br($description));
        } else {
            echo 'usgdew';
        }
        ?>
  </p>
  <form class="newsletter-form" method="post" action="">
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