<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= htmlentities($song->getName())?></h5>
        <p><?= $song->getExcerpt() ?></p>
        <p>
            <a href="<?= $router->url('song', ['id' => $song->getID(), 'slug' => $song->getSlug()]) ?>" class="btn btn-primary">Voir plus</a>
        </p>
    </div>
</div> 