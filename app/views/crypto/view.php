
<?php ob_start() ?>



<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img width="100%" height="225" class="img-fluid rounded-start p-2" src="<?= $crypto->logo ?>" alt="<?= $crypto->name ?>">
      <p class="mt-5 text-center bg-dark text-white"><?= $crypto->category ?></p>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title "><?= $crypto->name.' - '.$crypto->symbole ?></h5><hr>
        <p class="card-text">
            <?= $crypto->projet ?>
        </p>
        <p class="card-text"><small class="text-muted">Création : <?= $crypto->createdAt ?></small></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="/" class="btn btn-sm btn-outline-info"><i class="fa fa-arrow-left"></i> Retour</a>
            <a href="\CryptomonnaieController\edit\<?= $crypto->id ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> Editer</a>
            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
    $content = ob_get_clean();
    
    (new Util\View)->render('templates/master',compact('content')); 
?>

