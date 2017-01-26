<div class="header">
    <header class="header">
        <div class="container">
            <h1 id="logo" class="h1">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_field('logo','option'); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                </a>
            </h1>
            <?php $links_sections = get_posts(array(
                'post_type' => 'sections',
                'post_per_page' => -1,
                'order' => 'ASC',
                'nopaging' => true,
                'orderby' => 'menu-order',
                'fields' => 'ids',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'nav',
                        'compare' => '==',
                        'value' => '1'
                    ),
                    array(
                        'key' => 'slug',
                        'compare' => '!=',
                        'value' => ''
                    )
                )
            )); ?>
            <nav id="main-nav" role="navigation">
                <?php if (count($links_sections) > 0): ?>
                    <ul class="tab-list">
                        <?php foreach ($links_sections as $link):
                            $slug = get_field('slug', $link);
                            $href = strtolower(filter_var($slug, FILTER_SANITIZE_STRING));
                            ?>
                            <li class="tabs"><a href="<?php echo site_url().'#'.$href ?>" rel="Aller à la section <?php echo $slug ?>"
                                   title="Aller à la section <?php echo $slug ?>"><?php echo $slug ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <button class="btn"><a href="#">Faire un don</a></button>
            </nav>
        </div>
    </header>
</div>