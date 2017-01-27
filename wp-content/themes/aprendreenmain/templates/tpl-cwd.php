<?php // send request too Ulule
$request = wp_remote_get("https://api.ulule.com/v1/projects/du-soleil-a-la-lumiere");
$res = json_decode($request["body"]);
// set price require
$require = $res->goal;
// set price committed
$total = $res->committed;
// date end
$date_end = $res->date_end;
list($date, $off) = split('T', $date_end);
// today
$today = date("y-m-d");

// Localize the script with new data
wp_enqueue_script('ulule');
$translation_val = array(
    'require' => $require,
    'total' => $total,
    'date' => $date
);
wp_localize_script('ulule', 'ulule', $translation_val);
?>
<?php if (strtotime($today) <= strtotime($date)) : ?>
    <div class="col-md-4 col-sm-12">
        <div class="svg-container">
            <svg id="animated" viewbox="0 0 100 100">
                <path stroke-linecap="round" stroke-width="4" stroke="black" style="stroke-dasharray: 175;" fill="none"
                      d="M50 10 a 40 40 0 0 1 0 80 a 40 40 0 0 1 0 -80"></path>
                <path id="progress" stroke-linecap="round" stroke-width="5" stroke="lightblue" fill="none"
                      d="M50 10a 40 40 0 0 1 0 80 a 40 40 0 0 1 0 -80"></path>
            </svg>
            <p id="count">12.300</p>
        </div>
    </div>
    <div class="col-md-offset-1 col-md-7 col-sm-12">
        <h1><?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
        <button class="btn"><a href="#">Faire un don</a></button>
    </div>
<?php else : ?>
    <div class="col-sm-offset-1 col-sm-11">
        <h1>Deux nouvelles pompes à eau</h1>
        <p>Grâce à votre soutien et à vos dons, nous avons récoltés près de 25 000€ et ainsi,
            nous avons pu alimenter le village de Douala en eau potable avec deux nouvelles pompes à eau. </p>
        <p>Au delà de notre intervention, la population locale sera maintenant capable de s’approprier le projet et de
            développer une activité économique,
            sociale et éducative, de manière saine et durable.</p>
    </div>
<?php endif; ?>
<div class="form form2 big ">
    <span class="duration">6000</span>
    <span class="property">top</span>
    <span class="from">30</span>
    <span class="to">60</span>
</div>
