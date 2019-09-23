<?php

use App\Auth;
use App\Connection;
use App\Table\SongTable;

Auth::check();

$pdo = Connection::getPDO();
$table = new SongTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_songs') . '?delete=1');
