<?php
use App\Connection;
use App\Table\SongTable;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$song = (new SongTable($pdo))->find($id);

if($song->getSlug() !== $slug){
    $url = $router->url('song', ['slug' => $song->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
$title = e($song->getName());
?>
<br>
<br>
    <div class="container show">
       <div class="row">
           <div class="col-md-4">
                <div class="card">
                    <h1 class="card-title ml-3"><?= e($song->getName())?></h1>
                    <p class="card-body"><?= $song->getFormattedContent() ?></p>
                </div>
           </div>
           <div class="col-md-4">

           </div>
           <div class="col-md-4">
           </div>
       </div>
    </div>
<br>
<br>