<?php ob_start();

use App\modeles\ProfileModele;
?>

<main id="main-profile">
    <h3>Completez votre profile <span class="titre-profile"><?= (isset($user)) ? $user->getName() : "" ?></span> </h3>
    <div class="profile__row-1" id="input">
        <div class="profile__info">
            <div class="profile_infi-modif">
                <?php if ($profileModele->getProfileUser($user->getId())->getImage() != null) { ?>
                    <a href="index.php?page=profile&id=<?= $user->getId() ?>">
                        <div class="profile_info-img"><img src="http://localhost/socialNetwork/asset/images/profile<?= $user->getId() . '/' . $profileModele->getProfileUser($user->getId())->getImage() ?>"></div>
                    </a>
                <?php } else { ?>
                    <div class="profile_info-img">
                        <img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt="">
                    </div>

                <?php } ?>
                <div class="pseudo">
                    <p class="pseudo"><span class="titre-profile">Pseudo :</span> <?= (isset($user)) ?  $user->getPseudo() : "" ?></p>
                </div>
                <div class="email">
                    <p><span class="titre-profile">Email :</span> <a href="mailto:<?= (isset($user)) ?  $user->getEmail() : "" ?>" class="email"><?= (isset($user)) ?  $user->getEmail() : "" ?></a></p>
                </div>
                <div class="sexe">
                    <p class="sexe"><span class="titre-profile">Sexe :</span> <?= (isset($profile)) ?  $profile->getSexe() : "" ?></p>
                </div>
            </div>

            <div class="profile__info-modif">
                <div class="ville">
                    <p><span class="titre-profile">Ville :</span> <a href="https://maps.google.com/maps?q=<?= (isset($profile)) ?  $profile->getVille() : "" ?>" target="_blank"><?= (isset($profile)) ?  $profile->getVille() : "" ?></a></p>
                </div>
                <div class="dispo">
                    <p class="dispo"><span class="titre-profile">Disponibilite :</span> <?= (isset($profile) && $profile->getDisponibilite() == false) ?  "non disponible" : " disponible" ?></p>
                </div>
                <p class="pseudo"></p>
                <a href="mailto:" class="email"></a>



                <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><span class="titre-profile">Github :</span> <a href="<?= (isset($profile)) ?  $profile->getGithub() : "" ?>" target="_blank"><?= (isset($profile)) ?  $profile->getGithub() : "" ?></a></div>

                <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><span>Facebook :</span> <a href="<?= (isset($profile)) ?  $profile->getFacebook() : "" ?>" target="_blank"><?= (isset($profile)) ?  $profile->getFacebook() : "" ?></a></div>
                <div class="profile__row-1-block">
                    <div class="biogragphie"><span class="titre-profile">Description : </span><?= (isset($profile)) ?  $profile->getBiographie() : "" ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="profile__row-2">

        <div class="profile__row-2-modif">

            <form action="" method="post" class="form" id="contactForm" enctype="multipart/form-data">
                <p class="erreur">
                    <?= isset(ProfileModele::$errorProfile) ? ProfileModele::$errorProfile : "" ?>
                </p>
                <p class="erreur">
                    <?= isset(ProfileModele::$errorProfil2) ? ProfileModele::$errorProfil2 : "" ?>
                </p>

                <!-- ville field -->
                <div class="form__group">
                    <label for="ville" class="titre-profile ville">Ville</label>
                    <input classe="input" type="text" name="ville" value="<?= (isset($profile)) ?  $profile->getVille() : "" ?>" id="ville" required>
                </div>

                <!-- pays field -->
                <div class="form__group">
                    <label for="pays" class="titre-profile">Pays</label>
                    <input classe="input" type="text" name="pays" value="<?= (isset($profile)) ?  $profile->getPays() : "" ?>" id="pays" required>
                </div>



                <!-- github Confirmation -->
                <div class="form__group">
                    <label for="github" class="titre-profile">Github</label>
                    <input classe="input" type="text" name="github" value="<?= (isset($profile)) ?  $profile->getGithub() : "" ?>" id="github" required>
                </div>
                <!-- facebook Confirmation -->
                <div class="form__group">
                    <label for="facebook" class="titre-profile">Facebook</label>
                    <input classe="input" type="text" name="facebook" value="<?= (isset($profile)) ?  $profile->getFacebook() : "" ?>" id="facebook" required>
                </div>
        </div>

        <div class="profile__row-2-modif-2">
            <!-- Image field -->
            <div>
                <label for="image" class=""><span class="label-off">Modifier votre image de profil,</span> 300Ko max</label>
                <input type="file" name="image">
            </div>


            <!-- disponibilite  -->
            <div>
                <label for="disponibilite" class="titre-profile">disponibilite</label>
                <span class="ouidisponible">oui<input type="radio" value="1" name="disponibilite" <?= ($profile->getDisponibilite() == "1") ?  "checked" : "" ?>></span>
                <span class="disponible">non<input type="radio" value="0" name="disponibilite" <?= isset($rofile) ? "" : "checked" ?>></span>
            </div>

            <!-- sexe field -->
            <div>
                <label for="" class="titre-profile">Sexe</label>
                <select name="sexe" id="sexe">
                    <option value="homme" <?= ($profile->getSexe() == "homme") ?  "selected" : "" ?>>Homme</option>
                    <option value="femme" <?= ($profile->getSexe() == "femme") ?  "selected" : "" ?>>Femme</option>
                </select>
            </div>

            <!-- biographie Confirmation -->
            <div class="form__group ">
                <label for="biographie" class="titre-biographie">Biographie</label>
                <textarea name="biographie" id="biographie"><?= (isset($profile)) ?  $profile->getBiographie() : "" ?></textarea>
            </div>

            <!-- submit  -->
            <div class="form__group submit">
                <input type="submit" value="completez mon profile" name="enregistrer" class="fom__submit">
            </div>
        </div>

        </form>
    </div>
</main>


<?php $content =  ob_get_clean();
require "template.php"; ?>