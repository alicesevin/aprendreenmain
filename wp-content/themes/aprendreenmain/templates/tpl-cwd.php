<div class="col-md-4 col-sm-12">
    <div class="svg-container">
        <svg id="animated" viewbox="0 0 100 100">
            <path stroke-linecap="round" stroke-width="4" stroke="black" style="stroke-dasharray: 175;" fill="none" d="M50 10 a 40 40 0 0 1 0 80 a 40 40 0 0 1 0 -80"></path>
            <path id="progress" stroke-linecap="round" stroke-width="5" stroke="lightblue" fill="none" d="M50 10a 40 40 0 0 1 0 80 a 40 40 0 0 1 0 -80"></path>
        </svg>
        <p id="count">0€</p>
    </div>
</div>
<div class="col-md-offset-1 col-md-7 col-sm-12">
    <h1><?php echo get_the_title(); ?></h1>
    <?php the_content(); ?>
    <button class="btn"><a href="#">Faire un don</a></button>
</div>
<div class="form form2 big ">
    <span class="duration">6000</span>
    <span class="property">top</span>
    <span class="from">30</span>
    <span class="to">60</span>
</div>