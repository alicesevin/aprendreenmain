<div class="col-md-offset-1 col-md-10 col-sm-12">
    <div class="list__tpl-tabs">
        <?php $tabs = get_field('tabs');
        if ($tabs && count($tabs) > 0):?>
            <div class="tabs-nav">
                <ul class="tab-list">
                    <?php foreach ($tabs as $tab):
                        $titre_lien = $tab['titre_lien'];
                        $lien = strtolower(filter_var($titre_lien, FILTER_SANITIZE_STRING)); ?>
                        <li class="tabs">
                            <a href="#<?php echo $lien ?>"><?php echo $titre_lien ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="tabs-container">
                <?php foreach ($tabs as $tab):
                    $titre_lien = $tab['titre_lien'];
                    $lien = strtolower(filter_var($titre_lien, FILTER_SANITIZE_STRING)); ?>
                    <div id="<?php echo $lien ?>" class="tabs-item">
                        <h1><?php echo $tab['titre'] ?></h1>
                        <div><?php echo $tab['content']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="form form3 medium">
    <span class="duration">10000</span>
    <span class="property">left</span>
    <span class="from">10</span>
    <span class="to">20</span>
</div>