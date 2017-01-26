<?php
get_header();
the_post();
// send request too Ulule
$request = wp_remote_get("https://api.ulule.com/v1/projects/du-soleil-a-la-lumiere");
$res = json_decode($request["body"]);
// set price require
$require = $res->goal;
// set price committed
$total = $res->committed;
// date end
$date_end = $res->date_end;

// Localize the script with new data
wp_enqueue_script( 'ulule' );
$translation_val = array(
    'require' => $require,
    'total' => $total
);
wp_localize_script( 'ulule', 'ulule', $translation_val);


$parallaxs = get_terms(array(
    'taxonomy' => 'section_parallax',
    'hide_empty' => true,
    'fields' => 'slugs'
));
if (count($parallaxs) > 0):?>
    <div id="trigger1"></div>
    <div class="plx">
        <?php foreach ($parallaxs as $parallax) :
            $args = array(
                'post_type' => 'parallax',
                'post_status' => 'publish',
                'post_per_page' => -1,
                'nopaging' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'section_parallax',
                        'field' => 'slug',
                        'terms' => $parallax,
                    ),
                )
            );
            $elements = new WP_Query($args);
            if ($elements->have_posts()) :?>
                <div id="<?php echo $parallax ?>" class="plx-section<?php echo ' ' . $parallax ?>">
                    <?php while ($elements->have_posts()) : $elements->the_post();
                        $isSvg = get_field('declare_svg');
                        $element = get_field('element');
                        $id = (get_field('id')) ? 'id="' . get_field('id') . '" ' : '';
                        if ($isSvg) {
                            $element = array();
                            if (get_field('svg')) $element['svg'] = get_field('svg');
                            if (get_field('viewbox')) $element['viewbox'] = get_field('viewbox');
                        }
                        $plxY = get_field('plx-y');
                        $classes = 'class="start ';
                        $classes .= 'plx-w-' . get_field('width'); //Width svg
                        $classes .= ' plx-x-' . get_field('plx-x'); //Pos x svg
                        if ($plxY) $classes .= ' plx-y-' . $plxY; //Pos y svg
                        $classes .= ' plx-z-' . get_field('plx-z'); //Z-index svg
                        $classes .= (get_field('classes')) ? ' ' . get_field('classes') : '';
                        $classes .= '" ';
                        $title = get_the_title();
                        if (!$isSvg && $element && !is_array($element)) : ?>
                            <img <?php echo $classes . $id; ?> src="<?php echo $element; ?>"
                                                               alt="<?php echo $title; ?>">
                        <?php elseif ($isSvg && $element && is_array($element) && (count($element) == 2)) :
                            $path_classes = (get_field('path_classes')) ? 'class="' . get_field('path_classes') . '" ' : ''; ?>
                            <svg <?php echo $classes . $id; ?>xmlns="http://www.w3.org/2000/svg"
                                 viewBox="<?php echo $element['viewbox']; ?>">
                                <title><?php echo $title; ?></title>
                                <path <?php echo $path_classes . $id; ?>d="<?php echo $element['svg']; ?>"/>
                            </svg>
                        <?php else:
                            $title = get_the_title(); ?>
                            <div class="plx-cartel">
                                <?php if ($title) : ?>
                                    <h1><?php echo $title; ?></h1>
                                <?php endif; ?>
                                <?php if (get_the_content()) the_content(); ?>
                            </div>
                        <?php endif;
                    endwhile; ?>
                </div>
            <?php endif;
        endforeach; ?>
    </div>
<?php endif;
wp_reset_postdata();?>
    <div class="main">
        <?php
        //Add Header
        get_template_part('templates/tpl', 'header'); ?>
        <div class="container">
            <?php
            $sections = new WP_Query(array(
                'post_type' => 'sections',
                'post_per_page' => -1,
                'order' => 'ASC',
                'nopaging' => true,
                'orderby' => 'menu-order'
            ));
            if ($sections->have_posts()) {
                while ($sections->have_posts()) {
                    $sections->the_post();
                    $id = get_the_ID();
                    $template_path = 'templates/tpl';
                    $template = wp_get_post_terms($id, 'type', array("fields" => "slugs")); // Récupère un template
                    $template = (is_array($template) && isset($template[0])) ? $template[0] : 'dft'; // Vérifie si il y a une valeur
                    $located = locate_template($template_path . '-' . $template . '.php');
                    $template = (!empty($located)) ? $template : 'dft';
                    $slug = get_field('slug');
                    $slug = ($slug) ? strtolower(filter_var($slug, FILTER_SANITIZE_STRING)) : ''; ?>
                    <section id="<?php echo $slug ?>" class="tpl tpl-<?php echo $template ?>">
                        <?php get_template_part($template_path, $template); ?>
                    </section>
                <?php }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php get_footer(); ?>