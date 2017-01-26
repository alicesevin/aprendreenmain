<?php
get_header();
the_post();
?>
<div class="main tpl-single__actu">
    <div class="container">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>
