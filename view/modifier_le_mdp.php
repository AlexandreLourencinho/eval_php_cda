<?php
include $_SERVER['DOCUMENT_ROOT'].'/controller/controller_modifier_le_mdp.php';
if(isset($modif) and $modif===false){
?>
    <h1><?= $message ?></h1>
    <?php
    header("refresh: 5; url=/view/mdp_oublie.php");
}
elseif(isset($modif) and $modif===true){
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-group">
        <label for="mdp" class="form-label">Entrez votre mot de passe : *</label>
        <input type="text" name="mdp" placeholder="entrez votre mot de passe" id="mdp" class="form-control">
        <label for="mdp2" class="form-label">Confirmez votre mot de passe : *</label>
        <input type="text" name="mdp2" placeholder="confirmez votre mot de passe" id="mdp2" class="form-control">
        <input type="hidden" value="<?= $modif ?>" name="aut">
        <input type="hidden" value="<?= $_GET['token'] ?? $_POST['token'] ?>" name="token">
<button class="btn btn-primary" name="envoi" type="submit">changer le mdp</button>
    </form>
    <?php
}
if(isset($result)){
    if($result['resultat']===true){
        ?>
<h1><?= $modification ?></h1>
<?php
        header("refresh: 5; url=/view/connexion.php");
    }
}
    ?>













<?php
include $_SERVER['DOCUMENT_ROOT'].'/view/header_footer/footer.php';
?>
