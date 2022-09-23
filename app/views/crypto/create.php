
<?php ob_start() ?>

<div class="py-5 text-center">
    <h2 class="display-3">Ajout d'une cryptomonnaie</h2>
</div>
<div class="col-md-7 col-lg-8">
    <?php (new Util\View)->render('crypto/form',compact('crypto')); ?>
</div>


<?php
    

    $content = ob_get_clean();
    (new Util\View)->render('templates/master',compact('content')); 
?>