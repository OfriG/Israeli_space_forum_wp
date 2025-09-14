<?php 
$first_button = get_field('first_button');
$second_button = get_field('second_button');
$headline = get_field('headline');
$description = get_field('description');
$full_name = get_field('full_name');
$job_title = get_field('job_title');
$mail = get_field('mail');
$icon = get_field('icon');
?>
<div class="innerCompany-block">
    <div class="innerCompany-block-content">
        <div class="innerCompany-buttons">
        <div class="first-button">
            <?php get_template_part('template-parts/button', null, ['button' => $first_button]); ?>
        </div>
        <div class="second-button">
<?php get_template_part('template-parts/button', null, ['button' => $second_button]); ?>
            </div>
            </div>
            <div class="icon">
                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
            </div>
            <div class="headline">
            <h1><?php echo nl2br(esc_html($headline)); ?></h1>
            </div>
            <div class="description">
            <p><?php echo nl2br(esc_html($description)); ?></p>
            </div>
            <div class="person-info-container">
            <div class="person-info">
            <div class="full-name">
            <p><?php echo esc_html($full_name); ?></p>
            </div>
            <div class="line"></div>  
            <div class="job-title">
            <p><?php echo esc_html($job_title); ?></p>
            <div class="line"></div>  
            </div>
            <div class="mail">
            <p><?php echo esc_html($mail); ?></p>
            <div class="line"></div>  
            </div>
            </div>
            <div class="social-icons">
            <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn_blue.svg" alt="LinkedIn" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/world.svg" alt="LinkedIn" />
            </div>  
            </div>


        </div>
    </div>
</div>
