<?php
get_header();
the_post(); ?>
    <div class="container">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
<?php get_footer(); ?>