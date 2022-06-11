<main id="main-profile">
    <h3>Completez votre profile <span class="titre-profile"></span> </h3>
    <div class="profile__row-1" id="input">
        <div class="profile__info">
            <div class="profile_infi-modif">

                <a href="index.php?page=profile&id=">
                    <div class="profile_info-img"><img src="http://localhost/afrimeta/public/images/profile">
                    </div>
                </a>

                <div class="profile_info-img">
                    <img src="http://localhost/afrimeta/public/images/noprofile/noprofile.jpg" alt="">
                </div>

                <div class="pseudo">
                    <p class="pseudo"><span class="titre-profile">Pseudo :</span>
                    </p>
                </div>
                <div class="email">
                    <p><span class="titre-profile">Email :</span> <a href="mailto:" class="email"></a></p>
                </div>
                <div class="sexe">
                    <p class="sexe"><span class="titre-profile">Sexe :</span>
                    </p>
                </div>
            </div>

            <div class="profile__info-modif">
                <div class="ville">
                    <p><span class="titre-profile">Ville :</span> <a href="https://maps.google.com/maps?q="
                            target="_blank"></a></p>
                </div>
                <div class="dispo">
                    <p class="dispo"><span class="titre-profile">Disponibilite :</span>
                    </p>
                </div>
                <p class="pseudo"></p>
                <a href="mailto:" class="email"></a>



                <div class="profile__row-1-block"><i class="fa-brands fa-github"></i><span class="titre-profile">Github
                        :</span> <a href="" target="_blank"></a></div>

                <div class="profile__row-1-block"><i class="fa-brands fa-facebook"></i><span>Facebook :</span> <a
                        href="" target="_blank"></a></div>
                <div class="profile__row-1-block">
                    <div class="biogragphie"><span class="titre-profile">Description :
                        </span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="profile__row-2">

        <div class="profile__row-2-modif">

            <form action="" method="post" class="form" id="contactForm" enctype="multipart/form-data">
                <p class="erreur">

                </p>
                <p class="erreur">

                </p>

                <!-- ville field -->
                <div class="form__group">
                    <label for="ville" class="titre-profile ville">Ville</label>
                    <input classe="input" type="text" name="ville" value="" id="ville" required>
                </div>

                <!-- pays field -->
                <div class="form__group">
                    <label for="pays" class="titre-profile">Pays</label>
                    <input classe="input" type="text" name="pays" value="" id="pays" required>
                </div>



                <!-- github Confirmation -->
                <div class="form__group">
                    <label for="github" class="titre-profile">Github</label>
                    <input classe="input" type="text" name="github" value="" id="github" required>
                </div>
                <!-- facebook Confirmation -->
                <div class="form__group">
                    <label for="facebook" class="titre-profile">Facebook</label>
                    <input classe="input" type="text" name="facebook" value="" id="facebook" required>
                </div>
        </div>

        <div class="profile__row-2-modif-2">
            <!-- Image field -->
            <div>
                <label for="image" class=""><span class="label-off">Modifier votre image de profil,</span> 300Ko
                    max</label>
                <input type="file" name="image">
            </div>


            <!-- disponibilite  -->
            <div>
                <label for="disponibilite" class="titre-profile">disponibilite</label>
                <span class="ouidisponible">oui<input type="radio" value="1" name="disponibilite"></span>
                <span class="disponible">non<input type="radio" value="0" name="disponibilite"></span>
            </div>

            <!-- sexe field -->
            <div>
                <label for="" class="titre-profile">Sexe</label>
                <select name="sexe" id="sexe">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>

            <!-- biographie Confirmation -->
            <div class="form__group ">
                <label for="biographie" class="titre-biographie">Biographie</label>
                <textarea name="biographie" id="biographie"></textarea>
            </div>

            <!-- submit  -->
            <div class="form__group submit">
                <input type="submit" value="completez mon profile" name="enregistrer" class="fom__submit">
            </div>
        </div>

        </form>
    </div>
</main>