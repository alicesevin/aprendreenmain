<h1><?php echo get_the_title(); ?></h1>
<div class="col-md-offset-1 col-md-10 col-sm-12">
    <?php
    $partners = get_field('img', 'option');
    if (count($partners) > 0): ?>
    <ul class="tpl-prt__list center">
        <?php foreach ($partners as $partner): ?>
            <li class="list-item__tpl-prt col-sm-4">
                <img src="<?php echo $partner['url'] ?>"
                     alt="<?php echo $partner['alt'] ?>">
            </li>
        <?php endforeach;
        endif;
        wp_reset_postdata(); ?>
    </ul>
</div>
<div class="form form2 xsmall">
    <span class="duration">4000</span>
    <span class="property">top</span>
    <span class="from">40</span>
    <span class="to">70</span>
</div>
<div class="form form1 xsmall">
    <span class="duration">6000</span>
    <span class="property">top</span>
    <span class="from">55</span>
    <span class="to">10</span>
</div>
<div class="form form3 xsmall">
    <span class="duration">8000</span>
    <span class="property">left</span>
    <span class="from">70</span>
    <span class="to">75</span>
</div>