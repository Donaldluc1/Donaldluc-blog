<?php
use App\Connection;

require dirname(__DIR__) . '/vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

$pdo = Connection::getPDO();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE song');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$songs = [];

for($i = 0; $i < 50; $i++){
    $pdo->exec("INSERT INTO song SET name='{$faker->sentence()}', slug='{$faker->slug}', content='{$faker->paragraphs(rand(3,15), true)}'");
    $songs[] = $pdo->lastInsertId();
}