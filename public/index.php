<?php
use App\Router;

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

if (isset($_GET['page']) && $_GET['page'] === '1') {
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$get = $_GET;
unset($get['page']);
$query = (http_build_query($get));
    if (!empty($query)) {
        $uri = $uri . '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();   
}

$router = new Router(dirname(__DIR__) . '/views');
$router
    //la homepage
    ->get('/', 'index', 'welcome')
    //la page about
    ->get('/about', 'about', 'about')
    //le blog
    ->get('/blog', 'post/index', 'home')
    ->get('/blog/category/[*:slug]-[i:id]','category/show', 'category')
    ->match('/blog/[*:slug]-[i:id]', 'post/show', 'post')
    ->match('/login', 'auth/login', 'login')
    ->post('/logout', 'auth/logout', 'logout')
    //send email
    ->post('/sendMail', 'sendMail', 'sendMail')
    //Song
    ->get('/songs', 'songs/index', 'songs')
    ->match('/songs/[*:slug]-[i:id]', 'songs/show', 'song')
    // Gestion des songs
    ->get('/admin/songs', 'admin/song/index', 'admin_songs')
    ->match('/admin/song/[i:id]', 'admin/song/edit', 'admin_song')
    ->post('/admin/song/[i:id]/delete', 'admin/song/delete', 'admin_song_delete')
    ->match('/admin/song/new', 'admin/song/new', 'admin_song_new')
    // ADMIN
    // Gestion des articles
    ->get('/admin', 'admin/post/index', 'admin_posts')
    ->match('/admin/post/[i:id]', 'admin/post/edit', 'admin_post')
    ->post('/admin/post/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
    ->match('/admin/post/new', 'admin/post/new', 'admin_post_new')
    // Gestion des categories
    ->get('/admin/categories', 'admin/category/index', 'admin_categories')
    ->match('/admin/category/[i:id]', 'admin/category/edit', 'admin_category')
    ->post('/admin/category/[i:id]/delete', 'admin/category/delete', 'admin_category_delete')
    ->match('/admin/category/new', 'admin/category/new', 'admin_category_new')
    ->run();
