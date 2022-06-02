<?php ob_start(); ?>
<main id="main-profile-V">
    <div class="profile-bloc-m">
        <div class="profile__1">
            <div class="profile__row-1-block">
                <div class="profile__inf">
                    <h3>Profile de <span><?= (isset($user)) ? $user->getName() : "" ?></span></h3>
                    <div class="img">
                        <?php if (isset($user)) { ?>
                        <?php if ($profile->getImage() != null) { ?>
                        <img
                            src="http://localhost/socialNetwork/asset/images/profile<?= $user->getId() . '/' . $profile->getImage() ?>">
                        <?php } else { ?>
                        <img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt="">
                        <?php } ?>
                    </div>
                    <?php if ($_SESSION["user"]->getId() != $_GET["id"]) { ?>
                    <div class="demande_amitier">
                        <?php if ($AfficherlienAdequatPourLaRelation) { ?>
                        demande d'amitier déjà envoyé
                        <a href="index.php?page=annuler_la_demande&id=<?= $user->getId() ?>"> Annuler la demande</a>
                        <?php } else { ?>
                        <a href="index.php?page=ajout_ami&id=<?= $user->getId() ?>"> <i class="fa fa-plus"></i> Ajouté
                            comme ami</a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <div class="pseudo">
                        <p class="pseudo"><span class="titre-profile">Pseudo:
                            </span><?= (isset($user)) ?  $user->getPseudo() : "" ?></p>
                    </div>
                    <div class="email">
                        <p><span class="titre-profile">Email: </span><a
                                href="mailto:<?= (isset($user)) ?  $user->getEmail() : "" ?>"
                                class="email"><?= (isset($user)) ?  $user->getEmail() : "" ?></a></p>
                    </div>

                </div>
            </div>

            <div class="profile__row-2-block">

                <div class="b1">
                    <div class="ville">
                        <p><span class="titre-profile">Ville: </span><a
                                href="https://maps.google.com/maps?q=<?= (isset($profile)) ?  $profile->getVille() : "" ?>"
                                target="_blank"><?= (isset($profile)) ?  $profile->getVille() : "" ?></a></p>
                    </div>
                    <div class="sexe">
                        <p class="sexe"><span class="titre-profile">Sexe:
                            </span><?= (isset($profile)) ?  $profile->getSexe() : "" ?></p>
                    </div>
                    <div class="dispo">
                        <p class="dispo"><span class="titre-profile">Disponibilite:
                            </span><?= (isset($profile) && $profile->getDisponibilite() == false) ?  "non disponible" : " disponible" ?>
                        </p>
                    </div>

                    <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><a
                            href="<?= (isset($profile)) ?  $profile->getGithub() : "" ?>"
                            target="_blank"><?= (isset($profile)) ?  $profile->getGithub() : "" ?></a></div>
                    <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><a
                            href="<?= (isset($profile)) ?  $profile->getFacebook() : "" ?>"
                            target="_blank"><?= (isset($profile)) ?  $profile->getFacebook() : "" ?></a></div>
                    <div class="profile__row-1-block">
                        <h3>Qui est <?= (isset($user)) ?  $user->getPseudo() : "" ?></h3>
                        <div class="biogragphie"><?= (isset($profile)) ?  $profile->getBiographie() : "" ?></div>
                    </div>
                </div>

                <div class="b2">
                    <form action="" method="post" class="form" id="contactForm" novalidate>
                        <div class="form__group">
                            <label for="status" class="form__label">Publication:</label>
                            <textarea name="posts" id="" cols="30" rows="10" placeholder="Alors quoi de neuf ?"
                                required></textarea>
                        </div>
                        <!-- submit  -->
                        <div class="form__group">
                            <input type="submit" value="publier" name="publication" class="fom__submit">
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="profile__2">
            <?php if (isset($posts) && $posts != false) : ?>
            <?php foreach ($posts as $post) : ?>

            <div class="post-pb">
                <h5 id="post"><?= $post->getCreate_at() ?></h5>
                <p style="display:block;overflow-y:scroll"><?= nl2br($profileModele->textToMail($post->getPosts()))

                                                                    ?></p>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <p>Cet utilisateur n'a pa encore publié </p>
        </div>
        <?php endif ?>
    </div>
    </div>
</main>
<style>

</style>


<?php $content =  ob_get_clean();
require "template.php"; ?>