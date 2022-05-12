<?php ob_start(); ?>

<main id="main">
    <div class="profile">
        <div class="profile__row-1">
            <div class="profile__row-1-block">
                <h3>Bienvenu sur votre profile <span><?= (isset($user)) ? $user->getName() : "" ?></span></h3>
            </div>
            <div class="profile__row-1-block">
                <div class="profile__info">

                    <div class="img">
                        <?php if (isset($profile)) { ?>
                            <img src="http://localhost/socialNetwork/asset/images/profile<?= $id_user . '/' . $profile->getImage() ?>">
                        <?php } else { ?>
                            <img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt="">
                        <?php } ?>
                    </div>

                    <div class="pseudo">
                        <h5>Pseudo</h5>
                        <p class="pseudo"><?= (isset($user)) ? $user->getPseudo() : "" ?></p>
                    </div>

                    <div class="email">
                        <h5>Email</h5>
                        <p><a href="mailto:<?= (isset($user)) ? $user->getEmail() : '' ?>" class="email"><?= (isset($user)) ? $user->getEmail() : "" ?></a></p>
                    </div>

                    <div class="ville">
                        <h5>Ville</h5>
                        <p><a href="https://maps.google.com/maps?q=<?= (isset($profile)) ? $profile->getville() : '' ?>" target="_blank"><?= (isset($profile)) ? $profile->getville() : "" ?></a></p>
                    </div>

                    <div class="sexe">
                        <h5>Sexe</h5>
                        <p class="sexe"><?= (isset($profile)) ? $profile->getSexe() : "" ?></p>
                    </div>

                    <div class="dispo">
                        <h5>Disponibilite</h5>
                        <p class="dispo"><?= (isset($profileModele)) ? $profileModele->disponible($profile->getDisponibilite()) : "" ?></p>
                    </div>
                </div>


            </div>

            <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><a href="<?= (isset($profile)) ? $profile->getGithub() : "" ?>" target="_blank"><?= (isset($profile)) ? $profile->getGithub() : "" ?></a></div>
            <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><a href="<?= (isset($profile)) ? $profile->getFacebook() : "" ?>" target="_blank"><?= (isset($profile)) ? $profile->getFacebook() : "" ?></a></div>

            <div class="profile__row-1-block">
                <h3>Biographie</h3>
                <div class="biogragphie"><?= (isset($profile)) ? $profile->getBiographie() : "" ?></div>
            </div>

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
                    <label for="github" class="form__label">Github</label>
                    <input type="text" name="github" id="github" required>
                </div>
                <!-- password Confirmation -->
                <div class="form__group">
                    <label for="facebook" class="form__label">Facebook</label>
                    <input type="text" name="facebook" id="facebook" required>
                </div>

                <!-- disponibilite  -->
                <div class="form__group">
                    <label for="disponibilite" class="form__label">disponibilite</label>

                    <div class="radio">
                        <span class="ouidisponible">oui<input type="radio" name="disponibilite" value="1" id="disponibilite"></span>
                        <span class="disponible">non<input type="radio" name="disponibilite" value="0" id="disponibilite" checked></span>
                    </div>
                </div>

                <!-- biographie Confirmation -->
                <div class="form__group">
                    <label for="biographie" class="form__label">Biographie</label>
                    <textarea name="biographie" id="biographie" cols="30" rows="10" style="resize:none;"></textarea>

                </div>

                <!-- submit  -->
                <div class="form__group">
                    <input type="submit" value="enregistrer" name="enregistrer" class="fom__submit">
                </div>

            </form>

        </div>
    </div>

</main>

<?php



?>

<?php $content =  ob_get_clean();
require "template.php"; ?>