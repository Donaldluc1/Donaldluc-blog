<?php
use App\Connection;
use App\Table\CategoryTable;
use App\HTML\Form;
use App\Model\Category;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$errors = [];
$item = new Category();

if(!empty($_POST)){
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['name', 'slug']);
    if($v->validate()){
        $table->create([
            'name' => $item->getName(),
            'slug' => $item->getSlug() 
        ]);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
        exit();
    }else {
        $errors = $v->errors();
    }
}
$form = new Form($item, $errors);
?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        La categorie n'a pa pu être enregistré, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<h1>Créer une categorie</h1>

<?php require('_form.php'); ?>