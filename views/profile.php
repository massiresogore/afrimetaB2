<?php ob_start(); ?>

<h1>profile</h1>

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

    </div>

    <?php $content =  ob_get_clean();
    require "template.php"; ?>