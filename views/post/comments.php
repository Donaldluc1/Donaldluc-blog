<div class="col-md-6">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?= htmlentities($comment->getPseudo())?></h5>
            <h6 class="text-muted"><?= $comment->getMail() ?> </h6>
            <p class="text-muted">
                <?= $comment->getCreatedAt()->format('d F Y H:i:s') ?> 
            </p>
            <p><?= $comment->getFormattedContent() ?></p>
        </div>
    </div>
</div>