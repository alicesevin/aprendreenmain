<?php
get_header();
the_post();
?>
    <div class="main single">
        <div class="container">
            <section class="tpl tpl-act">
                <div class="container">
                    <h1><?php echo get_the_title(); ?></h1>
                    <h2>
                        <?php the_date(); ?>
                    </h2>
                    <div class="row">
                        <div class="col-md-offset-6 col-md-6 col-sm-12">
                           <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="red-btn"><a href="<?php echo site_url('/actualites/') ?>">Retour à la liste</a>
                        </button>
                    </div>
            </section>
        </div>
    </div>
<?php get_footer(); ?>