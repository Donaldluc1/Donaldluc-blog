<?php
use App\Connection;
use App\HTML\Form;
use App\ObjectHelper;
use App\Auth;
use App\Table\SongTable;
use App\Validators\SongValidator;

Auth::check();

$pdo = Connection::getPDO();
$songTable = new SongTable($pdo);
$song = $songTable->find($params['id']);
$succes = false;

$errors = [];

if(!empty($_POST)){
    $v = new SongValidator($_POST, $songTable, $song->getID());
    ObjectHelper::hydrate($song, $_POST, ['name', 'slug', 'content']);
    if($v->validate()){
        $pdo->beginTransaction();
        $songTable->updatePost($song);
        $pdo->commit();
        $succes = true;
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($song, $errors);
?>

<?php if($succes): ?>
    <div class="alert alert-success">
        Le Cantique a bien été modifié
    </div>
<?php endif ?>

<?php if(isset($_GET['created'])): ?>
    <div class="alert alert-success">
        Le Cantique a bien été créé
    </div>
<?php endif ?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        Le Cantique n'a pa pu être modifié, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<h1>Editer le Cantique <?= e($song->getName())?></h1>

<?php require('_Form.php'); ?>