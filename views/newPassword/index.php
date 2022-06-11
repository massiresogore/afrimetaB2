<main id="main">
    <h1>Nouveau Mot de passe</h1>


    <form action="" method="post" class="form" id="contactForm" novalidate>
        <p class="erreurs">
        </p>

        <!-- password field -->
        <div class="form__group">
            <label for="password" class="form__label">Mot de passe </label>
            <input type="password" name="password" id="password" required>
        </div>

        <!-- password Confirmation -->
        <div class="form__group">
            <label for="password_confirm" class="form__label">Confirmer votre mot de passe </label>
            <input type="password" name="password_confirm" id="password_confirm" required>
        </div>

        <!-- submit  -->
        <div class="form__group">
            <input type="submit" value="Sauvegarder" name="enregistrer" class="fom__submit">
        </div>

    </form>

</main>