<?php ob_start() ?>
    <h3 class="title"><i class="far fa-caret-square-right"></i> Se connecter</h3>
    
    <a class="btn btn-default" href="\register">Inscription</a>
    <form class="form-horizontal" action="\login" method="post" name="userLogForm">
       
<?php
    if(isset($_SESSION['flash'])){
        echo ' <div class="alert alert-danger">';
            echo $_SESSION['flash'];
        echo '</div>';
    }
?>
        
            <div class="form-group">
            <label for="">Nom utilisateur</label>
            <input name="username" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="checkbox" class="checkbox">
            <label class="check-label" for="">Se souvenir de moi</label>
        </div>
        <button class="btn signup" type="submit">Se connecter</button>
    </form>
<?php
    $content = ob_get_clean();
    (new Util\View)->render('connexion/master_connexion',compact('content')); 
?>