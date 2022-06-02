<?php ob_start(); ?>
<div class="block-membre">
    <main class="main-membre">
        <?php if (isset($users) && $users != null) : ?>

        <div class="book-membre">
            <?php foreach ($users as  $user) : ?>

            <div class="bac-membre">

                <div class="membre__row-1">

                    <?php if ($profileModele->getProfileUser($user->getId())->getImage()) { ?>
                    <a href="index.php?page=profile&id=<?= $user->getId() ?>">
                        <img
                            src="http://localhost/socialNetwork/asset/images/profile<?= $user->getId() . '/' . $profileModele->getProfileUser($user->getId())->getImage() ?>">
                    </a>

                    <?php } else { ?>

                    <img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt="">
                    <?php } ?>
                </div>
                <div class="membre__row-2">
                    <a href="index.php?page=profile&id=<?= $user->getId() ?>">
                        <p class="pseudo"><?= $user->getPseudo() ?></p>
                    </a>
                    <p class="email"><?= $user->getEmail() ?></p>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
        <?php endif ?>
    </main>

</div>

<?php $content =  ob_get_clean();
require "template.php"; ?>