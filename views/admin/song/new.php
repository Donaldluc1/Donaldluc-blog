<?php
use App\Connection;
use App\Table\SongTable;
use App\HTML\Form;
use App\Model\Song;
use App\Validators\SongValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$errors = [];
$song = new Song();
$pdo = Connection::getPDO();
$songTable = new SongTable($pdo);

if(!empty($_POST)){
    $songTable = new SongTable($pdo);
    $v = new SongValidator($_POST, $songTable, $song->getID());
    ObjectHelper::hydrate($song, $_POST, ['name', 'slug', 'content']);
    if($v->validate()){
        $pdo->beginTransaction();
        $songTable->createPost($song);
        $pdo->commit();
        header('Location: ' . $router->url('admin_songs', ['id' => $song->getID()]) . '?created=1');
        exit();
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($song, $errors);
?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pa pu être enregistré, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<h1>Créer un Cantique</h1>

<?php require('_Form.php'); ?>