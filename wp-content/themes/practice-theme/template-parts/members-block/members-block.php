<?php
$logos = $args['logos'] ?? null;
$logo_class = $args['logo_class'] ?? 'logo';

if ($logos): ?>
    <?php foreach ($logos as $image): ?>
        <div class="<?php echo esc_attr($logo_class); ?>">
            <img src="<?php echo esc_url($image['url']); ?>" 
                 loading="lazy"
                 alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
        </div>
    <?php endforeach; ?>
<?php endif; ?>