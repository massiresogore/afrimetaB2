<main id="main-profile-V">
    <div class="profile-bloc-m">
        <div class="profile__1">
            <div class="profile__row-1-block">
                <div class="profile__inf">
                    <h3>Profile de <span></span></h3>
                    <div class="img">

                        <img src="http://localhost/afrimeta/public/images/noprofile/noprofile.jpg" alt="">
                    </div>
                    <div class="pseudo">
                        <p class="pseudo"><span class="titre-profile">Pseudo:
                            </span></p>
                    </div>
                    <div class="email">
                        <p><span class="titre-profile">Email: </span><a href="mailto:" class="email"></a></p>
                    </div>

                </div>
            </div>

            <div class="profile__row-2-block">

                <div class="b1">
                    <div class="ville">
                        <p><span class="titre-profile">Ville:<?= $profile->ville ?> </span><a
                                href="https://maps.google.com/maps?q=" target="_blank"></a></p>
                    </div>
                    <div class="sexe">
                        <p class="sexe"><span class="titre-profile">Sexe:<?= $profile->genre ?>
                            </span></p>
                    </div>
                    <div class="dispo">
                        <p class="dispo"><span class="titre-profile">Disponibilite: </span>
                        </p>
                    </div>

                    <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><a
                            href="<?= $profile->ville ?>" target="_blank"><?= $profile->github ?></a>
                    </div>
                    <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><a
                            href="<?= $profile->facebook ?>" target="_blank"><?= $profile->facebook ?></a></div>
                    <div class="profile__row-1-block">
                        <h3>Qui est </h3>
                        <div class="biogragphie"></div>
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
            <div class="post-pb">
                <h5 id="post"></h5>
                <p style="display:block;overflow-y:scroll"><?= $profile->biographie ?></p>
            </div>

            <p>Cet utilisateur n'a pa encore publié </p>
        </div>

    </div>
    </div>
</main>