<?php ob_start(); ?>

<main id="main-register">
    <div class="book">
        <h2 class="form__title">Devenir Membre !!!</h2>

        <p class="erreurs">
            <?= isset(RegisterModele::$message) ?  RegisterModele::$message : "" ?>
        </p>
        <form action="" method="post" class="form-register" id="contactForm">

            <!-- Name field -->
            <div class="form__group">
                <input class="input" type="text" name="name" id="name" placeholder="Nom" required>
                <label for="name" class="form__label ">Nom</label>
            </div>

            <!-- pseudo field -->
            <div class="form__group">
                <input class="input" type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                <label for="pseudo" class="form__label">pseudo</label>
            </div>

            <!-- email field -->
            <div class="form__group">
                <input class="input" type="email" name="email" placeholder="Email" id="email" required>
                <label for="email" class="form__label">Email</label>
            </div>

            <!-- password field -->
            <div class="form__group">
                <input class="input" type="password" placeholder="mot de passe" name="password" id="password" required>
                <label for="password" class="form__label">Mot de passe </label>
            </div>

            <!-- password Confirmation -->
            <div class="form__group">
                <input class="input" type="password" placeholder="confirmé votre mot de passe" name="password_confirm" id="password_confirm" required>
                <label for="password_confirm" class="form__label">Confirmer votre mot de passe </label>
            </div>

            <!-- submit  -->
            <div class="form__group">
                <input class="input" type="submit" value="Inscription" name="register" class="fom__submit">
            </div>

        </form>
    </div>

</main>

<?php $content =  ob_get_clean();
require "template.php"; ?>