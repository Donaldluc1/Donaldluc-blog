<?php
use App\Connection;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\HTML\Form;
use App\Model\Post;
use App\Validators\PostValidator;
use App\ObjectHelper;
use App\Auth;
use CoffeeCode\Uploader\Image;

Auth::check();

$errors = [];



$post = new Post();
$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post->setCreatedAt(date('Y-m-d H:i:s'));

$image = new Image("uploads", "images");

if(!empty($_POST)){
    if (!empty($_FILES)) {
        $upload = $image->upload($_FILES['images'], $_POST['name']);
        $post->setImages($upload);
    }
    $postTable = new PostTable($pdo);
    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at']);
    if($v->validate()){
        $pdo->beginTransaction();
        $postTable->createPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location: ' . $router->url('admin_post', ['id' => $post->getID()]) . '?created=1');
        exit();
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($post, $errors);
?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pa pu être enregistré, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<h1>Créer un article</h1>

<?php require('_form.php'); ?>