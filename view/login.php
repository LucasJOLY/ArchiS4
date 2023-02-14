<?php $title= 'Exemple Annonces Basic PHP: Connexion'; ?>

<?php ob_start(); ?>
    <form method="post" action="annonces.php">
        <label for="login"> Votre identifiant </label> :
        <input type="text" name="login" id="login" placeholder="defaut" maxlength="12" required />
        <br />
        <label for="pwd"> Votre mot de passe </label> :
        <input type="pwd" name="pwd" id="password" maxlength="12" required />

        <input type="submit" value="Envoyer">
    </form>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>