<?php
namespace App\Table;

use App\PaginatedQuery;
use App\Model\Song;

final class SongTable extends Table {

    protected $table = "song";
    protected $class = Song::class;

    public function updatePost(Song $song): void
    {
        $this->update([
            'name' => $song->getName(),
            'slug' => $song->getSlug(),
            'content' => $song->getContent()
        ], $song->getID());
    }

    public function createPost(Song $song): void
    {
        $id = $this->create([
            'name' => $song->getName(),
            'slug' => $song->getSlug(),
            'content' => $song->getContent()
        ]);
        $song->setID($id);
    }
    
    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY name ASC",
            "SELECT COUNT(id) FROM {$this->table}",
            $this->pdo
        );
        $songs = $paginatedQuery->getItems(Song::class);
        return [$songs, $paginatedQuery];
    }
}