<?php
use App\Connection;
use App\Table\PostTable;
use App\HTML\Form;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;
use App\Table\CategoryTable;
use CoffeeCode\Uploader\Image;

Auth::check();

$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post = $postTable->find($params['id']);
$categoryTable->hydratePosts([$post]);
$succes = false;

$image = new Image("uploads", "images");

$errors = [];

if(!empty($_POST)){
    if (!empty($_FILES)) {
        $upload = $image->upload($_FILES['images'], $_POST['name']);
        $postTable->deleteImage($post->getImages());
        $post->setImages($upload);
    }
    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at']);
    if($v->validate()){
        $pdo->beginTransaction();
        $postTable->updatePost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        $categoryTable->hydratePosts([$post]);
        $succes = true;
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($post, $errors);
?>

<?php if($succes): ?>
    <div class="alert alert-success">
        L'article a bien été modifié
    </div>
<?php endif ?>

<?php if(isset($_GET['created'])): ?>
    <div class="alert alert-success">
        L'article a bien été créé
    </div>
<?php endif ?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pa pu être modifié, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-8">
    <h1>Editer l'article <?= e($post->getName())?></h1>
    </div>
    <?php if($post->getImages()): ?>
    <div class="col-md-4">
        <img src="/public/<?= $post->getImages() ?>" alt="<?= e($post->getName())?>" width="300">
    </div>
    <?php endif ?>
</div>

<?php require('_form.php'); ?>