<?php ob_start(); ?>
<main id="main">
    <p class="erreurs">
        </ /?=isset(RegisterModele::$message) ? RegisterModele::$message : "" ?>
    </p>

    <div class="profile">
        <div class="profile__row-1">
            <div class="profile__row-1-block">
                <h3>Bienvenu sur votre profile <span><?= (isset($user)) ? $user->getName() : "" ?></span></h3>
            </div>
            <div class="profile__row-1-block">
                <div class="profile__info">
                    <div class="img"><img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt=""></div>

                    <p class="pseudo"><?= (isset($user)) ? $user->getPseudo() : "" ?></p>
                    <a href="mailto:<?= (isset($user)) ? $user->getEmail() : "" ?>" class="email"><?= (isset($user)) ? $user->getEmail() : "" ?></a>
                </div>
                <p class="dispo"> disponible oui et non</p>
            </div>

            <div class="profile__row-1-block">bock 3</div>
            <div class="profile__row-1-block">block 4</div>

        </div>
        <div class="profile__row-2">
            <h3>Completez mon profile </h3>
            <form action="" method="post" class="form" id="contactForm" enctype="multipart/form-data">

                <!-- Image field -->
                <div class="form__group">
                    <label for="image">Modifier votre image de profil</label>
                    <input type="file" name="image">
                </div>

                <!-- Name field -->
                <div class="form__group">
                    <label for="name" class="form__label ">Nom</label>
                    <input type="text" value="<?= (isset($user)) ? $user->getName() : "" ?>" name="name" id="name" required>
                </div>
                <!-- pseudo field -->
                <div class="form__group">
                    <label for="pseudo" class="form__label">pseudo</label>
                    <input type="text" value="<?= (isset($user)) ? $user->getPseudo() : "" ?>" name="pseudo" id="pseudo" required>
                </div>

                <!-- ville field -->
                <div class="form__group">
                    <label for="ville" class="form__label">Ville</label>
                    <input type="text" name="ville" id="ville" required>
                </div>

                <!-- pays field -->
                <div class="form__group">
                    <label for="pays" class="form__label">Pays</label>
                    <input type="text" name="pays" id="pays" required>
                </div>

                <!-- password field -->
                <div class="form__group">
                    <label for="">Sexe</label>
                    <select name="sexe" id="sexe">
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select>
                </div>

                <!-- password Confirmation -->
                <div class="form__group">
                    <label for="facebook" class="form__label">Facebook</label>
                    <input type="text" name="facebook" id="facebook" required>
                </div>

                <!-- disponibilite Confirmation -->
                <div class="form__group">
                    <label for="disponibilite" class="form__label">Disponibilite </label>
                    <input type="checkbox" name="disponibilite" id="disponibilite">

                </div>

                <!-- biographie Confirmation -->
                <div class="form__group">
                    <label for="biographie" class="form__label">Facebook</label>
                    <textarea name="biographie" id="biographie" cols="30" rows="10" style="resize:none;"></textarea>

                </div>

                <!-- submit  -->
                <div class="form__group">
                    <input type="submit" value="enregistrer" name="register" class="fom__submit">
                </div>

            </form>

        </div>
    </div>

</main>

<?php



?>

<?php $content =  ob_get_clean();
require "template.php"; ?>