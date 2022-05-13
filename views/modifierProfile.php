<?php ob_start(); ?>

<main id="main">


    <h1><?php  ?></h1>

    <div class="profile">
        <div class="profile__row-1">
            <div class="profile__row-1-block">
                <h3>Bienvenu sur votre profile <span><?= (isset($user)) ? $user->getName() : "" ?></span></h3>
            </div>
            <div class="profile__row-1-block">
                <div class="profile__info">
                    <div class="img">

                        <?php if ($profile->getId()) { ?>

                            <img src="http://localhost/socialNetwork/asset/images/profile<?= $user->getId() . '/' . $profile->getImage() ?>">
                        <?php } else { ?>

                            <img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt="">
                        <?php } ?>

                    </div>

                    <div class="pseudo">
                        <h4>Pseudo</h4>
                        <p class="pseudo"><?= (isset($user)) ?  $user->getPseudo() : "" ?></p>
                    </div>

                    <div class="email">
                        <h4>Email</h4>
                        <p><a href="mailto:<?= (isset($user)) ?  $user->getEmail() : "" ?>" class="email"><?= (isset($user)) ?  $user->getEmail() : "" ?></a></p>
                    </div>

                    <div class="ville">
                        <h4>Ville</h4>
                        <p><a href="https://maps.google.com/maps?q=<?= (isset($profile)) ?  $profile->getVille() : "" ?>" target="_blank"><?= (isset($profile)) ?  $profile->getVille() : "" ?></a></p>
                    </div>

                    <div class="sexe">
                        <h4>Sexe</h4>
                        <p class="sexe"><?= (isset($profile)) ?  $profile->getSexe() : "" ?></p>
                    </div>

                    <div class="dispo">
                        <h5>Disponibilite</h5>
                        <p class="dispo"><?= (isset($profile) && $profile->getDisponibilite() == false) ?  "non disponible" : " disponible" ?></p>
                    </div>
                    <p class="pseudo"></p>
                    <a href="mailto:" class="email"></a>

                </div>

            </div>
            <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><a href="<?= (isset($profile)) ?  $profile->getGithub() : "" ?>" target="_blank"><?= (isset($profile)) ?  $profile->getGithub() : "" ?></a></div>
            <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><a href="<?= (isset($profile)) ?  $profile->getFacebook() : "" ?>" target="_blank"><?= (isset($profile)) ?  $profile->getFacebook() : "" ?></a></div>
            <div class="profile__row-1-block">
                <h3>Qui est <?= (isset($user)) ?  $user->getPseudo() : "" ?></h3>
                <div class="biogragphie"><?= (isset($profile)) ?  $profile->getBiographie() : "" ?></div>
            </div>



            <a href="index.php?page=modifierProfile&id=<//?= $_SESSION['user']->getId() ?>">Completer Mon profile</a>
        </div>
        <div class="profile__row-2">
            <h3>Completez mon profile </h3>
            <form action="" method="post" class="form" id="contactForm" enctype="multipart/form-data">
                <p class="erreurs">
                    <?= isset(ProfileModele::$errorProfile) ? ProfileModele::$errorProfile : "" ?>
                </p>
                <p class="erreurs">
                    <?= isset(ProfileModele::$errorProfil2) ? ProfileModele::$errorProfil2 : "" ?>
                </p>
                <!-- Image field -->
                <div class="form__group">
                    <label for="image">Modifier votre image de profil, 300Ko max</label>
                    <input type="file" name="image">
                </div>

                <!-- ville field -->
                <div class="form__group">
                    <label for="ville" class="form__label">Ville</label>
                    <input type="text" name="ville" value="<?= (isset($profile)) ?  $profile->getVille() : "" ?>" id="ville" required>
                </div>

                <!-- pays field -->
                <div class="form__group">
                    <label for="pays" class="form__label">Pays</label>
                    <input type="text" name="pays" value="<?= (isset($profile)) ?  $profile->getPays() : "" ?>" id="pays" required>
                </div>

                <!-- sexe field -->
                <div class="form__group">
                    <label for="">Sexe</label>
                    <select name="sexe" id="sexe">
                        <option value="homme" <?= ($profile->getSexe() == "homme") ?  "selected" : "" ?>>Homme</option>
                        <option value="femme" <?= ($profile->getSexe() == "femme") ?  "selected" : "" ?>>Femme</option>
                    </select>
                </div>

                <!-- github Confirmation -->
                <div class="form__group">
                    <label for="github" class="form__label">Github</label>
                    <input type="text" name="github" value="<?= (isset($profile)) ?  $profile->getGithub() : "" ?>" id="github" required>
                </div>
                <!-- facebook Confirmation -->
                <div class="form__group">
                    <label for="facebook" class="form__label">Facebook</label>
                    <input type="text" name="facebook" value="<?= (isset($profile)) ?  $profile->getGithub() : "" ?>" id="facebook" required>
                </div>

                <!-- disponibilite  -->
                <div class="form__group">
                    <label for="disponibilite" class="form__label">disponibilite</label>
                    <div class="radio">
                        <span class="ouidisponible">oui<input type="radio" value="1" name="disponibilite" <?= ($profile->getDisponibilite() == "1") ?  "checked" : "" ?>></span>
                        <span class="disponible">non<input type="radio" value="0" name="disponibilite" <?= isset($rofile) ? "" : "checked" ?>></span>
                    </div>
                </div>

                <!-- biographie Confirmation -->
                <div class="form__group">
                    <label for="biographie" class="form__label">Biographie</label>
                    <textarea name="biographie" id="biographie" cols="30" rows="10" style="resize:none;"><?= (isset($profile)) ?  $profile->getBiographie() : "" ?></textarea>

                </div>

                <!-- submit  -->
                <div class="form__group">
                    <input type="submit" value="completez mon profile" name="enregistrer" class="fom__submit">
                </div>

            </form>

        </div>
    </div>
</main>

<?php


?>

<?php $content =  ob_get_clean();
require "template.php"; ?>