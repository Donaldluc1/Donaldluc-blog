<form action="" method="POST">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'Slug'); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <button class="btn btn-primary">
        <?php if($song->getID() !== null): ?>
            Modifier
        <?php else:?>
            Créer
        <?php endif ?>
    </button>
</form>