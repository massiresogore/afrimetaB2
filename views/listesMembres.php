<?php ob_start(); ?>

<main>
    <h1>Listes des Membres</h1>
    <?php if (isset($users) && $users != null) : ?>
        <?php foreach ($users as  $user) : ?>
            <div class="description">
                <div class="img">

                    <?php if ($profileModele->getProfileUser($user->getId())->getImage()) { ?>
                        <a href="index.php?page=profile&id=<?= $user->getId() ?>">
                            <img src="http://localhost/socialNetwork/asset/images/profile<?= $user->getId() . '/' . $profileModele->getProfileUser($user->getId())->getImage() ?>" height="100px">
                        </a>

                    <?php } else { ?>

                        <img src="http://localhost/socialNetwork/asset/images/noprofile/noprofile.jpg" alt="" height="100px">
                    <?php } ?>
                </div>
                <a href="index.php?page=profile&id=<?= $user->getId() ?>">
                    <p class="pseudo"><?= $user->getPseudo() ?></p>
                </a>
                <p class="id"><?= $user->getId() ?></p>
                <p class="email"><?= $user->getEmail() ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif ?>

</main>


<?php $content =  ob_get_clean();
require "template.php"; ?>