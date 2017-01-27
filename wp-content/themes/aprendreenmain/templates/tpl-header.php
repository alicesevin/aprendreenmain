<div class="header">
    <header class="header">
        <div class="navbar-wrapper">
            <div class="container">
                <nav id="main-nav" role="navigation" class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar"
                                    aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1 id="logo" class="navbar-brand">
                                <a href="<?php echo home_url(); ?>">
                                    <img src="<?php echo get_field('logo', 'option'); ?>"
                                         alt="<?php echo get_bloginfo(); ?>"/>
                                </a>
                            </h1>
                            <button class="finance hidden-md hidden-lg btn"><a
                                        href="<?php get_field('ulule', 'option'); ?>">$</a></button>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
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
                            ));
                            if (count($links_sections) > 0): ?>
                                <ul class="nav navbar-nav tab-list">
                                    <?php foreach ($links_sections as $link):
                                        $slug = get_field('slug', $link);
                                        $href = strtolower(filter_var($slug, FILTER_SANITIZE_STRING));
                                        ?>
                                        <li class="tabs"><a href="<?php echo site_url() . '#' . $href ?>"
                                                            rel="Aller à la section <?php echo $slug ?>"
                                                            title="Aller à la section <?php echo $slug ?>"><?php echo $slug ?></a>
                                        </li>
                                    <?php endforeach;
                                    wp_reset_postdata(); ?>
                                </ul>
                            <?php endif; ?>
                            <button class="btn hidden-sm"><a href="<?php get_field('ulule', 'option'); ?>">Faire un
                                    don</a></button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</div>