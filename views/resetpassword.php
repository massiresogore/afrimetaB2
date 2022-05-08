<?php ob_start(); ?>

<main id="main">
    <h1>Réinisialisation de Mot de passe</h1>
    <h6>merci d'entrer votre adresse email , nous vous enverons un mail pour réinitialiser votre mot de passe</h6>

    <form action="" method="post" class="form">
        <p class="erreurs">
            <?= isset(ResetPasswordModele::$errormail) ? ResetPasswordModele::$errormail : "" ?>
        </p>
        <!-- email field -->
        <div class="form__group">
            <label for="email" class="form__label">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <!-- submit field -->
        <div class="form__group">
            <input type="submit" value="reinitialiser mon mot de passe" name="resetpassword" class="fom__submit">
        </div>
    </form>

</main>

<?php $content =  ob_get_clean();
require "template.php"; ?>