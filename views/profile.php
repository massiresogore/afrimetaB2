<?php ob_start(); ?>

<main id="main">
    <div class="profile">
        <div class="profile__row-1">
            <div class="profile__row-1-block">
                <h3>Bienvenu sur votre profile <span></span></h3>
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
                        <p class="pseudo"></p>
                    </div>

                    <div class="email">
                        <h5>Email</h5>
                        <p><a href="mailto:" class="email"></a></p>
                    </div>

                    <div class="ville">
                        <h5>Ville</h5>
                        <p><a href="https://maps.google.com/maps?q=<?= (isset($profile)) ? $profile->getville() : '' ?>" target="_blank"></ /?=(isset($profile)) ? $profile->getville() : "" ?></a></p>
                    </div>

                    <div class="sexe">
                        <h5>Sexe</h5>
                        <p class="sexe"></p>
                    </div>

                    <div class="dispo">
                        <h5>Disponibilite</h5>
                        <p class="dispo"></p>
                    </div>
                </div>


            </div>

            <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><a href="" target="_blank"></a></div>
            <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><a href="" target="_blank"></a></div>

            <div class="profile__row-1-block">
                <h3>Biographie</h3>
                <div class="biogragphie"></div>
            </div>

            <a href="index.php?page=modifierProfile&id=<?= $_SESSION['user']->getId() ?>">Completer Mon profile</a>
        </div>

</main>

<?php



?>

<?php $content =  ob_get_clean();
require "template.php"; ?>