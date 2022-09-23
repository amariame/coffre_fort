<?php ob_start() ?>
    <h3 class="title"><i class="far fa-caret-square-right"></i> Inscription</h3>
    <a class="btn btn-default" href="/login">Seconnecter</a>
    <form class="form-horizontal" action="\register" method="post" name="userForm">
        <div class="form-group">
            <label for="">Nom utilisateur</label>
            <input type="text" class="form-control" name="username" value="<?= $_SESSION['post']['username'] ?? '' ?>">
            <?php
            if(isset($_SESSION['errors']['username']))
                echo '<div class="text-danger mt-2">'.$_SESSION['errors']['username'].'</div>';
            ?>
        </div>
        <div class="form-group">
            <label for="">Nom</label>
            <input type="texte" class="form-control" name="last_name" value="<?= $_SESSION['post']['last_name'] ?? '' ?>">
            <?php
            if(isset($_SESSION['errors']['last_name']))
                echo '<div class="text-danger mt-2">'.$_SESSION['errors']['last_name'].'</div>';
            ?>
        </div>
        <div class="form-group">
            <label for="">Prenom</label>
            <input type="texte" class="form-control" name="first_name" value="<?= $_SESSION['post']['first_name'] ?? '' ?>">
            <?php
            if(isset($_SESSION['errors']['first_name']))
                echo '<div class="text-danger mt-2">'.$_SESSION['errors']['first_name'].'</div>';
            ?>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $_SESSION['post']['email'] ?? '' ?>">
            <?php
            if(isset($_SESSION['errors']['email']))
                echo '<div class="text-danger mt-2">'.$_SESSION['errors']['email'].'</div>';
            ?>
        </div>
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" class="form-control" name="password">
            <?php
            if(isset($_SESSION['errors']['password']))
                echo '<div class="text-danger mt-2">'.$_SESSION['errors']['password'].'</div>';
            ?>
        </div>
        <div class="form-group">
            <label for="">Confirmatio Mot de passe</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <div class="form-group">
            <input type="checkbox" class="checkbox" name="cgu">
            <label class="check-label" for="">Accepte les CGU</label><?php
            if(isset($_SESSION['errors']['cgu']))
                echo '<div class="text-danger mt-2">'.$_SESSION['errors']['cgu'].'</div>';
            ?>
        </div>
        <button class="btn signup" type="submit">Creer mon compte</button>
    </form>
<?php
    $content = ob_get_clean();
    (new Util\View)->render('connexion/master_connexion',compact('content')); 
?>
