<main id="main-profile-V">
    <div class="profile-bloc-m">
        <div class="profile__1">
            <div class="profile__row-1-block">
                <div class="profile__inf">
                    <h3>Profile de : <span><?= (isset($profile["0"]->pseudo) ?  $profile["0"]->pseudo : "") ?></span>
                    </h3>
                    <div class="img">
                        <img src="http://localhost:8000/images/noprofile/noprofile.jpg" alt="">
                    </div>
                </div>
                <div class="post-pb">
                    <h5 id="post">Biograpie:</h5>
                    <p style="display:block;overflow-y:scroll">
                        <?= (isset($profile["0"]->biographie) ?  $profile["0"]->biographie : "") ?></p>
                </div>
            </div>

            <div class="profile__row-2-block">
                <div class="b1">
                    <div class="ville">
                        <p><span class="titre-profile">Ville:<?= (isset($profile['0']->ville) ? $profile['0']->ville : "")  ?>
                            </span><a href="https://maps.google.com/maps?q=" target="_blank"></a></p>
                    </div>
                    <div class="sexe">
                        <p class="sexe"><span
                                class="titre-profile">Sexe:<?= (isset($profile['0']->genre) ? $profile['0']->genre : "")  ?>
                            </span></p>
                    </div>
                    <div class="dispo">
                        <p class="dispo"><span
                                class="titre-profile">Disponibilite:<?= (isset($profile['0']->disponibilite) ? $profile['0']->disponibilite : "")  ?>
                            </span>
                        </p>
                    </div>

                    <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><a
                            href="<?= (isset($profile['0']->github) ?  $profile['0']->github : "") ?>"
                            target="_blank"><?= (isset($profile['0']->github) ?  $profile->github : "") ?></a>
                    </div>
                    <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><a
                            href="<?= (isset($profile['0']->facebook) ?  $profile['0']->facebook : "")   ?>"
                            target="_blank"><?= (isset($profile['0']->facebook) ? $profile['0']->facebook : "") ?></a>
                    </div>
                    <div class="profile__row-1-block">
                        <h3>Qui est </h3>
                        <div class="biogragphie"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</main>