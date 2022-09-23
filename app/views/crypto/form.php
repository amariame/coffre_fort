
<p><a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-arrow-left"></i> Retour</a></p>
<?php
if(isset($crypto->id))
    echo '<form action="\CryptomonnaieController\update\" method="post">';
else
    echo '<form action="\CryptomonnaieController\store\" method="post">';
?>
    <div class="row g-3">
        <div class="col-sm-8">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Cryptomonnaie name" value="<?= isset($crypto->name)?$crypto->name:$_SESSION['post']['name'] ?? '' ?>" required>
            <?php
            if(isset($_SESSION['errors']['name']))
                echo '<p class="text-danger mt-2">'.$_SESSION['errors']['name'].'</div>';
            ?>
        </div>

        <div class="col-sm-4">
            <label for="symbole" class="form-label">Symbole</label>
            <input type="text" class="form-control" name="symbole" placeholder="Symbole" value="<?= isset($crypto->symbole)?$crypto->symbole:$_SESSION['post']['symbole'] ?? '' ?>" required>
            <?php
            if(isset($_SESSION['errors']['symbole']))
                echo '<p class="text-danger mt-2">'.$_SESSION['errors']['symbole'].'</p>';
            ?>
        </div>
        <div class="col-sm-7">
            <label for="category" class="form-label">Catégorie</label>
            <input type="text" class="form-control" name="category" placeholder="Catégorie" value="<?= isset($crypto->category)?$crypto->category:$_SESSION['post']['category'] ?? '' ?>" required>
            <?php
            if(isset($_SESSION['errors']['category']))
                echo '<p class="text-danger mt-2">'.$_SESSION['errors']['category'].'</p>';
            ?>
        </div>

        <div class="col-sm-5">
            <label for="date" class="form-label">Date de création</label>
            <input type="date" class="form-control" name="createdAt" placeholder="" value="<?= isset($crypto->createdAt)?$crypto->createdAt:$_SESSION['post']['createdAt'] ?? '' ?>" required>
            <?php
            if(isset($_SESSION['errors']['createdAt']))
                echo '<p class="text-danger mt-2">'.$_SESSION['errors']['createdAt'].'</p>';
            ?>
        </div>

        <div class="col-12">
            <label for="logo" class="form-label">Logo</label>
            <input type="url" class="form-control" name="logo" placeholder="URL LOGO" value="<?= isset($crypto->logo)?$crypto->logo:$_SESSION['post']['logo'] ?? '' ?>" required>
            <?php
            if(isset($_SESSION['errors']['logo']))
                echo '<p class="text-danger mt-2">'.$_SESSION['errors']['logo'].'</p>';
            ?>
        </div>
        
        <div class="col-12">
            <label for="projet" class="form-label">Projet</label>
            <textarea class="form-control" placeholder="Leave a comment here" name="projet" style="height: 200px"><?= isset($crypto->projet)?$crypto->projet:$_SESSION['post']['projet'] ?? '' ?></textarea>
            <?php
            if(isset($_SESSION['errors']['projet']))
                echo '<p class="text-danger mt-2">'.$_SESSION['errors']['projet'].'</p>';
            ?>
        </div>
    </div>

    <hr class="my-4">
    <button class="w-100 btn btn-success btn-lg" type="submit">Valider</button>
    
</form>
