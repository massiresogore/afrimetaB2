<div class="block-membre">
    <h1>Listes des Membres</h1>
    <main class="main-membre">
        <div class="book-membre">
            <?php if (isset($utilisateurs)) : ?>
            <?php foreach ($utilisateurs as $utilisateur) : ?>
            <div class="bac-membre">
                <div class="membre__row-1">
                    <img src="http://localhost:8000/images/noprofile/noprofile.jpg" alt="">
                </div>
                <div class="membre__row-2">
                    <a href="/profile?id_utilisateur=<?= ($utilisateurs ? $utilisateur->id : "") ?>">
                        <p class=" nom">
                            <?= ($utilisateurs ? $utilisateur->nom : "") ?>
                        </p>
                    </a>
                    <p class="email">
                        <?= ($utilisateurs ? $utilisateur->email : "") ?>
                    </p>
                    <p class="id">
                        <?= ($utilisateurs ? $utilisateur->id : "") ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>


        <div class="pagination">
            <ul>
                <li><a href="?page=<?= $currentPage == 1 ? "" : ($currentPage - 1) ?>">Précédent</a></li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                <li><a class="<?= $currentPage == $page ? "activePage" : ""  ?>"
                        href="?page=<?= $page ?>"><?= $page ?></a>
                </li>
                <?php endfor; ?>
                <li><a href="?page=<?= $currentPage == $pages ? "" : ($currentPage + 1) ?>">Suivant</a></li>
            </ul>
        </div>


        <style>
        .pagination ul li {
            display: inline-block;
        }

        .activePage {
            background-color: blue;
            color: aliceblue;
            padding: 0 4px;
        }
        </style>

    </main>

</div>