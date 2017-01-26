<h1><?php echo get_the_title(); ?></h1>
<div class="col-md-offset-1 col-md-10 col-sm-offset-0 col-sm-12">
    <?php
    $args = array(
        'post_type' => 'post',
        'post_per_page' => 3
    );
    $actus = new WP_Query($args);
    if ($actus->have_posts()): ?>
    <ul class="tpl-act__list bck-list">
        <?php while ($actus->have_posts()): $actus->the_post(); ?>
            <li class="col-md-4 col-sm-12">
                <div class="list-item__tpl-act">
                    <strong><?php echo get_the_title(); ?></strong>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <a class="link-item" href="<?php echo get_the_permalink(); ?>"
                       rel="Lire l'article : <?php echo get_the_title(); ?>">Lire la suite</a>
                </div>
            </li>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </ul>
</div>
<div class="btn-container">
    <button class="red-btn"><a href="<?php echo site_url('/actualites/') ?>">Voir toutes les actualités</a>
    </button>
</div>