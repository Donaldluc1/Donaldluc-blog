<?php
use App\Connection;
use App\HTML\Form;
use App\Model\Comments;
use App\ObjectHelper;
use App\Table\CategoryTable;
use App\Table\CommentsTable;
use App\Table\PostTable;
use App\Validators\CommentsValidator;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

if($post->getSlug() !== $slug){
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}



$errors = [];
$comments = new Comments();
$pdo = Connection::getPDO();
$comments->setCreatedAt(date('Y-m-d H:i:s'));

if(!empty($_POST)){
    $commentsTable = new CommentsTable($pdo);
    $v = new CommentsValidator($_POST);
    ObjectHelper::hydrate($comments, $_POST, ['pseudo', 'mail', 'content']);
    if($v->validate()){
        $pdo->beginTransaction();
        $commentsTable->createPost($comments, $id);
        $pdo->commit();
        header('Location: /blog/' . $slug . '-' . $id);
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($comments, $errors);

$commentsTable = new CommentsTable($pdo);
$comments = $commentsTable->fetchComments($id);
?>
<br>
<br>
<div class="container card mb-3">
    <br>
    <?php if($post->getImages()): ?>
    <p> <img src="/<?= $post->getImages() ?>" class="card-img-top" width="100%" height="400px"></p>
    <?php endif ?>
    <div class="card-body">
        <h1 class="card-title text-center"><?= e($post->getName())?></h1>
        <p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
        <?php foreach($post->getCategories() as $k => $category): 
            if($k > 0): 
                echo', ';
            endif;
            $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]); 
            ?><a href="<?= $category_url ?>"><?= e($category->getName()) ?></a><?php 
        endforeach ?>
        <br>
        <br>
        <p class="card-text"><?= $post->getFormattedContent() ?></p>
    </div>
<br>
<br>
    <h1 class="text-center">Laisser un commentaire</h1>
    <br>
    <br>
    <?php require('_form.php'); ?>

<br>
<br>
    <h1 class="text-center">commentaires sur cet article</h1>
<br>
<br>
    <div class="row">
        <?php foreach($comments as $comment): ?>
            <?php require('comments.php'); ?>
        <?php endforeach?>
    </div>
</div>