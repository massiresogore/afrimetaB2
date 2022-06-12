<div class="block-membre">
    <main class="main-membre">

        <div class="book-membre">
            </ /?php foreach ($utilisateurs as $utilisateur) : ?>
            <div class="bac-membre">
                <div class="membre__row-1">
                    <img src="http://localhost/afrimeta/public/images/noprofile/noprofile.jpg" alt="">
                </div>
                <div class="membre__row-2">
                    <a href="/utilisateur/lire/<//?= $utilisateur->id ?>">
                        <p class=" nom">
                            </ /?=$utilisateur->nom ?>
                        </p>
                    </a>
                    <p class="email">
                        </ /?=$utilisateur->email ?>
                    </p>
                </div>
            </div>
            </ /?php endforeach; ?>
        </div>
    </main>

</div>