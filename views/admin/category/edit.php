<?php
use App\Connection;
use App\Table\CategoryTable;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$item = $table->find($params['id']);
$succes = false;
$errors = [];
$fields = ['name', 'slug'];

if(!empty($_POST)){
    $v = new CategoryValidator($_POST, $table, $item->getID());
    ObjectHelper::hydrate($item, $_POST, $fields);
    if($v->validate()){
        $table->update([
            'name' => $item->getName(),
            'slug' => $item->getSlug() 
        ], $item->getID());
        $succes = true;
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($item, $errors);
?>

<?php if($succes): ?>
    <div class="alert alert-success">
        La categorie a bien été modifié
    </div>
<?php endif ?>

<?php if(isset($_GET['created'])): ?>
    <div class="alert alert-success">
        La categorie a bien été créé
    </div>
<?php endif ?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        La categorie n'a pa pu être modifiée, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<h1>Editer la categorie <?= e($item->getName())?></h1>

<?php require('_form.php'); ?>