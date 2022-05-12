<?php ob_start(); ?>
<?php var_dump($profile); ?>
<div class=" profile__row-2">
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
            <input type="text" name="ville" id="ville" value="" required>
        </div>

        <!-- pays field -->
        <div class="form__group">
            <label for="pays" class="form__label">Pays</label>
            <input type="text" name="pays" value="" id="pays" required>
        </div>

        <!-- sexe field -->
        <div class="form__group">
            <label for="">Sexe</label>
            <select name="sexe" id="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>

        <!-- github Confirmation -->
        <div class="form__group">
            <label for="github" class="form__label">Github</label>
            <input type="text" name="github" value="" id="github" required>
        </div>
        <!-- facebook Confirmation -->
        <div class="form__group">
            <label for="facebook" class="form__label">Facebook</label>
            <input type="text" name="facebook" value="" id="facebook" required>
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


<?php $content =  ob_get_clean();
require "template.php"; ?>