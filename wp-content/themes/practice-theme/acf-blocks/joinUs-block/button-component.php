<?php

function render_joinus_button($button_text) {
    ?>
    <?php if ($button_text): ?>
        <button type="submit">
            <?php echo esc_html($button_text); ?>
        </button>
    <?php endif; ?>
    

    <?php
}
