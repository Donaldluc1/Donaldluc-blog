<form action="" method="POST">
    <?= $form->input('pseudo', 'Pseudo'); ?>
    <?= $form->input('mail', 'email'); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <button class="btn btn-primary">Envoyer </button>
</form>
<br>
<br>