<main id="main-connexion">
    <div class="book-connexion">

        <form action="" method="POST" class="form-connexion" id="contactForm">

            <!-- email field -->
            <div class="form__group">
                <input class="input-connexion" type="email" value="sogoremassire.fr@gmail.com" name="email" id="email"
                    autocomplete="off" placeholder="Email" required>
                <label for="email" class="form__label-connexion">Email</label>
            </div>

            <!-- password field -->
            <div class="form__group">
                <input class="input-connexion" value="123456" type="password" name="password" id="password"
                    autocomplete="off" placeholder="Mot de passe" required>
                <label for="password" class="form__label-connexion">Mot de passe </label>
            </div>

            <!-- Se souvenir de moi  -->
            <div>
                <label for="checkbox" class="souvenir">Se souvenir de moi
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <a href="/resetPassword">Mot de passe oublié</a>
                </label>
            </div>

            <!-- Submit -->
            <div class="form__group">
                <input class="input-connexion" type="submit" value="connexion" name="connexion" class="form__submit">
            </div>
        </form>
    </div>
</main>