<main class="publication">

    <h1 class="titre">Les publications</h1>
    <?php foreach ($posts as $post) : ?>
    <div class="post">
        <h3>Posts de :<?= $nom->nom ?> </h3>
        <p>Date :<?= $post->create_at ?></p>
        <p><?= $post->post ?>.</p>
    </div>
    <?php endforeach; ?>

</main>

<style>

</style>