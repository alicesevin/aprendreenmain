<div class="footer">
    <footer class="container">
        <ul class="row">
            <li class="col-sm-2" >
                <img src="<?php echo get_field('logoBlanc', 'option'); ?>"
                     alt="<?php echo get_bloginfo(); ?>"/>
            </li>
            <li class="col-sm-7">
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
                    <ul class="footer-nav tab-list">
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
            </li>
            <li class="col-sm-3">
                <?php
                if(get_field('newsletter', 'option')) echo do_shortcode('[contact-form-7 id="391" title="Newsletter"]'); ?>
                <ul class="sociaux">
                    <?php if(get_field('facebook', 'option')) : ?>
                        <li class="col-sm-4"><a class="fb" href="#" rel="Vers le compte Facebook" title="Vers le compte Facebook"></a></li>
                    <?php endif; ?>
                    <?php if(get_field('twitter', 'option')) : ?>
                        <li class="col-sm-4"><a class="tw" href="#" rel="Vers le compte Twitter" title="Vers le compte Twitter"></a></li>
                    <?php endif; ?>
                    <?php if(get_field('google', 'option')) : ?>
                        <li class="col-sm-4"><a class="gg" href="#" rel="Vers le compte Google+" title="Vers le compte Google+"></a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="col-sm-12 copyright">
                <small><?php echo get_field('copyright', 'option'); ?></small>
            </li>
        </ul>
    </footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
