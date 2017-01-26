<h1><?php echo get_the_title(); ?></h1>
<div class="col-md-offset-1 col-md-10 col-sm-12">
    <?php $args = array(
        'post_type' => 'portrait',
        'post_per_page' => -1,
        'nopaging' => true
    );
    $portraits = new WP_Query($args);
    if ($portraits->have_posts()):
    $j = 1;
    while ($portraits->have_posts()):
    $portraits->the_post();
    $nom = get_field('nom');
    $prenom = get_field('prenom');
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
    if ($j == 1): ?>
    <div class="tpl-eqp__list bck-list col-sm-4">
        <?php endif; ?>
        <article class="list-item list-item__tpl-eqp">
            <?php if ($img) : ?>
                <div class="round">
                    <img src="<?php echo $img ?>" alt="<?php echo $prenom . ' ' . $nom ?>">
                </div>
            <?php endif; ?>
            <strong>
                <?php echo $prenom ?>
                <span><?php echo $nom ?></span>
            </strong>
            <?php the_content(); ?>
        </article>
        <?php if ($j % 3 == 0): ?>
    </div>
    <div class="tpl-eqp__list bck-list list <?php echo ($j % 3 == 0 && !($j % 2 == 0)) ? ' decale' : (($j % 6 == 0) ? 'decale-small' : '') ?> col-sm-4">
        <?php endif;
        $j++;
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</div>