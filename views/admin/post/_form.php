<form action="" method="POST" enctype="multipart/form-data">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <?=$form->select('categories_ids', 'Categories', $categories); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <?= $form->file('images', 'image'); ?>
    <?= $form->input('created_at', 'Date de création'); ?>
    <button class="btn btn-primary">
        <?php if($post->getID() !== null): ?>
            Modifier
        <?php else:?>
            Créer
        <?php endif ?>
    </button>
</form>