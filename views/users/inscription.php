<main id="main-register">
    <div class="book">
        <h2 class="form__title">Devenir Membre !!!</h2>

        <form action="/inscription" method="POST" class="form-register" id="contactForm">

            <!-- Name field -->
            <!-- <div class="form__group">
                <input class="input" type="text" name="nom" value="" id="name" autocomplete="off" placeholder="Nom">
                <label for="name" class="form__label-register">Nom</label>
            </div> -->

            <!-- email field -->
            <!-- <div class="form__group">
                <input class="input" type="email" value="
                    " name="email" autocomplete="off" placeholder="Email" id="email" required>
                <label for="email" class="form__label-register">Email</label>
            </div> -->

            <!-- password field -->
            <!-- <div class="form__group">
                <input class="input" type="password" autocomplete="off" placeholder="mot de passe" name="password"
                    id="password" required>
                <label for="password" class="form__label-register">Mot de passe </label>
            </div> -->

            <!-- password Confirmation -->
            <div class="form__group">
                <input class="input" type="password" autocomplete="off" placeholder="confirmé votre mot de passe"
                    name="password_confirm" id="password_confirm" required>
                <label for="password_confirm" class="form__label-register">Confirmer votre mot de passe </label>
            </div>

            <!-- submit  -->
            <div class="form__group">
                <input class="input" type="submit" value="Inscription" name="register" class="fom__submit">
            </div>

        </form>
    </div>
</main>