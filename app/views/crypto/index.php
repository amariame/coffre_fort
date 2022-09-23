



<?php ob_start() ?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">GESTION DES CRYPTOMONNAIES</h1>
        <?php
            if(isset($_SESSION["notif-error"])){
                echo '<br><div class="alert alert-danger">'.$_SESSION["notif-error"].'</div>';
            }
            if(isset($_SESSION["message"])){
                echo '<br><div class="alert alert-success">'.$_SESSION["message"].'</div>';
            }
        ?>
        <p>
          <a href="CryptomonnaieController\create\" class="btn btn-primary my-2"><i class="fa fa-plus"></i> Nouvelle cryptomonnaie</a>
        </p>
      </div>
    </div>
</section>
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php foreach ($cryptos as $crypto) {  ?>  
            
            <div class="col">
                <div class="card shadow-sm">
                    <img class="card-img-top p-3" width="100%" height="225" src="<?= $crypto->logo ?>" alt="<?= $crypto->name ?>">
                    <div class="card-body bg-dark text-white">
                        <p class="card-text"> <?= $crypto->name.' - '.$crypto->symbole ?></p>
                        <p><small class="text-muted"><?= $crypto->category ?></small></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="CryptomonnaieController\view\<?= $crypto->id ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i> Detail</a>
                                <a href="CryptomonnaieController\edit\<?= $crypto->id ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil-square-o"></i> Editer</a>
                                <a href="CryptomonnaieController\delete\<?= $crypto->id ?>" class="btn btn-sm btn-outline-danger" onclick=" return confirm('Confirmer la suppression')"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>


<?php
    $content = ob_get_clean();
    
    (new Util\View)->render('templates/master',compact('content')); 
?>
        


